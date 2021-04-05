from django.shortcuts import render
from django.utils.decorators import method_decorator
from django.contrib.auth.decorators import login_required
from django.contrib.auth import logout
from django.core.exceptions import PermissionDenied, ObjectDoesNotExist
from django.urls import reverse, reverse_lazy
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from django.shortcuts import get_object_or_404
from django.utils.decorators import method_decorator
from django.views.generic import DetailView, ListView, RedirectView
from django.views.generic.edit import CreateView, UpdateView, FormView

from datetime import date

from tfmsurveysapp.forms import CommentForm
from tfmsurveysapp.models import Campaign, CampaignType, SolutionType
from tfmsurveysapp.models import Survey, Comment, IssueType
from encuestas.models import TipoCampania
from uxxienc_resul.models import CampaniasExtraidas

import logging

logger = logging.getLogger(__name__)

# Security Mixins

class LoginRequiredMixin(object):
    @method_decorator(login_required())
    def dispatch(self, *args, **kwargs):
        return super(LoginRequiredMixin, self).dispatch(*args, **kwargs)

class CheckIsOwnerMixin(object):
    def get_object(self, *args, **kwargs):
        obj = super(CheckIsOwnerMixin, self).get_object(*args, **kwargs)
        if not obj.user == self.request.user:
            raise PermissionDenied
        return obj

# HTML Views

# List campaigns:
# Option 1: url - view method
@login_required()
def campaigns_list(request):

    import_campaign_types()
    import_campaigns()
    campania_lime = TipoCampania.objects.all().order_by('cod_tipo_campania')
    campaign_tfm = CampaignType.objects.all().order_by('cod_tipo_campania_lime')

    campaigns_list=Campaign.objects.all()
    context = {'campaigns_list': campaigns_list,
               'campaign_tfm': campaign_tfm,
               'campania_lime': campania_lime}
    return render(request, 'tfmsurveysapp/campaigns_list.html', context)

# List comments:
@method_decorator(login_required, name='dispatch')
class CommentsList(ListView):
    model = Comment
    context_object_name = 'comments_list'
    template_name = 'tfmsurveysapp/comments_list.html'

    def get_queryset(self):
        return Comment.objects.filter(survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])

# Details of comment:
# Opcion 3: url - view class
#@login_required()
#def comment_detail(request, cod_campania_lime, id):
#    comment = Comment.objects.get(id=id)
#    context = {'comment': comment}
#    return render(request, 'tfmsurveysapp/comment_detail.html', context)

# Opcion 2: url - view class
#class CommentDetail(DetailView):
#    model = Comment
#    context_object_name = 'comment_detail'
#    template_name = 'tfmsurveysapp/comment_detail.html'
#
#    def get_queryset(self):
#        return Comment.objects.get(id=self.kwargs['id'])

@method_decorator(login_required, name='dispatch')
class CommentDetail(UpdateView):
    model = Comment
    form_class = CommentForm
    template_name = 'tfmsurveysapp/comment_detail.html'
#    success_url = reverse_lazy('tfmsurveysapp:comments_list', kwargs={'cod_campania_lime':'170'})

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['issuetypes_list'] = IssueType.objects.all()
        context['solutiontypes_list'] = SolutionType.objects.all()
        return context

    def get_success_url(self):
        return reverse('tfmsurveysapp:comments_list', kwargs={'cod_campania_lime':self.kwargs['cod_campania_lime']})

 #   def get_queryset(self):
 #       Comment.objects.get(id = self.kwargs['pk'])

 #   def form_valid(self, form):
 #       form.instance.comment = self.request.comment
 #       return super(CommentDetail, self).form_valid(form)

#def import_campaign(request, cod_campania_lime):

#    update_import_date(cod_campania_lime)

#    return HttpResponseRedirect(reverse('tfmsurveysapp:campaigns_list'))

#   Updates de 'impart_date' field of the campaign
#def update_import_date(cod_campania_lime):
#    campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
#    campaign.import_date = date.today()
#    campaign.save()

class ImportCampaign(RedirectView):
    query_string = False
    permanent = False

    def get_redirect_url(self, *args, **kwargs):

        update_import_date(cod_campania_lime=kwargs['cod_campania_lime'])

        return reverse('tfmsurveysapp:campaigns_list')

def update_import_date(cod_campania_lime):
    campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
    campaign.import_date = date.today()
    campaign.save()

#   Import then campaign types from Lime to TFM
def import_campaign_types():
    tipocampanias_lime = TipoCampania.objects.all()

    # New and update campaign types
    for tipocampania_lime in tipocampanias_lime:
        try:
            campaigntype_tfm = CampaignType.objects.get(cod_tipo_campania_lime = tipocampania_lime.cod_tipo_campania)
            if (campaigntype_tfm.name != tipocampania_lime.descripcion):
                campaigntype_tfm.name = tipocampania_lime.descripcion
                campaigntype_tfm.save()
                print("import_campaign_type: update: ", tipocampania_lime.cod_tipo_campania, ' - ', tipocampania_lime.descripcion)
        except CampaignType.DoesNotExist:
            new_campaigntype = CampaignType(
                cod_tipo_campania_lime = tipocampania_lime.cod_tipo_campania,
                name = tipocampania_lime.descripcion)
            new_campaigntype.save()
            print("import_campaign_type: new: ", new_campaigntype.cod_tipo_campania_lime, ' - ', new_campaigntype.name)
            #logger.debug("import_campaign_type: new: ", new_campaigntype)

    # Delete campaign types
    campaigntypes_tfm = CampaignType.objects.all()
    for campaigntype_tfm in campaigntypes_tfm:
        try:
            tipocampania_lime = TipoCampania.objects.get(cod_tipo_campania = campaigntype_tfm.cod_tipo_campania_lime)
        except TipoCampania.DoesNotExist:
            print("import_campaign_type: delete: ", campaigntype_tfm.cod_tipo_campania_lime, ' - ', campaigntype_tfm.name)
            campaigntype_tfm.delete()


#   Import then campaign types from Lime to TFM
def import_campaigns():
    campanias_lime = CampaniasExtraidas.objects.all()

    # New and update campaign types
    for campania_lime in campanias_lime:
        try:
            campaign_tfm = Campaign.objects.get(cod_campania_lime=campania_lime.codcampania)
            if (campaign_tfm.name != campania_lime.nombrecampania):
                campaign_tfm.name = campania_lime.nombrecampania
                campaign_tfm.fecha_extraccion_lime = campania_lime.fechaextraccion
                campaign_tfm.save()
                print("import_campaign: update: ", campania_lime.codcampania, ' - ',
                      campania_lime.nombrecampania)
        except Campaign.DoesNotExist:
            try:
                campaign_type_tfm = CampaignType.objects.get(name=campania_lime.tipocampania)
                new_campaign = Campaign(
                    cod_campania_lime=campania_lime.codcampania,
                    name=campania_lime.nombrecampania,
                    fecha_extraccion_lime=campania_lime.fechaextraccion,
                    type_campaign=campaign_type_tfm
                )
                new_campaign.save()
                print("import_campaign: new: ", new_campaign.cod_campania_lime, ' - ', new_campaign.name)
            except CampaignType.DoesNotExist:
                print("import_campaign: Campaign_type: except: ", campania_lime.tipocampania)

            # logger.debug("import_campaign_type: new: ", new_campaigntype)

    # Delete campaign types
    campaigns_tfm = Campaign.objects.all()
    for campaign_tfm in campaigns_tfm:
        try:
            campania_lime = CampaniasExtraidas.objects.get(codcampania=campaign_tfm.cod_campania_lime)
        except CampaniasExtraidas.DoesNotExist:
            print("import_campaign: delete: ", campaign_tfm.cod_campania_lime, ' - ',
                  campaign_tfm.name)
            campaign_tfm.delete()

#   Import information from surveys
def import_survey():

    return True

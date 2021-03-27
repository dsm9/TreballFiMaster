from django.shortcuts import render
from django.utils.decorators import method_decorator
from django.contrib.auth.decorators import login_required
from django.contrib.auth import logout
from django.core.exceptions import PermissionDenied
from django.urls import reverse, reverse_lazy
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from django.shortcuts import get_object_or_404
from django.utils.decorators import method_decorator
from django.views.generic import DetailView, ListView
from django.views.generic.edit import CreateView, UpdateView, FormView

from tfmsurveysapp.forms import CommentForm
from tfmsurveysapp.models import Campaign, CampaignType, SolutionType
from tfmsurveysapp.models import Survey, Comment, IssueType


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
    campaigntypes_list = CampaignType.objects.all()
    campaigns_list=Campaign.objects.all()
    context = {'campaigns_list': campaigns_list,
               'campaigntypes_list': campaigntypes_list}
    return render(request, 'tfmsurveysapp/campaigns_list.html', context)

# List comments:

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


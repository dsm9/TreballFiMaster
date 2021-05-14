from django.db.models import Count
from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from django.core.exceptions import PermissionDenied
from django.urls import reverse
from django.utils.decorators import method_decorator
from django.views.generic import ListView, RedirectView
from django.views.generic.edit import UpdateView

from datetime import date, time, datetime

from tfmsurveysapp.forms import CommentForm
from tfmsurveysapp.models import Campaign, CampaignType, SolutionType, Survey, Professor, CommentIssue
from tfmsurveysapp.models import Comment, IssueType
from encuestas.models import TipoCampania, Encuesta
from lime.models import LimeOcuEncuestasCampania
from uxxienc_resul.models import CampaniasExtraidas, SBProf, SBRes

import logging
from tfmsurveysapp.spacy.tfm_lang_detector import TfmLangDetector
from tfmsurveysapp.spacy.model_1_execution import TfmCategorizerModel1

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

    return True


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

    # Delete campaigns
    campaigns_tfm = Campaign.objects.all()
    for campaign_tfm in campaigns_tfm:
        try:
            campania_lime = CampaniasExtraidas.objects.get(codcampania=campaign_tfm.cod_campania_lime)
        except CampaniasExtraidas.DoesNotExist:
            print("import_campaign: delete: ", campaign_tfm.cod_campania_lime, ' - ',
                  campaign_tfm.name)
            campaign_tfm.delete()
    return True

# List comments:
@method_decorator(login_required, name='dispatch')
class CommentsList(ListView):
    model = Comment
    context_object_name = 'comments_list'
    template_name = 'tfmsurveysapp/comments_list.html'

    def get_queryset(self):
        print("CommentsList:get_queryset:", self.kwargs)
        #issue_type = self.kwargs['issue_type']

        comments_list = Comment.objects.filter(survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])
        self.languages_summary = comments_list.values('language').annotate(lang_count=Count('id'))
        self.model1_count = comments_list.filter(issue_type__id=1).count()
        self.total_count = comments_list.count()

        if "language" in self.kwargs:
            comments_list = comments_list.filter(language=self.kwargs['language'])

        if "issue_type" in self.kwargs:
            comments_list = comments_list.filter(issue_type__id=self.kwargs['issue_type'])

        #self.model1_count = Comment.objects.filter(survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime']).count()
        return comments_list

    def get_context_data(self, **kwargs):
        context = super(CommentsList, self).get_context_data(**kwargs)
        context['languages_summary'] = self.languages_summary
        context['model1_count'] = self.model1_count
        context['total_count'] = self.total_count
        return context

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
    pattern_name = "tfmsurveysapp:comments_list"

    def get_redirect_url(self, *args, **kwargs):
        cod_campania_lime = kwargs['cod_campania_lime']
        self.delete_surveys(cod_campania_lime)
        self.import_surveys(cod_campania_lime)
        self.import_profes(cod_campania_lime)
        self.import_comments(cod_campania_lime)
        self.update_import_date(cod_campania_lime)

        return super().get_redirect_url( *args, **kwargs)
#        return reverse('tfmsurveysapp:campaigns_list')

    # Delete survey information of the campaign
    def delete_surveys(self, cod_campania_lime):

        surveys = Survey.objects.filter(campaign__cod_campania_lime=cod_campania_lime).delete()

        return True

    #   Import information from surveys
    def import_surveys(self, cod_campania_lime):
        campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
        encuestas = Encuesta.objects.filter(campania_id=cod_campania_lime)
        print("Import_campaigns: Num. enquestes: ", len(encuestas))
        surveys_list = []
        time_ini = datetime.now()
        for encuesta in encuestas:
            try:
                limeencuesta = LimeOcuEncuestasCampania.objects.get(codencuesta=encuesta.cod_encuesta)
                print(campaign.cod_campania_lime,
                    encuesta.cod_encuesta,
                    limeencuesta.sid,
                    encuesta.titulo)
                survey = Survey(
                    campaign = campaign,
                    cod_encuesta_lime = encuesta.cod_encuesta,
                    sid_lime = limeencuesta.sid,
                    name = encuesta.titulo
                )
                surveys_list.append(survey)
                #survey.save()

            except LimeOcuEncuestasCampania.DoesNotExist:
                print('import_survey: LimeOcuEncuestasCampania Not Exist: codencuesta=%s', encuesta.cod_encuesta)

        Survey.objects.bulk_create(surveys_list)

        time_fin = datetime.now()
        time_dif = time_fin - time_ini
        print("ImportCampaign: Execution time: ", time_dif)

        # campaign: 162
        # surveys: 492
        # batch_create: 0,60 s
        # batch_create(100): 0,73 s
        # save: 66,83 s

        return True

# Import list of professors included in the campaign
    def import_profes(self, cod_campania_lime):

        query = "SELECT prof.sid, " \
                "LPAD(prof.num_profe, 2, '0') pid, " \
                "MAX(IF(metadato = 'APELLIDO1PROFE', valor, null)) surname1, " \
                "MAX(IF(metadato = 'APELLIDO2PROFE', valor, null)) surname2, " \
                "MAX(IF(metadato = 'NOMBREPROFE', valor, null)) name " \
            "FROM " \
            "(SELECT sid, " \
            " CASE " \
                "when metadato LIKE 'DNIPROFE%%' then 'DNIPROFE' " \
                "when metadato LIKE 'APELLIDO1PROFE%%' then 'APELLIDO1PROFE' " \
                "when metadato LIKE 'APELLIDO2PROFE%%' then 'APELLIDO2PROFE' " \
                "when metadato LIKE 'NOMBREPROFE%%' then 'NOMBREPROFE' " \
                "else metadato " \
            "END AS metadato," \
            "CASE " \
                "when metadato LIKE 'DNIPROFE%%' then substr(metadato, 9, 2) " \
                "when metadato LIKE 'APELLIDO1PROFE%%' then substr(metadato, 15, 2) " \
                "when metadato LIKE 'APELLIDO2PROFE%%' then substr(metadato, 15, 2) " \
                "when metadato LIKE 'NOMBREPROFE%%' then substr(metadato, 12, 2) " \
                "else 0 " \
            "END AS num_profe, " \
            "valor " \
        "FROM uxxienc_resul.SB_%s_META_SURVEY " \
        "WHERE valor is not null " \
            "AND (metadato LIKE 'DNIPROFE%%' " \
                "OR metadato LIKE 'APELLIDO%%' " \
                "OR metadato LIKE 'NOMBREPROFE%%') " \
            ") prof " \
        "GROUP BY sid, pid"

        profes = SBProf.objects.raw(query, [cod_campania_lime])
        print("Import_profes: Num. profes: ", len(profes))
        profes_list = []
        for profe in profes:
            print (profe.sid,
                   profe.pid,
                   profe.surname1,
                   profe.surname2,
                   profe.name)
            try:
                survey = Survey.objects.get(sid_lime = profe.sid)
                if profe.name is not None and profe.surname1 is not None:
                    tfmprofe = Professor(
                        sid_lime = profe.sid,
                        pid_lime = profe.pid,
                        name = profe.name,
                        surname1 = profe.surname1,
                        surname2 = profe.surname2,
                        survey = survey
                    )
                    #tfmprofe.save()
                    profes_list.append(tfmprofe)

            except Survey.DoesNotExist:
                print("Import_profes: Survey Does not exist: ", profe.sid)
        Professor.objects.bulk_create(profes_list)

        return True

    def import_comments(self, cod_campania_lime):

        #   Init language detector
        lang_detector = TfmLangDetector()


        campaign = Campaign.objects.get(cod_campania_lime = cod_campania_lime)
        print("Import_comment: campaign: ", campaign.name, campaign.type_campaign.name)
        if ('assignatura' in campaign.type_campaign.name):
            survey_type = 1     # Assignatura-professor
        else:
            survey_type = 2     # Altres enquestes

        comments_list = []
        query = "SELECT r.sid, r.tid, r.gid, r.type, r.parent_qid, r.qid, r.sqid, r.ssqid, r.question, " \
	        "r.sub_question, r.sub_sub_question, r.answer, r.fieldname, r.response, r.token, " \
            "q.title question_id " \
            "FROM uxxienc_resul.SB_%s_RES r INNER JOIN lime.lime_questions q ON r.qid = q.qid " \
            "WHERE r.type = 'T' AND q.language = 'ca' AND r.response > ''"
        comments = SBRes.objects.raw(query, [cod_campania_lime])
        print("Import_commnets: num_comentaris: ", len(comments))
        for comment in comments:
            print(comment.sid,
                  comment.tid,
                  comment.gid,
                  comment.type,
                  comment.fieldname,
                  comment.question_id,
                  comment.question,
                  comment.sub_question,
                  comment.answer,
                  comment.response)

            lang = lang_detector.detect(comment.response)
            print ("Language: ", lang)

            try:
                survey = Survey.objects.get(sid_lime = comment.sid)

                question = comment.question
                #  Obtain professor
                if survey_type == 1:
                    if len(comment.question_id) > 3:
                        block_type = 'P'
                    else:
                        block_type = 'A'
                    pid = comment.question_id[3:5]
                    #print("Import_comments: block_type=", block_type, " pdi=", pid)
                    if pid != "":
                        try:
                            professor = Professor.objects.get(sid_lime=comment.sid, pid_lime=pid)
                            #print("Import_comments: Professor: ", professor.surname1, professor.surname2, professor.name)
                            name = professor.name
                            if name is None:
                                name = ''
                            surname1 = professor.surname1
                            if surname1 is None:
                                surname1 = ''
                            surname2 = professor.surname2
                            if surname2 is None:
                                surname2 = ''

                            question = self.replace_macro(question, "NOMBREPROFE", name)
                            question = self.replace_macro(question, "APELLIDO1PROFE", surname1)
                            question = self.replace_macro(question, "APELLIDO2PROFE", surname2)
                            print ("Import_comments: new_question: ", question)

                        except Professor.DoesNotExist:
                            professor = None
                            print("Import_comment: Professor Does not exist: ", comment.sid)
                    else:
                        professor = None
                else:
                    block_type = ""
                    pid = None
                    professor = None

                tfmcomment = Comment(
                    survey = survey,
                    qid_lime = comment.qid,
                    tid_lime = comment.tid,
                    question_id_lime = comment.question_id,
                    question = question,
                    block_type = block_type,
                    professor = professor,
                    original_value = comment.response,
                    language = lang
                )
                comments_list.append(tfmcomment)
                #tfmcomment.save()

            except Survey.DoesNotExist:
                print("Import_profes: Survey Does not exist: ", comment.sid)

        Comment.objects.bulk_create(comments_list)

        return True

    # Updates de importing date of the campaign
    def update_import_date(self, cod_campania_lime):
        campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
        campaign.import_date = date.today()
        campaign.save()

    # Replace the macro by the value in the question
    def replace_macro(self, question, macro,  value):

        #print ("Replace_macro")
        pos1 = question.find("{" + macro)
        if pos1 != -1:
            pos2 = question.find("}", pos1 + 1)
            macro = question[pos1: pos2 + 1]
            #print("Replace macro: macro:", macro)

            question = question.replace(macro, value)
            #print("Replace_macro: new questions: ", question)

        return question




class ProcessComments(RedirectView):
    query_string = False
    permanent = False
    pattern_name = "tfmsurveysapp:comments_list"

    def get_redirect_url(self, *args, **kwargs):
        cod_campania_lime = kwargs['cod_campania_lime']
        self.process_model1(cod_campania_lime)

        return super().get_redirect_url( *args, **kwargs)

    def process_model1(self, cod_campania_lime):

        issue_type = IssueType.objects.get(id=1)
        languages = {"ca","es","en"}
        for language in languages:
            nlp = TfmCategorizerModel1(language)
            #print ("ProcessComments: Model readed: ", language )

            comments = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime, language=language)
            print("ProcessComments: process_model1: Comments=", len(comments))

            positives = 0
            for comment in comments:
                result = nlp.test(comment.original_value)
                if (result['POSITIVE'] > 0.5):
                    positives = positives + 1;
                    print("ProcessComments: process_model1: comment: ", comment.original_value)
                    print("ProcessComments: process_model1: comment: ", result)
                    comment.issue_type = issue_type
                    comment.save()
            print("ProcessComments: process_model1: Positives: ", positives)

        return True

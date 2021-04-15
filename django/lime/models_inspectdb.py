# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class LimeAnswers(models.Model):
    qid = models.IntegerField(primary_key=True)
    code = models.CharField(max_length=5)
    answer = models.TextField()
    sortorder = models.IntegerField()
    assessment_value = models.IntegerField()
    language = models.CharField(max_length=20)
    scale_id = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'lime_answers'
        unique_together = (('qid', 'code', 'language', 'scale_id'),)


class LimeGroups(models.Model):
    gid = models.AutoField(primary_key=True)
    sid = models.IntegerField()
    group_name = models.CharField(max_length=100)
    group_order = models.IntegerField()
    description = models.TextField(blank=True, null=True)
    language = models.CharField(max_length=20)
    randomization_group = models.CharField(max_length=20)
    grelevance = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_groups'
        unique_together = (('gid', 'language'),)


class LimeLabels(models.Model):
    lid = models.IntegerField(primary_key=True)
    code = models.CharField(max_length=5)
    title = models.TextField(blank=True, null=True)
    sortorder = models.IntegerField()
    language = models.CharField(max_length=20)
    assessment_value = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'lime_labels'
        unique_together = (('lid', 'sortorder', 'language'),)


class LimeLabelsets(models.Model):
    lid = models.AutoField(primary_key=True)
    label_name = models.CharField(max_length=100)
    languages = models.CharField(max_length=200, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_labelsets'


class LimeOcuEncuestasCampania(models.Model):
    sid = models.IntegerField(primary_key=True)
    codencuesta = models.IntegerField(db_column='codEncuesta')  # Field name made lowercase.
    codcampania = models.IntegerField(db_column='codCampania')  # Field name made lowercase.
    nombrecampania = models.CharField(db_column='nombreCampania', max_length=50)  # Field name made lowercase.
    codtipocampania = models.IntegerField(db_column='codTipoCampania')  # Field name made lowercase.
    descripciontipocampania = models.CharField(db_column='descripcionTipoCampania', max_length=100)  # Field name made lowercase.
    codgrupousuarios = models.IntegerField(db_column='codGrupoUsuarios', blank=True, null=True)  # Field name made lowercase.
    flagarchivada = models.CharField(db_column='flagArchivada', max_length=1)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'lime_ocu_encuestas_campania'


class LimeParticipants(models.Model):
    participant_id = models.CharField(primary_key=True, max_length=50)
    firstname = models.CharField(max_length=40, blank=True, null=True)
    lastname = models.CharField(max_length=40, blank=True, null=True)
    email = models.CharField(max_length=254, blank=True, null=True)
    language = models.CharField(max_length=40, blank=True, null=True)
    blacklisted = models.CharField(max_length=1)
    owner_uid = models.IntegerField()
    created_by = models.IntegerField()
    created = models.DateTimeField(blank=True, null=True)
    modified = models.DateTimeField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_participants'


class LimeQuestions(models.Model):
    qid = models.AutoField(primary_key=True)
    parent_qid = models.IntegerField()
    sid = models.IntegerField()
    gid = models.IntegerField()
    type = models.CharField(max_length=1)
    title = models.CharField(max_length=20)
    question = models.TextField()
    preg = models.TextField(blank=True, null=True)
    help = models.TextField(blank=True, null=True)
    other = models.CharField(max_length=1)
    mandatory = models.CharField(max_length=1, blank=True, null=True)
    question_order = models.IntegerField()
    language = models.CharField(max_length=20)
    scale_id = models.IntegerField()
    same_default = models.IntegerField()
    relevance = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_questions'
        unique_together = (('qid', 'language'),)


class LimeSurveys(models.Model):
    sid = models.IntegerField(primary_key=True)
    owner_id = models.IntegerField()
    admin = models.CharField(max_length=50, blank=True, null=True)
    active = models.CharField(max_length=1)
    expires = models.DateTimeField(blank=True, null=True)
    startdate = models.DateTimeField(blank=True, null=True)
    adminemail = models.CharField(max_length=254, blank=True, null=True)
    anonymized = models.CharField(max_length=1)
    faxto = models.CharField(max_length=20, blank=True, null=True)
    format = models.CharField(max_length=1, blank=True, null=True)
    savetimings = models.CharField(max_length=1)
    template = models.CharField(max_length=100, blank=True, null=True)
    language = models.CharField(max_length=50, blank=True, null=True)
    additional_languages = models.CharField(max_length=255, blank=True, null=True)
    datestamp = models.CharField(max_length=1)
    usecookie = models.CharField(max_length=1)
    allowregister = models.CharField(max_length=1)
    allowsave = models.CharField(max_length=1)
    autonumber_start = models.IntegerField()
    autoredirect = models.CharField(max_length=1)
    allowprev = models.CharField(max_length=1)
    printanswers = models.CharField(max_length=1)
    ipaddr = models.CharField(max_length=1)
    refurl = models.CharField(max_length=1)
    datecreated = models.DateField(blank=True, null=True)
    publicstatistics = models.CharField(max_length=1)
    publicgraphs = models.CharField(max_length=1)
    listpublic = models.CharField(max_length=1)
    htmlemail = models.CharField(max_length=1)
    sendconfirmation = models.CharField(max_length=1)
    tokenanswerspersistence = models.CharField(max_length=1)
    assessments = models.CharField(max_length=1)
    usecaptcha = models.CharField(max_length=1)
    usetokens = models.CharField(max_length=1)
    bounce_email = models.CharField(max_length=254, blank=True, null=True)
    attributedescriptions = models.TextField(blank=True, null=True)
    emailresponseto = models.TextField(blank=True, null=True)
    emailnotificationto = models.TextField(blank=True, null=True)
    tokenlength = models.IntegerField()
    showxquestions = models.CharField(max_length=1, blank=True, null=True)
    showgroupinfo = models.CharField(max_length=1, blank=True, null=True)
    shownoanswer = models.CharField(max_length=1, blank=True, null=True)
    showqnumcode = models.CharField(max_length=1, blank=True, null=True)
    bouncetime = models.IntegerField(blank=True, null=True)
    bounceprocessing = models.CharField(max_length=1, blank=True, null=True)
    bounceaccounttype = models.CharField(max_length=4, blank=True, null=True)
    bounceaccounthost = models.CharField(max_length=200, blank=True, null=True)
    bounceaccountpass = models.CharField(max_length=100, blank=True, null=True)
    bounceaccountencryption = models.CharField(max_length=3, blank=True, null=True)
    bounceaccountuser = models.CharField(max_length=200, blank=True, null=True)
    showwelcome = models.CharField(max_length=1, blank=True, null=True)
    showprogress = models.CharField(max_length=1, blank=True, null=True)
    questionindex = models.IntegerField()
    navigationdelay = models.IntegerField()
    nokeyboard = models.CharField(max_length=1, blank=True, null=True)
    alloweditaftercompletion = models.CharField(max_length=1, blank=True, null=True)
    googleanalyticsstyle = models.CharField(max_length=1, blank=True, null=True)
    googleanalyticsapikey = models.CharField(max_length=25, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_surveys'


class LimeSurveysLanguagesettings(models.Model):
    surveyls_survey_id = models.IntegerField(primary_key=True)
    surveyls_language = models.CharField(max_length=45)
    surveyls_title = models.CharField(max_length=200)
    surveyls_description = models.TextField(blank=True, null=True)
    surveyls_welcometext = models.TextField(blank=True, null=True)
    surveyls_endtext = models.TextField(blank=True, null=True)
    surveyls_url = models.TextField(blank=True, null=True)
    surveyls_urldescription = models.CharField(max_length=255, blank=True, null=True)
    surveyls_email_invite_subj = models.CharField(max_length=255, blank=True, null=True)
    surveyls_email_invite = models.TextField(blank=True, null=True)
    surveyls_email_remind_subj = models.CharField(max_length=255, blank=True, null=True)
    surveyls_email_remind = models.TextField(blank=True, null=True)
    surveyls_email_register_subj = models.CharField(max_length=255, blank=True, null=True)
    surveyls_email_register = models.TextField(blank=True, null=True)
    surveyls_email_confirm_subj = models.CharField(max_length=255, blank=True, null=True)
    surveyls_email_confirm = models.TextField(blank=True, null=True)
    surveyls_dateformat = models.IntegerField()
    surveyls_attributecaptions = models.TextField(blank=True, null=True)
    email_admin_notification_subj = models.CharField(max_length=255, blank=True, null=True)
    email_admin_notification = models.TextField(blank=True, null=True)
    email_admin_responses_subj = models.CharField(max_length=255, blank=True, null=True)
    email_admin_responses = models.TextField(blank=True, null=True)
    surveyls_numberformat = models.IntegerField()
    attachments = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'lime_surveys_languagesettings'
        unique_together = (('surveyls_survey_id', 'surveyls_language'),)

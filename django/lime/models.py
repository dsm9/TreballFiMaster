from django.db import models

# Create your models here.

# Database LIME

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

    def __str__(self):
        return self.sid

#class LimeSurveysLanguagesettings(models.Model):
#    surveyls_survey = models.ForeignKey(LimeOcuEncuestasCampania, on_delete=models.CASCADE, primary_key=True)
#    surveyls_language = models.CharField(max_length=45)
#    surveyls_title = models.CharField(max_length=200)
#    surveyls_description = models.TextField(blank=True, null=True)
#    surveyls_welcometext = models.TextField(blank=True, null=True)
#    surveyls_endtext = models.TextField(blank=True, null=True)
#    surveyls_url = models.TextField(blank=True, null=True)
#    surveyls_urldescription = models.CharField(max_length=255, blank=True, null=True)
#    surveyls_email_invite_subj = models.CharField(max_length=255, blank=True, null=True)
#    surveyls_email_invite = models.TextField(blank=True, null=True)
#    surveyls_email_remind_subj = models.CharField(max_length=255, blank=True, null=True)
#    surveyls_email_remind = models.TextField(blank=True, null=True)
#    surveyls_email_register_subj = models.CharField(max_length=255, blank=True, null=True)
#    surveyls_email_register = models.TextField(blank=True, null=True)
#    surveyls_email_confirm_subj = models.CharField(max_length=255, blank=True, null=True)
#    surveyls_email_confirm = models.TextField(blank=True, null=True)
#    surveyls_dateformat = models.IntegerField()
#    surveyls_attributecaptions = models.TextField(blank=True, null=True)
#    email_admin_notification_subj = models.CharField(max_length=255, blank=True, null=True)
#    email_admin_notification = models.TextField(blank=True, null=True)
#    email_admin_responses_subj = models.CharField(max_length=255, blank=True, null=True)
#    email_admin_responses = models.TextField(blank=True, null=True)
#    surveyls_numberformat = models.IntegerField()
#    attachments = models.TextField(blank=True, null=True)
#
#    class Meta:
#        managed = False
#        db_table = 'lime_surveys_languagesettings'
#        unique_together = (('surveyls_survey', 'surveyls_language'),)

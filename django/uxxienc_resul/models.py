from django.db import models

# Create your models here.

# Database UXXIENC_RESUL

class CampaniasExtraidas(models.Model):
    idextraccion = models.AutoField(db_column='idExtraccion', primary_key=True)  # Field name made lowercase.
    codcampania = models.IntegerField(db_column='codCampania', unique=True)  # Field name made lowercase.
    nombrecampania = models.CharField(db_column='nombreCampania', max_length=50)  # Field name made lowercase.
    descripcioncampania = models.CharField(db_column='descripcionCampania', max_length=256)  # Field name made lowercase.
    tipocampania = models.CharField(db_column='tipoCampania', max_length=50)  # Field name made lowercase.
    formatotitulo = models.CharField(db_column='formatoTitulo', max_length=512)  # Field name made lowercase.
    estado = models.CharField(max_length=50)
    fechaextraccion = models.DateTimeField(db_column='fechaExtraccion', blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CAMPANIAS_EXTRAIDAS'

class SBMetaSurvey(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    metadato = models.CharField(max_length=20, blank=True, null=True)
    valor = models.TextField(blank=True, null=True)

    class Meta:
        unique_together = (('sid','metadato',))
        managed = False
#        db_table = 'SB_100_META_SURVEY'


class SBMetaUser(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    tid = models.IntegerField(blank=True, null=True)
    participant_id = models.CharField(max_length=50, blank=True, null=True)
    token = models.CharField(max_length=100, blank=True, null=True)
    fieldname = models.CharField(max_length=12, blank=True, null=True)
    attribute_name = models.CharField(max_length=255, blank=True, null=True)
    attribute_value = models.CharField(max_length=255, blank=True, null=True)

    class Meta:
        unique_together = (('sid','tid','fieldname'),)
        managed = False
        #db_table = 'SB_100_META_USER'

class SBRes(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    tid = models.IntegerField(blank=True, null=True)
    gid = models.IntegerField(blank=True, null=True)
    type = models.CharField(max_length=20, blank=True, null=True)
    parent_qid = models.IntegerField(blank=True, null=True)
    qid = models.IntegerField(blank=True, null=True)
    sqid = models.IntegerField(blank=True, null=True)
    ssqid = models.IntegerField(blank=True, null=True)
    question = models.CharField(max_length=2000, blank=True, null=True)
    sub_question = models.CharField(max_length=2000, blank=True, null=True)
    sub_sub_question = models.CharField(max_length=2000, blank=True, null=True)
    answer = models.CharField(max_length=2000, blank=True, null=True)
    fieldname = models.CharField(max_length=2000, blank=True, null=True)
    response = models.CharField(max_length=2000, blank=True, null=True)
    token = models.CharField(max_length=100, blank=True, null=True)
    question_id = models.CharField(max_length=10, blank=True, null=True)

    class Meta:
        unique_together = (('sid','tid','qid'))
        managed = False
        #db_table = 'SB_100_RES'

class SBProf(models.Model):
    sid = models.IntegerField(null=False, primary_key=True)
    pid = models.CharField(max_length=2, null=False)
    name = models.CharField(max_length=50, null=False)
    surname1 = models.CharField(max_length=50, null=False)
    surname2 = models.CharField(max_length=50, null=True)

    class Meta:
        unique_together = (('sid','pid'))
        managed = False

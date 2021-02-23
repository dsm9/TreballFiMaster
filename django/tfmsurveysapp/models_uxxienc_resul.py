# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


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


class Sb100MetaSurvey(models.Model):
    sid = models.IntegerField(blank=True, null=True)
    metadato = models.CharField(max_length=20, blank=True, null=True)
    valor = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'SB_100_META_SURVEY'


class Sb100MetaUser(models.Model):
    sid = models.IntegerField(blank=True, null=True)
    tid = models.IntegerField(blank=True, null=True)
    participant_id = models.CharField(max_length=50, blank=True, null=True)
    token = models.CharField(max_length=100, blank=True, null=True)
    fieldname = models.CharField(max_length=12, blank=True, null=True)
    attribute_name = models.CharField(max_length=255, blank=True, null=True)
    attribute_value = models.CharField(max_length=255, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'SB_100_META_USER'


class Sb100Res(models.Model):
    sid = models.IntegerField(blank=True, null=True)
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

    class Meta:
        managed = False
        db_table = 'SB_100_RES'

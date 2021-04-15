from django.db import models
from django.urls import reverse

# Create your models here.

# Database TFMSURVEYSAPP

class CampaignType(models.Model):
    cod_tipo_campania_lime = models.IntegerField("Codi tipus campanya Lime")
    name = models.CharField("Nom", max_length=100)

    def __str__(self):
        return self.name

class Campaign(models.Model):
    type_campaign = models.ForeignKey(CampaignType, on_delete=models.CASCADE)
    cod_campania_lime = models.IntegerField("Codi campania Lime")
    fecha_extraccion_lime = models.DateField("Data extracció Lime")
    name = models.CharField("Nom", max_length=50)
    import_date = models.DateField("Data importació")

    def get_absolute_url(self):
        return reverse('tfmsurveysapp:commments_list', kwargs={'pk': self.pk})

    def __str__(self):
        return self.name

class Survey(models.Model):
    campaign = models.ForeignKey(Campaign, on_delete=models.CASCADE)
    cod_encuesta_lime = models.IntegerField("Codi enquesta Lime")
    sid_lime = models.IntegerField("sid")
    name = models.CharField("Nom", max_length=1024)

    def __str__(self):
        return self.name

class Professor(models.Model):
    survey = models.ForeignKey(Survey, on_delete=models.CASCADE)
    sid_lime = models.IntegerField("sid")
    pid_lime = models.CharField("Num. professor", max_length= 2)
    name = models.CharField("Nom professor", max_length=50)
    surname1 = models.CharField("Cognom1 professor", max_length=50)
    surname2 = models.CharField("Cognom2 professor", max_length=50, null=True)

    def __str__(self):
        return self.surname1 + ' ' + self.surname2 + ', ' + self.name

class IssueType(models.Model):
    name = models.CharField("Nom", max_length=50)

    def __str__(self):
        return self.name

class SolutionType(models.Model):
    name = models.CharField("Nom", max_length=50)

    def __str__(self):
        return self.name

class Comment(models.Model):
    survey = models.ForeignKey(Survey, on_delete=models.CASCADE)
    qid_lime = models.IntegerField("qid Lime")
    tid_lime = models.IntegerField("Cod enquestat Lime")
    question_id_lime = models.CharField("Cod pregunta Lime", max_length=10, null=True)
    question = models.CharField("Pregunta", max_length=500, null=True)
    block_type = models.CharField("Tipus pregunta", max_length=1)
    professor = models.ForeignKey(Professor, on_delete=models.CASCADE, null=True)
    original_value = models.CharField("Comentari original", max_length=2000)
    new_value = models.CharField("Comentari nou", max_length=2000, null=True)
    issue_type = models.ForeignKey(IssueType, on_delete=models.CASCADE, null=True, blank=True)
    solution_type = models.ForeignKey(SolutionType, on_delete=models.CASCADE, null=True, blank=True)
    changed = models.BooleanField("Modificat", default=False)

    def __str__(self):
        return self.original_value

    def get_absolute_url(self):
        return reverse('tfmsurveysapp:comment_detail', kwargs={'cod_campania_lime': self.survey.campaign.cod_campania_lime, 'pk': self.pk})

class CommentIssue(models.Model):
    comment = models.ForeignKey(Comment, on_delete=models.CASCADE)
    issue_type = models.ForeignKey(IssueType, on_delete=models.CASCADE, null=True)

class CommentSolution(models.Model):
    comment = models.ForeignKey(Comment, on_delete=models.CASCADE)
    solution_type = models.ForeignKey(SolutionType, on_delete=models.CASCADE, null=True)

# Database ENCUESTAS

#class TipoCampania(models.Model):
#    cod_tipo_campania = models.AutoField(db_column='COD_TIPO_CAMPANIA', primary_key=True)  # Field name made lowercase.
#    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100, blank=True, null=True)  # Field name made lowercase.
#    editable = models.CharField(db_column='EDITABLE', max_length=1)  # Field name made lowercase.
#    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
#    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.
#
#    class Meta:
#        managed = False
#        db_table = 'TIPO_CAMPANIA'


# Database UXXIENC_RESUL

#class CampaniasExtraidas(models.Model):
#    idextraccion = models.AutoField(db_column='idExtraccion', primary_key=True)  # Field name made lowercase.
#    codcampania = models.IntegerField(db_column='codCampania', unique=True)  # Field name made lowercase.
#    nombrecampania = models.CharField(db_column='nombreCampania', max_length=50)  # Field name made lowercase.
#    descripcioncampania = models.CharField(db_column='descripcionCampania', max_length=256)  # Field name made lowercase.
#    tipocampania = models.CharField(db_column='tipoCampania', max_length=50)  # Field name made lowercase.
#    formatotitulo = models.CharField(db_column='formatoTitulo', max_length=512)  # Field name made lowercase.
#    estado = models.CharField(max_length=50)
#    fechaextraccion = models.DateTimeField(db_column='fechaExtraccion', blank=True, null=True)  # Field name made lowercase.
#
#    class Meta:
#        managed = False
#        db_table = 'CAMPANIAS_EXTRAIDAS'


# python3 manage.py makemigrations tfmsurveysapp

# python3 manage.py migrate
from django.db import models

# Create your models here.


class CampaignType(models.Model):
    cod_tipo_campania_lime = models.IntegerField("Codi tipus campanya Lime")
    name = models.CharField("Nom", max_length=100)


class Campaign(models.Model):
    type_campaign = models.ForeignKey(CampaignType, on_delete=models.CASCADE)
    cod_campania_lime = models.IntegerField("Codi campania Lime")
    fecha_extraccion_lime = models.DateField("Data extracció Lime")
    name = models.CharField("Nom", max_length=50)
    import_date = models.DateField("Data importació")


class Survey(models.Model):
    campaign = models.ForeignKey(Campaign, on_delete=models.CASCADE)
    cod_encuesta_lime = models.IntegerField("Codi enquesta Lime")
    sid_lime = models.IntegerField("sid")
    name = models.CharField("Nom", max_length=1024)


class IssueType(models.Model):
    name = models.CharField("Nom", max_length=50)


class SolutionType(models.Model):
   name = models.CharField("Nom", max_length=50)


class Comment(models.Model):
    survey = models.ForeignKey(Survey, on_delete=models.CASCADE)
    qid_lime = models.IntegerField("Cod pregunta Lime")
    tid_lime = models.IntegerField("Cod enquestat Lime")
    name = models.CharField("Nom", max_length=500)
    bloq_type = models.CharField("Tipus bloc", max_length=1)
    prof_name = models.CharField("Nom professor", max_length=50)
    prof_surname1 = models.CharField("Cognom1 professor", max_length=50)
    prof_surname2 = models.CharField("Cognom2 professor", max_length=50)
    original_value = models.CharField("Comentari original", max_length=2000)
    new_value = models.CharField("Comentari nou", max_length=2000)
    issue_type = models.ForeignKey(IssueType, on_delete=models.CASCADE)
    solution_type = models.ForeignKey(SolutionType, on_delete=models.CASCADE)

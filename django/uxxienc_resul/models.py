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


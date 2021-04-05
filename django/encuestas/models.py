from django.db import models

# Create your models here.

# Database encuestas

class TipoCampania(models.Model):
    cod_tipo_campania = models.AutoField(db_column='COD_TIPO_CAMPANIA', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100, blank=True, null=True)  # Field name made lowercase.
    editable = models.CharField(db_column='EDITABLE', max_length=1)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_CAMPANIA'

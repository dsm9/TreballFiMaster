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

class Campania(models.Model):
    cod_campania = models.AutoField(db_column='COD_CAMPANIA', primary_key=True)  # Field name made lowercase.
    tipo_campania = models.ForeignKey('TipoCampania', models.DO_NOTHING, db_column='COD_TIPO_CAMPANIA')  # Field name made lowercase.
    nombre_campania = models.CharField(db_column='NOMBRE_CAMPANIA', max_length=50)  # Field name made lowercase.
    descripcion_campania = models.CharField(db_column='DESCRIPCION_CAMPANIA', max_length=256)  # Field name made lowercase.
    #cod_fuente_datos = models.ForeignKey('FuenteDatos', models.DO_NOTHING, db_column='COD_FUENTE_DATOS')  # Field name made lowercase.
    cod_fuente_datos = models.IntegerField(db_column='COD_FUENTE_DATOS')
    cod_esquema_config_campos = models.IntegerField(db_column='COD_ESQUEMA_CONFIG_CAMPOS')
    #cod_esquema_config_campos = models.ForeignKey('EsquemaConfigCampos', models.DO_NOTHING, db_column='COD_ESQUEMA_CONFIG_CAMPOS')  # Field name made lowercase.
    cod_filtro = models.IntegerField(db_column='COD_FILTRO')
    #cod_filtro = models.ForeignKey('Filtro', models.DO_NOTHING, db_column='COD_FILTRO', blank=True, null=True)  # Field name made lowercase.
    formato_titulo = models.CharField(db_column='FORMATO_TITULO', max_length=512)  # Field name made lowercase.
    cod_plantilla = models.IntegerField(db_column='COD_PLANTILLA')  # Field name made lowercase.
    cod_estado = models.IntegerField(db_column='COD_ESTADO')
    #cod_estado = models.ForeignKey('Estado', models.DO_NOTHING, db_column='COD_ESTADO')  # Field name made lowercase.
    fecha_estado = models.DateTimeField(db_column='FECHA_ESTADO')  # Field name made lowercase.
    fecha_creacion = models.DateTimeField(db_column='FECHA_CREACION')  # Field name made lowercase.
    fecha_carga = models.DateTimeField(db_column='FECHA_CARGA', blank=True, null=True)  # Field name made lowercase.
    fecha_traspaso = models.DateTimeField(db_column='FECHA_TRASPASO', blank=True, null=True)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.
    origen_email_oid = models.CharField(db_column='ORIGEN_EMAIL_OID', max_length=1, blank=True, null=True)  # Field name made lowercase.
    estado_borrado = models.CharField(db_column='ESTADO_BORRADO', max_length=25, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CAMPANIA'

class Encuesta(models.Model):
    cod_encuesta = models.AutoField(db_column='COD_ENCUESTA', primary_key=True)  # Field name made lowercase.
    campania = models.ForeignKey(Campania, models.DO_NOTHING, db_column='COD_CAMPANIA')  # Field name made lowercase.
    titulo = models.CharField(db_column='TITULO', max_length=1024)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.
    estado = models.CharField(db_column='ESTADO', max_length=10)  # Field name made lowercase.
    traspaso = models.CharField(db_column='TRASPASO', max_length=5)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTA'

# This is an auto-generated Django model module, created running:
# python3 manage.py inspectdb --database encuestas > models_encuestas.py
#
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class ActivacionTipoEncuesta(models.Model):
    cod_campo_activacion = models.ForeignKey('CampoActivacion', models.DO_NOTHING, db_column='COD_CAMPO_ACTIVACION', primary_key=True)  # Field name made lowercase.
    cod_tipo_encuesta = models.ForeignKey('TipoEncuesta', models.DO_NOTHING, db_column='COD_TIPO_ENCUESTA')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ACTIVACION_TIPO_ENCUESTA'
        unique_together = (('cod_campo_activacion', 'cod_tipo_encuesta'),)


class Campania(models.Model):
    cod_campania = models.AutoField(db_column='COD_CAMPANIA', primary_key=True)  # Field name made lowercase.
    cod_tipo_campania = models.ForeignKey('TipoCampania', models.DO_NOTHING, db_column='COD_TIPO_CAMPANIA')  # Field name made lowercase.
    nombre_campania = models.CharField(db_column='NOMBRE_CAMPANIA', max_length=50)  # Field name made lowercase.
    descripcion_campania = models.CharField(db_column='DESCRIPCION_CAMPANIA', max_length=256)  # Field name made lowercase.
    cod_fuente_datos = models.ForeignKey('FuenteDatos', models.DO_NOTHING, db_column='COD_FUENTE_DATOS')  # Field name made lowercase.
    cod_esquema_config_campos = models.ForeignKey('EsquemaConfigCampos', models.DO_NOTHING, db_column='COD_ESQUEMA_CONFIG_CAMPOS')  # Field name made lowercase.
    cod_filtro = models.ForeignKey('Filtro', models.DO_NOTHING, db_column='COD_FILTRO', blank=True, null=True)  # Field name made lowercase.
    formato_titulo = models.CharField(db_column='FORMATO_TITULO', max_length=512)  # Field name made lowercase.
    cod_plantilla = models.IntegerField(db_column='COD_PLANTILLA')  # Field name made lowercase.
    cod_estado = models.ForeignKey('Estado', models.DO_NOTHING, db_column='COD_ESTADO')  # Field name made lowercase.
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


class CampaniaValorActivacion(models.Model):
    cod_campania = models.AutoField(db_column='COD_CAMPANIA', primary_key=True)  # Field name made lowercase.
    cod_campo_activacion = models.ForeignKey('CampoActivacion', models.DO_NOTHING, db_column='COD_CAMPO_ACTIVACION')  # Field name made lowercase.
    cod_tipo_encuesta = models.ForeignKey('TipoEncuesta', models.DO_NOTHING, db_column='COD_TIPO_ENCUESTA')  # Field name made lowercase.
    valor = models.DateTimeField(db_column='VALOR')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CAMPANIA_VALOR_ACTIVACION'
        unique_together = (('cod_campania', 'cod_campo_activacion', 'cod_tipo_encuesta'),)


class CampoActivacion(models.Model):
    cod_campo_activacion = models.AutoField(db_column='COD_CAMPO_ACTIVACION', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CAMPO_ACTIVACION'


class CampoFuente(models.Model):
    cod_campo_fuente = models.AutoField(db_column='COD_CAMPO_FUENTE', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50)  # Field name made lowercase.
    cod_tipo_fuente_datos = models.ForeignKey('TipoFuenteDatos', models.DO_NOTHING, db_column='COD_TIPO_FUENTE_DATOS')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CAMPO_FUENTE'


class ConceptoObligatorio(models.Model):
    cod_concepto_obligatorio = models.AutoField(db_column='COD_CONCEPTO_OBLIGATORIO', primary_key=True)  # Field name made lowercase.
    cod_tipo_encuesta = models.ForeignKey('TipoEncuesta', models.DO_NOTHING, db_column='COD_TIPO_ENCUESTA')  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100)  # Field name made lowercase.
    objeto = models.CharField(db_column='OBJETO', max_length=12)  # Field name made lowercase.
    cod_tipo_campo = models.ForeignKey('TipoCampo', models.DO_NOTHING, db_column='COD_TIPO_CAMPO')  # Field name made lowercase.
    cod_tipo_concepto = models.ForeignKey('TipoConcepto', models.DO_NOTHING, db_column='COD_TIPO_CONCEPTO')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'CONCEPTO_OBLIGATORIO'


class Encuesta(models.Model):
    cod_encuesta = models.AutoField(db_column='COD_ENCUESTA', primary_key=True)  # Field name made lowercase.
    cod_campania = models.ForeignKey(Campania, models.DO_NOTHING, db_column='COD_CAMPANIA')  # Field name made lowercase.
    titulo = models.CharField(db_column='TITULO', max_length=1024)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.
    estado = models.CharField(db_column='ESTADO', max_length=10)  # Field name made lowercase.
    traspaso = models.CharField(db_column='TRASPASO', max_length=5)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTA'


class Encuestado(models.Model):
    cod_encuestado = models.AutoField(db_column='COD_ENCUESTADO', primary_key=True)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTADO'


class EncuestaEncuestado(models.Model):
    cod_encuesta = models.ForeignKey(Encuesta, models.DO_NOTHING, db_column='COD_ENCUESTA', primary_key=True)  # Field name made lowercase.
    cod_encuestado = models.ForeignKey(Encuestado, models.DO_NOTHING, db_column='COD_ENCUESTADO')  # Field name made lowercase.
    bloqueado = models.CharField(db_column='BLOQUEADO', max_length=1)  # Field name made lowercase.
    estado = models.CharField(db_column='ESTADO', max_length=10)  # Field name made lowercase.
    traspaso = models.CharField(db_column='TRASPASO', max_length=5)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTA_ENCUESTADO'
        unique_together = (('cod_encuesta', 'cod_encuestado'),)


class EncuestaExcluida(models.Model):
    cod_encuesta_excluida = models.AutoField(db_column='COD_ENCUESTA_EXCLUIDA', primary_key=True)  # Field name made lowercase.
    cod_campania = models.ForeignKey(Campania, models.DO_NOTHING, db_column='COD_CAMPANIA')  # Field name made lowercase.
    identificador_encuesta = models.CharField(db_column='IDENTIFICADOR_ENCUESTA', max_length=250)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTA_EXCLUIDA'


class EncuestaVisualizador(models.Model):
    cod_encuesta = models.ForeignKey(Encuesta, models.DO_NOTHING, db_column='COD_ENCUESTA', primary_key=True)  # Field name made lowercase.
    cod_visualizador = models.ForeignKey('Visualizador', models.DO_NOTHING, db_column='COD_VISUALIZADOR')  # Field name made lowercase.
    estado = models.CharField(db_column='ESTADO', max_length=10)  # Field name made lowercase.
    traspaso = models.CharField(db_column='TRASPASO', max_length=5)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ENCUESTA_VISUALIZADOR'
        unique_together = (('cod_encuesta', 'cod_visualizador'),)


class EsquemaConfigCampos(models.Model):
    cod_esquema_config_campos = models.AutoField(db_column='COD_ESQUEMA_CONFIG_CAMPOS', primary_key=True)  # Field name made lowercase.
    nombre = models.CharField(db_column='NOMBRE', max_length=100)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=256)  # Field name made lowercase.
    cod_tipo_encuesta = models.ForeignKey('TipoEncuesta', models.DO_NOTHING, db_column='COD_TIPO_ENCUESTA')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ESQUEMA_CONFIG_CAMPOS'


class Estado(models.Model):
    cod_estado = models.AutoField(db_column='COD_ESTADO', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', unique=True, max_length=50)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'ESTADO'





class Filtro(models.Model):
    cod_filtro = models.AutoField(db_column='COD_FILTRO', primary_key=True)  # Field name made lowercase.
    valor = models.CharField(db_column='VALOR', max_length=2048)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'FILTRO'


class FuenteDatos(models.Model):
    cod_fuente_datos = models.AutoField(db_column='COD_FUENTE_DATOS', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100)  # Field name made lowercase.
    cod_tipo_fuente_datos = models.ForeignKey('TipoFuenteDatos', models.DO_NOTHING, db_column='COD_TIPO_FUENTE_DATOS')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.
    estado = models.CharField(db_column='ESTADO', max_length=12, blank=True, null=True)  # Field name made lowercase.
    pid_upload = models.CharField(db_column='PID_UPLOAD', max_length=12, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'FUENTE_DATOS'


class IdentificadorEncuesta(models.Model):
    cod_identificador_encuesta = models.AutoField(db_column='COD_IDENTIFICADOR_ENCUESTA', primary_key=True)  # Field name made lowercase.
    cod_mapa_campos = models.ForeignKey('MapaCampos', models.DO_NOTHING, db_column='COD_MAPA_CAMPOS')  # Field name made lowercase.
    valor_campo = models.CharField(db_column='VALOR_CAMPO', max_length=2048)  # Field name made lowercase.
    cod_encuesta = models.ForeignKey(Encuesta, models.DO_NOTHING, db_column='COD_ENCUESTA')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'IDENTIFICADOR_ENCUESTA'


class IdentificadorEncuestado(models.Model):
    cod_identificador_encuestado = models.AutoField(db_column='COD_IDENTIFICADOR_ENCUESTADO', primary_key=True)  # Field name made lowercase.
    cod_mapa_campos = models.ForeignKey('MapaCampos', models.DO_NOTHING, db_column='COD_MAPA_CAMPOS')  # Field name made lowercase.
    valor_campo = models.CharField(db_column='VALOR_CAMPO', max_length=2048)  # Field name made lowercase.
    cod_encuestado = models.ForeignKey(Encuestado, models.DO_NOTHING, db_column='COD_ENCUESTADO')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'IDENTIFICADOR_ENCUESTADO'


class Idioma(models.Model):
    cod_idioma = models.AutoField(db_column='COD_IDIOMA', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50, blank=True, null=True)  # Field name made lowercase.
    codigo_iso = models.CharField(db_column='CODIGO_ISO', max_length=10, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'IDIOMA'


class Log(models.Model):
    cod_log = models.AutoField(db_column='COD_LOG', primary_key=True)  # Field name made lowercase.
    nombre_tabla = models.CharField(db_column='NOMBRE_TABLA', max_length=50)  # Field name made lowercase.
    cod_identificador = models.IntegerField(db_column='COD_IDENTIFICADOR', blank=True, null=True)  # Field name made lowercase.
    nombre_columna = models.CharField(db_column='NOMBRE_COLUMNA', max_length=50)  # Field name made lowercase.
    valor_anterior = models.CharField(db_column='VALOR_ANTERIOR', max_length=2048, blank=True, null=True)  # Field name made lowercase.
    valor_actual = models.CharField(db_column='VALOR_ACTUAL', max_length=2048, blank=True, null=True)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'LOG'


class MapaCampos(models.Model):
    cod_mapa_campos = models.AutoField(db_column='COD_MAPA_CAMPOS', primary_key=True)  # Field name made lowercase.
    cod_esquema_config_campos = models.ForeignKey(EsquemaConfigCampos, models.DO_NOTHING, db_column='COD_ESQUEMA_CONFIG_CAMPOS')  # Field name made lowercase.
    concepto = models.CharField(db_column='CONCEPTO', max_length=15)  # Field name made lowercase.
    nombre_campo = models.CharField(db_column='NOMBRE_CAMPO', max_length=50)  # Field name made lowercase.
    cod_tipo_campo = models.ForeignKey('TipoCampo', models.DO_NOTHING, db_column='COD_TIPO_CAMPO')  # Field name made lowercase.
    cod_tipo_concepto = models.ForeignKey('TipoConcepto', models.DO_NOTHING, db_column='COD_TIPO_CONCEPTO')  # Field name made lowercase.
    objeto = models.CharField(db_column='OBJETO', max_length=12)  # Field name made lowercase.
    editable = models.CharField(db_column='EDITABLE', max_length=1)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'MAPA_CAMPOS'


class MetadatoEncuesta(models.Model):
    cod_metadato_encuesta = models.AutoField(db_column='COD_METADATO_ENCUESTA', primary_key=True)  # Field name made lowercase.
    cod_mapa_campos = models.ForeignKey(MapaCampos, models.DO_NOTHING, db_column='COD_MAPA_CAMPOS')  # Field name made lowercase.
    valor_campo = models.CharField(db_column='VALOR_CAMPO', max_length=2048)  # Field name made lowercase.
    valor_campo_blob = models.TextField(db_column='VALOR_CAMPO_BLOB')  # Field name made lowercase.
    cod_encuesta = models.ForeignKey(Encuesta, models.DO_NOTHING, db_column='COD_ENCUESTA')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'METADATO_ENCUESTA'


class MetadatoEncuestado(models.Model):
    cod_metadato_encuestado = models.AutoField(db_column='COD_METADATO_ENCUESTADO', primary_key=True)  # Field name made lowercase.
    cod_encuestado = models.ForeignKey(Encuestado, models.DO_NOTHING, db_column='COD_ENCUESTADO')  # Field name made lowercase.
    cod_campania = models.ForeignKey(Campania, models.DO_NOTHING, db_column='COD_CAMPANIA')  # Field name made lowercase.
    cod_encuesta = models.ForeignKey(Encuesta, models.DO_NOTHING, db_column='COD_ENCUESTA')  # Field name made lowercase.
    cod_mapa_campos = models.ForeignKey(MapaCampos, models.DO_NOTHING, db_column='COD_MAPA_CAMPOS')  # Field name made lowercase.
    valor_campo = models.CharField(db_column='VALOR_CAMPO', max_length=2048)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'METADATO_ENCUESTADO'


class TipoCampania(models.Model):
    cod_tipo_campania = models.AutoField(db_column='COD_TIPO_CAMPANIA', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100, blank=True, null=True)  # Field name made lowercase.
    editable = models.CharField(db_column='EDITABLE', max_length=1)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_CAMPANIA'


class TipoCampo(models.Model):
    cod_tipo_campo = models.AutoField(db_column='COD_TIPO_CAMPO', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_CAMPO'


class TipoConcepto(models.Model):
    cod_tipo_concepto = models.AutoField(db_column='COD_TIPO_CONCEPTO', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_CONCEPTO'


class TipoEncuesta(models.Model):
    cod_tipo_encuesta = models.AutoField(db_column='COD_TIPO_ENCUESTA', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=100)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_ENCUESTA'


class TipoFuenteDatos(models.Model):
    cod_tipo_fuente_datos = models.AutoField(db_column='COD_TIPO_FUENTE_DATOS', primary_key=True)  # Field name made lowercase.
    descripcion = models.CharField(db_column='DESCRIPCION', max_length=50)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'TIPO_FUENTE_DATOS'


class Users(models.Model):
    user_id = models.AutoField(db_column='USER_ID', primary_key=True)  # Field name made lowercase.
    user_email = models.CharField(db_column='USER_EMAIL', max_length=256, blank=True, null=True)  # Field name made lowercase.
    user_pass = models.CharField(db_column='USER_PASS', max_length=60, blank=True, null=True)  # Field name made lowercase.
    user_date = models.DateTimeField(db_column='USER_DATE', blank=True, null=True)  # Field name made lowercase.
    user_modified = models.DateTimeField(db_column='USER_MODIFIED', blank=True, null=True)  # Field name made lowercase.
    user_last_login = models.DateTimeField(db_column='USER_LAST_LOGIN', blank=True, null=True)  # Field name made lowercase.
    user_token = models.CharField(db_column='USER_TOKEN', max_length=256)  # Field name made lowercase.
    user_token_gr = models.CharField(db_column='USER_TOKEN_GR', max_length=256)  # Field name made lowercase.
    user_doc_type = models.CharField(db_column='USER_DOC_TYPE', max_length=10, blank=True, null=True)  # Field name made lowercase.
    user_doc_num = models.CharField(db_column='USER_DOC_NUM', max_length=200, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'USERS'


class ValorFuenteDatos(models.Model):
    cod_valor_fuente_datos = models.AutoField(db_column='COD_VALOR_FUENTE_DATOS', primary_key=True)  # Field name made lowercase.
    valor = models.CharField(db_column='VALOR', max_length=256)  # Field name made lowercase.
    cod_fuente_datos = models.ForeignKey(FuenteDatos, models.DO_NOTHING, db_column='COD_FUENTE_DATOS')  # Field name made lowercase.
    cod_campo_fuente = models.ForeignKey(CampoFuente, models.DO_NOTHING, db_column='COD_CAMPO_FUENTE')  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'VALOR_FUENTE_DATOS'


class Visualizador(models.Model):
    cod_visualizador = models.AutoField(db_column='COD_VISUALIZADOR', primary_key=True)  # Field name made lowercase.
    identificador = models.CharField(db_column='IDENTIFICADOR', max_length=50)  # Field name made lowercase.
    email = models.CharField(db_column='EMAIL', max_length=50)  # Field name made lowercase.
    fecha_modificacion = models.DateTimeField(db_column='FECHA_MODIFICACION', blank=True, null=True)  # Field name made lowercase.
    usuario_modificacion = models.CharField(db_column='USUARIO_MODIFICACION', max_length=50, blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'VISUALIZADOR'


class CampaniaEntidades(models.Model):
    id_campania_entidad = models.AutoField(primary_key=True)
    cod_campania = models.ForeignKey(Campania, models.DO_NOTHING, db_column='cod_campania')
    id_entidad = models.ForeignKey('Entidades', models.DO_NOTHING, db_column='id_entidad')

    class Meta:
        managed = False
        db_table = 'campania_entidades'


class Entidades(models.Model):
    entidad_id = models.AutoField(primary_key=True)
    entidad_descripcion = models.CharField(max_length=50, blank=True, null=True)
    global_field = models.CharField(db_column='global', max_length=1, blank=True, null=True)  # Field renamed because it was a Python reserved word.

    class Meta:
        managed = False
        db_table = 'entidades'


class Funcionalidades(models.Model):
    funcionalidad_id = models.AutoField(primary_key=True)
    funcionalidad_cod = models.CharField(unique=True, max_length=5)
    funcionalidad_nombre = models.CharField(max_length=50)
    funcionalidad_desc = models.CharField(max_length=100, blank=True, null=True)
    funcionalidad_url = models.CharField(max_length=100, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'funcionalidades'


class FuncionalidadesPerfiles(models.Model):
    funcionalidad_perfil_id = models.AutoField(primary_key=True)
    funcionalidad = models.ForeignKey(Funcionalidades, models.DO_NOTHING)
    perfil = models.ForeignKey('Perfiles', models.DO_NOTHING)

    class Meta:
        managed = False
        db_table = 'funcionalidades_perfiles'


class OcuEncuestasCargaUsuarios(models.Model):
    estado = models.CharField(max_length=4)
    fecha_inicio_ejec = models.IntegerField(blank=True, null=True)
    fecha_fin_ejec = models.IntegerField(blank=True, null=True)
    usuario = models.CharField(max_length=255)
    mensaje = models.TextField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ocu_encuestas_carga_usuarios'


class Perfiles(models.Model):
    perfil_id = models.AutoField(primary_key=True)
    perfil_cod = models.CharField(unique=True, max_length=20)
    perfil_descripcion = models.CharField(max_length=50, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'perfiles'


class PerfilesEntidades(models.Model):
    perfil_entidad_id = models.AutoField(primary_key=True)
    perfil = models.ForeignKey(Perfiles, models.DO_NOTHING)
    entidad = models.ForeignKey(Entidades, models.DO_NOTHING)

    class Meta:
        managed = False
        db_table = 'perfiles_entidades'


class PerfilesEntidadesUsuarios(models.Model):
    perfil_entidad_usuario_id = models.AutoField(primary_key=True)
    perfil_entidad = models.ForeignKey(PerfilesEntidades, models.DO_NOTHING)
    user = models.ForeignKey(Users, models.DO_NOTHING)

    class Meta:
        managed = False
        db_table = 'perfiles_entidades_usuarios'

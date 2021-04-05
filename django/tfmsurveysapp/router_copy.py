class EncuestasRouter:
    """
    A router to control all database operations on models in the
    Encuestas applications.
    """
    route_encuestas = {'tipocampania'}
    route_uxxienc_resul = {'campaniasextraidas'}

    def db_for_read(self, model, **hints):
        """
        Attempts to read TipoCampania models go to Encuestas db.
        """
        model_name = model._meta.label_lower
        pos = model_name.find('.')
        table_name = model_name[pos+1:]
        if table_name in self.route_encuestas:
            return 'encuestas'
        elif table_name in self.route_uxxienc_resul:
            return 'uxxienc_resul'
        return None

    def db_for_write(self, model, **hints):
        """
        Attempts to write TipoCampania models go to Encuestas db.
        """
        if model._meta.label_lower in self.route_encuestas:
            return 'encuestas'
        elif model._meta.label_lower in self.route_uxxienc_resul:
            return 'uxxienc_resul'
        return None

    def allow_relation(self, obj1, obj2, **hints):
        """
        Allow relations if a model in the auth or contenttypes apps is
        involved.
        """
        if (
            obj1._meta.label_lower in self.route_encuestas or
            obj2._meta.label_lower in self.route_encuestas
        ):
           return True
        return None

    def allow_migrate(self, db, app_label, model_name=None, **hints):
        """
        Make sure the models only appear in the
        'Encuestas' database.
        """
        if model_name in self.route_encuestas:
            return db == 'encuestas'
        elif model_name in self.route_uxxienc_resul:
            return db == 'uxxienc_resul'
        return None

class EncuestasRouter:
    """
    A router to control all database operations on models in the
    Encuestas applications.
    """
    route_app_labels = {'tipocampania'}

    def db_for_read(self, model, **hints):
        """
        Attempts to read TipoCampania models go to Encuestas db.
        """
        if model._meta.label_lower in self.route_app_labels:
            return 'encuestas'
        return None

    def db_for_write(self, model, **hints):
        """
        Attempts to write TipoCampania models go to Encuestas db.
        """
        if model._meta.label_lower in self.route_app_labels:
            return 'encuestas'
        return None

    def allow_relation(self, obj1, obj2, **hints):
        """
        Allow relations if a model in the auth or contenttypes apps is
        involved.
        """
        if (
            obj1._meta.label_lower in self.route_app_labels or
            obj2._meta.label_lower in self.route_app_labels
        ):
           return True
        return None

    def allow_migrate(self, db, app_label, model_name=None, **hints):
        """
        Make sure the models only appear in the
        'Encuestas' database.
        """
        if app_label in self.route_app_labels:
            return db == 'encuestas'
        return None

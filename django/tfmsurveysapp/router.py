class EncuestasRouter:
    """
    A router to control all database operations on models e
    Models go to db with same name than his app
    """
    route_app_labels = {'encuestas', 'lime', 'uxxienc_resul'}

    def db_for_read(self, model, **hints):
        """
        Attempts to read models
        """
        if model._meta.app_label in self.route_app_labels:
            return model._meta.app_label
        return None

    def db_for_write(self, model, **hints):
        """
        Attempts to write models
        """
        if model._meta.app_label in self.route_app_labels:
            return model._meta.app_label
        return None

    def allow_relation(self, obj1, obj2, **hints):
        """
        Allow relations if models are in the same app
        """
        if (obj1._meta.app_label == obj2._meta.app_label):
           return True
        else:
            return None

    def allow_migrate(self, db, app_label, model_name=None, **hints):
        """
        Make sure the models only appear in his database
        """
        if app_label in self.route_app_labels:
            return (db == app_label)
        return False

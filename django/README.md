TFMSurveys
==========
Master Final Project application for the analysis and correction of comments in the UdL surveys.

The project is developed following an Agile Behavious Driven Development approach.

The source code for this project is available from:

[https://github.com/dsm9/TreballFiMaster](https://github.com/dsm9/TreballFiMaster)

Starting the project
====================

The first step is create the folder for the new project. called 'tfmsurveys'.

The next step is activate the pipenv virtual environment, install Django and create a new Django project:

```shell script
$ pipenv shell

$ pipenv install Django

$ django-admin startproject tfmsurveys
```

The only app in the project, called 'tfmsurveysapp', is created:

```
$ python3 manage.py startapp tfmsurveyapp
```

And this app is registered int the *tfmsurveys/settings.py* file:

```
INSTALLED_APPS = [
    'tfmsurveysapp',
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
]
```

Creating database model
=======================
`
Database settings of the App are defined in *tfmsurveis/settings.py*:

```
DATABASES = {
    'default': {
               'ENGINE': 'django.db.backends.mysql',
                'NAME': 'tfm_surveys',
                'USER': 'tfm',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    }
}
```

Also are defined the databases of the original surveys app, Lime:

```
    'lime': {
               'ENGINE': 'django.db.backends.mysql',
                'NAME': 'encuestas',
                'USER': 'lime',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    },
    'uxxienc_result': {
               'ENGINE': 'django.db.backends.mysql',
                'NAME': 'uxxienc_result',
                'USER': 'lime',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    }
```

After this database are activate by Django and system tables are created. And also admin is created:

```
$ python3 manage.py migrate

$ python3 manage.py createsuperuser
```

With the database created the model is implemented. In the *tfmsurveyscom/models.py* are defined the classes of the model:

```
class CampaignType(models.Model):
    ...

class Campaign(models.Model):
    ...

class Survey(models.Model):
    ...

class IssueType(models.Model):
    ...

class SolutionType(models.Model):
    ...

class Comment(models.Model):
    ...

``` 

In the *tfmsurveys/settting.ph* the app name is modified to activate the model:

```
INSTALLED_APPS = [
    'tfmsurveysapp.apps.TfmsurveysappConfig',
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
]
```

The app models are included and the the model tables are created in the database:

```
$ python3 manage.py makemigrations tfmsurveysapp

$ python3 manage.py migrate
```



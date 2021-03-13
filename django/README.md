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

Agile Behaviour Driven Development (BDD)
========================================
Following the Agile Behavour Drive Development the features of the project have been defined:

The goal of this application it's manage de revision, analysis and modification of comments in the surveys of the UdL.

The detected features are:

The intended features of the application are:
- Login
- List Campaign Surveys
- List Survey comments
- Edit Comment

To facilitate the description of the feature scenarios will be used the Gherkin syntax an the Behave tool.

And to test the application in a browser will be used Splinter. 

Also it's necessary install ChromeDriver to make possible automate testing with Chome.

The commands to install behave and splinter are:

```
$ pipenv install behave

$ pipenv install splinter

$ apt install chromium-chromedriver
``` 

Environment
===========
We also need to configure the testing environment. In this case, the Django application tfmsurveysapp.

We do so in a file in the *features/* folder called *environment.py*:

```
import ...

def before_scenario(context, scenario): ...

def after_scenario(context, scenario): ...

def after_all(context): ...

```

This file defines the Django settings to load and test, the context to be passed to each testing step, and then what to:

* **Before all tests**: setting Django, preparing it for testing and a browser session based on PhantomJS to act as the user.
* **Before each scenario**: the Django database is initialized, together with the context to be passed to each scenario step implementation with all the data about the current application status.
* **After each scenario**: the Django database is destroyed so the next scenario will start with a clean one. This way each scenario is independent from previous ones and interferences are avoided.
* **After all tests**: the testing environment is destroyed together with the browser used for testing.

Development of the TfmSurveysApp Features
=========================================

Now, I have implemented the identified features. 

Previously to implement the features we must implement the authentication management since all the features will 
validate the user is logged before show his information.

## Authentication
The first step is link the login an logout views from django.contrib.auth.views in the project urls file, _tfmsurveysapp/urls.py_:


```from django.urls import path, include
from django.contrib import admin
from django.contrib.auth import views

urlpatterns = [
    path('admin/', admin.site.urls),
    path('accounts/login/', views.LoginView.as_view(), name='login'),
    path('accounts/logout/', views.LogoutView.as_view(), name='logout'),
] 
```
Then we might create the login form template in _registration/login.html_, as expected by the Django login view.

We must create the folder _tfmsurveysapp/templates_ and register this folder as default templates folder in _tfmsurveys/settings.py_  

```
TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': [os.path.join(BASE_DIR, 'templates')],
        'APP_DIRS': True,
        ...
```
Following we will create the login form in _templates/registration/login.html_

It must include some minimum elements, for example: specific form _action_, _form.username_ and _form.password_ input texts and hidden _next_ field.

```
<form method="post" action="{% url 'login' %}">
	    <table align="center" border="0" cellpadding="10" cellspacing="0" bgcolor="#831453" style="border:solid thin black;">
            <tr>
                <td class="TextoLogin">{{ form.username.label_tag }}</td>
                <td>{{ form.username }}</td>
            </tr>
            <tr>
                <td class="TextoLogin" >{{ form.password.label_tag }}</td>
                <td>{{ form.password }}</td>
            </tr>
            <tr>
                <td><input type="hidden" name="next" value="{{ next }}"/></td>
            </tr>
            <tr>
	    	    <td colspan="4" align="center">
                    <input type="submit" value="login" />
                </td>
            </tr>
        </table>
    </form>
```
We also might add in all the views a decorator to force Django redirect to the login form in case the user weren't logged. For example:
```
@login_required()
def campaigns_list(request):
    ...
```

And finally we must define in the file _settings.py_ the default redirection file after the login or logout actions. 
In this case we will redirect to the root directory. 

```
LOGIN_REDIRECT_URL = '/'
LOGOUT_REDIRECT_URL = '/'
```

I will start implementing the different steps that constitute each scenario and the application code to make it show the expected behaviour.

## Feature: List Campaign Surveys ##





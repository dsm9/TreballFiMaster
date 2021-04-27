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

If we want the session expires after some time or when the navigator is closed we must defined the following parameters in _settings.py_.

```
SESSION_COOKIE_AGE = 3600
SESSION_EXPIRE_AT_BROWSER_CLOSE = True
```

I will start implementing the different steps that constitute each scenario and the application code to make it show the expected behaviour.

## Feature: List Campaign Surveys ##

This is the first screen of the app and it will show a list of the campaigns exported in the Lime app.

This screen will use de _Campaign_ **model** defined in the _tfmsurveysapp/models.py_ file as we shown in the database creation chapter.

We will create the _campaigns_list_ **view** in the configuration file _tfmsurveys/views.py_. We will create the view using the function-based strategy.

```
@login_required()
def campaigns_list(request):
    campaigns_list=Campaign.objects.all()
    context = {'campaigns_list': campaigns_list}
    return render(request, 'tfmsurveysapp/campaigns_list.html', context)
```

Inside our view we will obtain the information it must be show in it. This is made using the Campaign model, obtaining all his objects and putting the resulting list in the context.

We also must define a template that is a html page indicating the format of the view.

The view have to return the _request_ object, the name of the _template_ and the _context_ with information.

In the _url.py_ configuration file we will define the pattern of the **url** used in the webbrowser to acces to the view.

```
path('', views.campaigns_list, name='campaigns_list')
```
In this case this will be the default page (''), it will use the _campaigns_list_ view and will also have the name _campaigns_list_ when it has to be called form other view.

And finally we must create the **template** with the html format of the page.

Templates will be in the _tfmsurveysapp/templates/tfmsurveysapp_.

The template will contain a header and a footer common for all the templates of the project.

```
{% extends "tfmsurveysapp/base.html" %}
{% block content %}
{% load static %}
...
template's body
...
{% endblock %}
```

The main part of the template will be a table and a loop who creates a new row for every campaign.

```
    {% for campaign in campaigns_list %}
	<tr>
		<td align="center">
				<a href="{% url 'tfmsurveysapp:comments_list' campaign.cod_campania_lime %}">
					{{ campaign.cod_campania_lime }}
				</a>
		</td>
		<td>
				<a href="{% url 'tfmsurveysapp:comments_list' campaign.cod_campania_lime %}">
					{{ campaign.name }}
				</a>
		</td>
		<td align="center">{{ campaign.type_campaign_id }}</td>
		<td>{{ campaign.type_campaign.name }}</td>
        ...
	</tr>
    {% empty %}<div align="center">No existeixen campanyes que acompleixin aquestes condicions.</div>
    {% endfor %}
```

The loop use the variable stored in the context in the view and iterates thrown it.

Information is obtained from the object iterated that is based on the model Campaign.

We have defined a link in the code and name columns to the next view, comments_list. To define the link we use the url 
command, the name of the view in url.py and the id of the campaign. Django creates the absolute url using this information.

Note: This code is a simplification of the original code.

## Feature List Survey comments

This is the second screen of the app where the use can show the comments associated with a campaign.

This screen will use the _Comment_ **model** and some information from his parent models _Survey_ and _Campaign_.

In this case we will create the **view** using the class _CommentsList_ and the generic list class (ListView) supplied by Django.

```
class CommentsList(ListView):
    model = Comment
    context_object_name = 'comments_list'
    template_name = 'tfmsurveysapp/comments_list.html'

    def get_queryset(self):
        return Comment.objects.filter(survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])
```
As in the previous feature we will define the model used for data, the name of the context variable and the html template.

To obtain the information we must create the _get_queryset_ function. In this function we filter the data from Comment model
using the _cod_campania_lime_ passed in the url and obtained from the _kwargs_ object.

The configuration of the **url** is similar than in the previous feature, but we must indicate the view 
it's the _CommentList_ class.

```
path('campaigns/<int:cod_campania_lime>', CommentsList.as_view(), name='comments_list')
```
The contents of the **template** _comments_list_ is similar to the previous one, but with some specific details.

We iterate through the object of the comments_list create in the view and we show the attributes of the comment object.
```
{% for comment in comments_list %}
<tr>
		<td align="center">{{ comment.survey.sid_lime }} {{ comment.id }}</td>
		<td align="left">{{ comment.survey.name }}</td>
		<td align="center">{{ comment.block_type }}</td>
        ...
</tr>
```
Some information aren't in the comment object but in some on the objects linked to it. 
For example: _comment_ has a _survey_ attribute and _survey_ has a _name_ attribute.

The most complex case might be obtain the information from the campaign in which is include the comment. 
This information will be showed outside of the loop and for this reason we must obtain the first element of the list.
For example:

```
{{ comments_list.first.survey.campaign.cod_campania_lime }}
```

### Feature Edit Comment

This feature will create a form where the user can show the details of a comment and it allow editing some of the fields: '_Tipus d'incidencia_', '_Tipus de solucio_' and '_Comentari proposat_'.  

This screen will also use the _Comment_ **model** and some information from the model _Survey_ and _Campaign_. 

We will create the **view** using the new class CommentDetail and the generic editing class (UpdateView) supplied by Django.

```
class CommentDetail(UpdateView):
    model = Comment
    form_class = CommentForm
    template_name = 'tfmsurveysapp/comment_detail.html'
#    success_url = reverse_lazy('tfmsurveysapp:comments_list', kwargs={'cod_campania_lime':'170'})

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['issuetypes_list'] = IssueType.objects.all()
        context['solutiontypes_list'] = SolutionType.objects.all()
        return context

    def get_success_url(self):
        return reverse('tfmsurveysapp:comments_list', kwargs={'cod_campania_lime':self.kwargs['cod_campania_lime']})
``` 

Similar we do in previous features in this class we will define the model that contains the information, the name of the context variable and the html template.

But we have also to override the _get_context_data_ function, to obtain from the _Issuetype_ model the list of types of issue 
and from the _SolutionType_ model the list of types of solution. And we save the resulting list in the context.

The UpdateView class allows define the _succes_url_ parameter with the destination after validate and save the information contained in the form.
But in this case we need pass to the destination address the code of the campaign and the _succes_url_ doesn't allow include a variable value.
To solve this problem we must override the _get_success_url_ function and obtain the address using de _reverse_ function.
 
The next step is create the class **form** in the _form.url_ configuration file with name _CommentForm_. 
This class will be base on the _ModelForm_ standard Django class. 

```
class CommentForm(ModelForm):
    issue_type = forms.ModelChoiceField(queryset=IssueType.objects, required=False, widget=forms.Select(attrs={'class':'CampoComentario'}))
    solution_type = forms.ModelChoiceField(queryset=SolutionType.objects, required=False, widget=forms.Select(attrs={'class':'CampoComentario'}))
    new_value = forms.CharField(required=False, widget=forms.Textarea(attrs={'cols':'80','rows':'10','class':'CampoComentario'}))

    class Meta:
        model = Comment
        fields =('issue_type','solution_type','new_value')
        exclude = ()
```
In this class we will define the _model_ attribute origen of the information, in this case the _Comment_ model,
 and what are the editable fields.

In order to customize the fields we must define everyone of them. 
We will indicate what _widget_ will be used to show them if they are required and his class.
In the case of the select fields we will define the _queryset_ attribute of the _ModelChoiceField_ to indicate how to obtain the information.

And finally we must create the **template** with the html presentation of the form, that is _comment_detail.html_.

```
<table width="100%" cellspacing="0" cellpadding="5" >
	<tr class="TituloPagina">
		<td class="EtiquetaTitulo">Campanya:</td>
		<td>{{ comment.survey.campaign.cod_campania_lime }}</td>
		<td>{{ comment.survey.campaign.name }}</td>
        ...
    </tr>
</table>
...
<form method="post" enctype="multipart/form-data" >
{% csrf_token %}
...
<table align="center" width="50%" border="0" cellpadding="0" cellspacing="10" class="TablaComentario">
	<tr>
		<td class="EtiquetaComentario" width="20%">
			<label for="id_block_type">Tipus pregunta:</label>
		</td>
		<td width="15%">
			<div class="CampoComentarioInactivo">{{ comment.block_type }}</div>
		</td>
        ...
    </tr>
...
	<tr valign="top">
		<td class="EtiquetaComentario">Tipus incid&egrave;ncia:</td>
		<td colspan="5">
			{{ form.issue_type }}
		</td>
	</tr>
	<tr valign="top">
		<td class="EtiquetaComentario">Proposta soluci&oacute;:</td>
		<td colspan="5">
			{{ form.solution_type }}
		</td>
	</tr>
	<tr valign="top">
		<td class="EtiquetaComentario">Comentari proposat:</td>
		<td colspan="5">
			{{ form.new_value }}
		</td>
	</tr>
...
	<tr>
		<td colspan="6" align="center">
			<input type="submit" value="Desar" />
		</td>
	</tr>
</table>
</form>

```
This html template contains different type of elements or fields.

At first place it contains fields with information from his parent models, as the code or the name of the campaign.
This information is place outside of the form element.

It also has a _form_ html element without action because Django manage the action.
The _csrf_token_ directive controls the security in the use of the form.

Inside the form exists some field that aren't editable. By this reason they are showed from the comment model.

And the most important part are the editable fields whe are obtained from the _form_ object.
There is no need to define the type of input and other properties because we have defined them in the forms.py file.

And lastly it's necessary an input submit button.

### Import surveys

The implementation of this feature includes some steps that will be explained in detail in this chapter.

It will be explained the new concepts of Django that had been used:

- Multiple database management
- Legacy database access
- Multifield keys issue
- Virtual model
- Use of RedirectView
- Batch of bulk operations
- Raw queries

#### Multiple databases management
This project must interact with 4 different databases. Three of them are legacy databases from the original application and will allow read-only access (_encuestas_, _lime_ and _uxxienc_resul_). The other one is the application database and it will allow read-write access (_default_).

The first step is to tell Django the **settings** to connect with the database servers. This is done in the DATABASE block of the _settings.py_ configuration file.

```

DATABASES = {
    'default': {
                'ENGINE': 'django.db.backends.mysql',
                'NAME': 'tfm_surveys',
                'USER': 'tfm',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    },
    'encuestas': {
               'ENGINE': 'django.db.backends.mysql',
                'NAME': 'encuestas',
                'USER': 'tfm',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    },
    'lime': {
                'ENGINE': 'django.db.backends.mysql',
                'NAME': 'lime',
                'USER': 'tfm',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    },
    'uxxienc_resul': {
               'ENGINE': 'django.db.backends.mysql',
                'NAME': 'uxxienc_resul',
                'USER': 'tfm',
                'PASSWORD': '****',
                'HOST': 'localhost',
                'PORT': '3306'
    }
}
```
Only the default database will be managed from Django, because the other databases were previously created and we haven’t the capacity to edit them.

To use multiple databases is necessary to set up a database **routing scheme**. This routing scheme directs models to their original database. And models that aren't specified will go to the default database schema.

A database routing is a class defined in the _router.py_ configuration file located in the _tfmsurveysapp_. This class provides four methods:

- _db_for_read_: Suggest the database that should be used for read operations.
- _db_for_write_: Suggest the database that should be used for write operations.
- _allow_relation_: Returns if a relation between two models must be allowed.
- _allow_migrate_: Indicate if the migration operation is allowed.

In our case the name of the apps is the same as the name of databases, relation will be allowed only between models in the same app and migration is allowed if app and database have the same name.

This is part of the router code:

```
class EncuestasRouter:
    
    route_app_labels = {'encuestas', 'lime', 'uxxienc_resul'}

    def db_for_read(self, model, **hints):
        if model._meta.app_label in self.route_app_labels:
            return model._meta.app_label
        return None

    def db_for_write(self, model, **hints):
        if model._meta.app_label in self.route_app_labels:
            return model._meta.app_label
        return None

    def allow_relation(self, obj1, obj2, **hints):
        if (obj1._meta.app_label == obj2._meta.app_label):
           return True
        else:
            return None

    def allow_migrate(self, db, app_label, model_name=None, **hints):
        if app_label in self.route_app_labels:
            return (db == app_label)
        return False
```
#### Legacy databases access
The second step is to create the **models** to query the information from the tables. 

In order to make it easy to Django the connection between tables and models, three more applications are created. Every database will have its own application.

This action will be done with the commands:
```
python3 manage.py startapp encuestas
python3 manage.py startapp lime
python3 manage.py startapp uxxienc_resul
```
These new apps will only have the function of containing the model definition of the corresponding database. 

To speed the creation of models from an existing database Django comes with a utility called _inspectdb_. That utility creates models by introspecting the existing database and it has been used to create a base model definition file for every application (`_models_inspectdb.py_). The commands used to create the initial model file are:

```
python3 manage.py inspectdb --database encuestas > models_inspectdb.py
python3 manage.py inspectdb --database lime > models_inspectdb.py
python3 manage.py inspectdb --database uxxi_enc > models_inspectdb.py
```
Following the needed models had been copied and customized to the final _models.py_ file in every application. To avoid Django modify the original tables structure the _managed = False_ metadata has been configured.

##### Encuestas / models.py
```

class TipoCampania(models.Model):
…
   class Meta:
        managed = False
        db_table = 'TIPO_CAMPANIA'

class Campania(models.Model):
…
   class Meta:
        managed = False
        db_table = 'CAMPANIA'

class Encuesta(models.Model):
…
   class Meta:
        managed = False
        db_table = 'ENCUESTA'
```
#### Lime / models.py
```
class LimeOcuEncuestasCampania(models.Model):
…
   class Meta:
        managed = False
        db_table = 'lime_ocu_encuestas_campania'
```
#### Uxxienc_resul / models.py
Models from this database are different from the previous ones.

The _CampaniasExtraidas_ model is similar to the previously created models, but every campaign has 3 tables with the same structure between campaigns and with the code of the campaign in his name. In this schema ‘xx’ is the campaign code).

Only one model has been created for every type of ‘SB’ table where it is not possible to define the table name and it will force access to information using **raw queries**.

Another particular characteristic of this table is that they use **multifield keys**. The primary key is the composition of two or more fields. Django doesn’t support this functionality, but it’s possible to have an approximation defining as _primary_key = True_ the first of the key fields and adding to the metadata the unique_together property with the relation of key fields.

```
class CampaniasExtraidas(models.Model):
…
   class Meta:
        managed = False
        db_table = 'CAMPANIAS_EXTRAIDAS'

class SBMetaSurvey(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    metadato = models.CharField(max_length=20, blank=True, null=True)
...
    class Meta:
        unique_together = (('sid','metadato',))
        managed = False
#        db_table = 'SB_100_META_SURVEY'

class SBMetaUser(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    tid = models.IntegerField(blank=True, null=True)
    fieldname = models.CharField(max_length=12, blank=True, null=True)
...
    class Meta:
        unique_together = (('sid','tid','fieldname'),)
        managed = False
        #db_table = 'SB_100_META_USER'

class SBRes(models.Model):
    sid = models.IntegerField(blank=True, primary_key=True)
    tid = models.IntegerField(blank=True, null=True)
    gid = models.IntegerField(blank=True, null=True)
…
   class Meta:
        unique_together = (('sid','tid','qid'))
        managed = False
        #db_table = 'SB_100_RES'

class SBProf(models.Model):
    sid = models.IntegerField(null=False, primary_key=True)
    pid = models.CharField(max_length=2, null=False)
...
    class Meta:
        unique_together = (('sid','pid'))
        managed = False
```
Professor information is a special case. This information doesn’t come from a specific table but it is obtained from the _SB_XX_META_SURVEY_ table through a query and saved in a virtual model with a convenient structure.

#### Campaign types and Campaigns importation
The importation of campaign types and campaigns is done in the _import_campaign_types_ and _import_campaigns_ functions, located in the _views.py_ file.

These functions are called in the _campaigns_list_ view, every time the view is opened.

Both functions are the same structure.

Original records are read using the _TipoCampania_ model in the _Encuestas_ app or the _CampaniasExtraidas_ model in the _uxxienc_resul_ app.

Final information is stored in _CampaignType_ objects in the _tfmsurveysapp_ or in _Campaign_ objects in the _tfmsurveysapp_.

Using a loop the function detects if records exist and if they are modified, in order to create or update them.

Using another loop the function detects records that no longer exist and delete them.

This is the code of the function _import_campaign_types_ function:

```
def import_campaign_types():
   tipocampanias_lime = TipoCampania.objects.all()

   # New and update campaign types
   for tipocampania_lime in tipocampanias_lime:
       try:
           campaigntype_tfm = CampaignType.objects.get( 
cod_tipo_campania_lime = tipocampania_lime.cod_tipo_campania)
           if (campaigntype_tfm.name != tipocampania_lime.descripcion):
               campaigntype_tfm.name = tipocampania_lime.descripcion
               campaigntype_tfm.save()

       except CampaignType.DoesNotExist:
           new_campaigntype = CampaignType(
               cod_tipo_campania_lime = tipocampania_lime.cod_tipo_campania,
               name = tipocampania_lime.descripcion)
           new_campaigntype.save()

   # Delete campaign types
   campaigntypes_tfm = CampaignType.objects.all()
   for campaigntype_tfm in campaigntypes_tfm:
       try:
           tipocampania_lime = TipoCampania.objects.get(
cod_tipo_campania = campaigntype_tfm.cod_tipo_campania_lime)
       except TipoCampania.DoesNotExist:
           campaigntype_tfm.delete()
```
Campaign information has an additional issue. When creating new campaigns the program obtains the id of the campaign type but _Campaign_ model needs a _CampaignType_ object. It’s necessary to get the corresponding object from the _CampaignType_ model.

#### Import surveys
The importation of surveys and all the associated information is done from the _ImportCampaign_ view, that is a **RedirectView**. This type of Django views automate the execution of operations and redirection to a preexisting url. The main properties of this type of view are:

- _url_: The fix URL to redirect to.
- _pattern_name_: The name of the URL pattern to redirect to, defined in _url.py_. It will use the same arguments passed in to the view.

In this case it isn’t possible to use these properties because it’s necessary to redirect to the url without argument and Django automatically adds the received arguments in the original call.

It has been necessary to implement the _get_redirect_url_ method to create a customized url without arguments. Also the importing function has been included in this method after obtaining the _cod_campania_lime_ argument.

This is the code of the _ImportCampaign_ view:
```
class ImportCampaign(RedirectView):
   query_string = False
   permanent = False

   def get_redirect_url(self, *args, **kwargs):
       cod_campania_lime = kwargs['cod_campania_lime']
       self.delete_surveys(cod_campania_lime)
       self.import_surveys(cod_campania_lime)
       self.import_profes(cod_campania_lime)
       self.import_comments(cod_campania_lime)
       self.update_import_date(cod_campania_lime)

       return reverse('tfmsurveysapp:campaigns_list')
```
The function created to import surveys and his associated information are:
- delete_surveys
- import_surveys
- import_professors
- import_comments
- update_import

##### Delete surveys function

Obtain the previous surveys filtering by _cod_campania_lime_ and erase these records using de _delete_ method. Information in models associated with _Survey_ will be also deleted because the on delete cascade option is defined in the _Survey_ model.

```
def delete_surveys(self, cod_campania_lime):

   surveys = Survey.objects.filter( 
campaign__cod_campania_lime=cod_campania_lime).delete()

   return True
```
##### Import Surveys function

Original information is read mainly from _Encuesta_ model in the _Encuestas_ app, but the campaign object is read from _Campaign_ model in _tfmsurveysapp_ and the _sid_ attribute is read from the _LimeOcuEncuestasCampania_ in _uxxienc_resul_ app. Final information is saved in the _Survey_ model in _tfmsurveysapp_ using the _save_ method.

This implementation has a problem of **efficiency**. For example, importing 500 registers takes 67 seconds. And all the other tables associated with surveys could have the same problem and they have a bigger cardinality.

The solution is the use of the method **bulk_create**, where registers are stored in a list and saved to disk in a batch operation. In this case the execution time is 0,67 seconds. In other words, 100 times faster. Had been tried different batch sizes to evaluate performances, but there isn’t a significant variation in the execution time.

```
def import_surveys(self, cod_campania_lime):
   campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
   encuestas = Encuesta.objects.filter(campania_id=cod_campania_lime)
   surveys_list = []
   ...
   for encuesta in encuestas:
       try:
           limeencuesta = LimeOcuEncuestasCampania.objects.get(
codencuesta=encuesta.cod_encuesta)
...
           survey = Survey(
               campaign = campaign,
               cod_encuesta_lime = encuesta.cod_encuesta,
               sid_lime = limeencuesta.sid,
               name = encuesta.titulo
           )
           surveys_list.append(survey)
           #survey.save()
...
   Survey.objects.bulk_create(surveys_list)
...
```
##### Import professors function

In this operation there doesn't exist a table in the original database that contains the professor information however it is needed a complex query to obtain the information. This issue could be resolved performing raw queries. 

In order to store the information obtained with this query a model called _Professor_ had been created, with exactly the same fields obtained in the query. This data will be saved in the _Professor_ model in the _tfmsurveysapp_.

This is the main code of _import_professor_ function:

```
def import_profes(self, cod_campania_lime):

   query = "SELECT prof.sid, " \
           "LPAD(prof.num_profe, 2, '0') pid, " \
           "MAX(IF(metadato = 'APELLIDO1PROFE', valor, null)) surname1, " \
           "MAX(IF(metadato = 'APELLIDO2PROFE', valor, null)) surname2, " \
           "MAX(IF(metadato = 'NOMBREPROFE', valor, null)) name " \
       "FROM " \
…
profes = SBProf.objects.raw(query, [cod_campania_lime])
profes_list = []
for profe in profes:
...
       survey = Survey.objects.get(sid_lime = profe.sid)
...
           tfmprofe = Professor(
               sid_lime = profe.sid,
               pid_lime = profe.pid,
               name = profe.name,
               surname1 = profe.surname1,
               surname2 = profe.surname2,
               survey = survey
           )
           profes_list.append(tfmprofe)
...
return True
```
##### Import comment function
Raw queries had also been used in this operation, because the name of the original table is different for each campaign unlike the structure of all the tables is the same. _SBRES_ model  had been created to save the information from these tables. Destination model is _Comment_ in _tfmsurveysapp_.

Another special situation in this table is that only some types of campaigns and some type of question include professor information, data about the professor must be obtained from the _Professor_ model and  the name of the fields with name and surname of the professor include a variable number.

```
def import_comments(self, cod_campania_lime):

   campaign = Campaign.objects.get(cod_campania_lime = cod_campania_lime)
   if ('assignatura' in campaign.type_campaign.name):
       survey_type = 1     # Assignatura-professor
   else:
       survey_type = 2     # Altres enquestes

   comments_list = []
   query = "SELECT r.sid, r.tid, r.gid, r.type, r.parent_qid, r.qid, r.sqid, r.ssqid, r.question, " \
    "r.sub_question, r.sub_sub_question, r.answer, r.fieldname, r.response, r.token, " \
       "q.title question_id " \
       "FROM uxxienc_resul.SB_%s_RES r INNER JOIN lime.lime_questions q ON r.qid = q.qid " \
       "WHERE r.type = 'T' AND q.language = 'ca' AND r.response > ''"
   comments = SBRes.objects.raw(query, [cod_campania_lime])

   for comment in comments:
...
           survey = Survey.objects.get(sid_lime = comment.sid)
              question = comment.question
               #  Obtain professor
               if survey_type == 1:
                   if len(comment.question_id) > 3:
                       block_type = 'P'
                   else:
                       block_type = 'A'
                   pid = comment.question_id[3:5]
                   if pid != "":
                       try:
                           professor = Professor.objects.get( sid_lime=comment.sid, pid_lime=pid)

                           question = self.replace_macro(question, "NOMBREPROFE", professor.name)
                           question = self.replace_macro(question, "APELLIDO1PROFE", professor.surname1)
                           question = self.replace_macro(question, "APELLIDO2PROFE", professor.surname2)
                           print ("Import_comments: new_question: ", question)
...
               tfmcomment = Comment(
                   survey = survey,
                   qid_lime = comment.qid,
                   tid_lime = comment.tid,
                   question_id_lime = comment.question_id,
                   question = question,
                   block_type = block_type,
                   professor = professor,
                   original_value = comment.response
               )
               comments_list.append(tfmcomment)
...
       Comment.objects.bulk_create(comments_list)

       return True
```
##### Update import date

This is the final operation after importing surveys where the campaign is marked with the date of importation. The campaign is obtained from the _Campaign_ model of the _tfmsurveysapp_ and the _import_date_ field updated with the current date.

```
def update_import_date(self, cod_campania_lime):
   campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
   campaign.import_date = date.today()
   campaign.save()
```

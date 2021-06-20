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
Following the Agile Behaviour Driven Development the features of the project have been defined:

The goal of this application it's manage the revision, analysis and modification of comments in the surveys of the UdL.

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

## Integration of Django - Spacy

In this iteration we will integrate web development done using Django with the Artificial Intelligence functions created with Spacy. This task will force us to adapt the resulting function form Spacy and the views and templates to call the functions and show the results. 

It will be necessary to create two classes that will control language detection and the classification of comments that match the issue type called ‘model 1 - profesor don’t have participated in the subject’.

The language detection will be called when reading the comments from the import surveys functionality and it will save the detected language as an attribute of the comment.

In order to know the result of the language detection the comments list page will show a summary with the number of comments in every language. Also will be possible filter by language, to validate the detection correctness and change the language value in the edit comment form.

The issue type detection will be called from the campaigns list with a new button in a similar way as done with the import campaign functionality. This button will be also in the comments list page. 

The result of the issue detection could be shown as a column in the comments list and a summary in the header of this page. It will be possible to filter the detected issues and change the issue type from the edit comment page.

The implementation of this iteration has consist in the following steps:

### Creation of classes TfmLangDetect and TfmCategorizerModel1

The code related with Spacy implementation has been placed in the folder ‘tfmsurveysapp/spacy’. The resulting models from the Spacy training are located in the folder ‘‘tfmsurveysapp/spacy/nlp_models’.

The final classes are relatively simple because all the work was made in his initial analysis. As explained in the design part TfmLangDetector has two functions:
 
- **_init_**: Load the English standard model and add the LanguageDetector class in the pipe that use Spacy

```
def __init__(self):
    ...
    self.nlp = spacy.load("en_core_web_sm")
    self.nlp.add_pipe(LanguageDetector(), name='language_detector', last=True)
    ...
```
- **_detect_**: This function receives a comment and mixes the language detected by Spacy and Pycld2, to obtain an improved prediction. In the language detection iteration was explained on how this mix is done.  This is part of the code:

```
def detect(self, comment):
    # Language detected by Spacy
    lang_spacy = self.nlp(comment)._.language["language"]
        
    # Language detecte by Pycld2 
    isReliable, textBytesFound, details = cld2.detect(comment.encode('utf-8', 'replace'),                               isPlainText=True, bestEffort=True, returnVectors=False)
    lang_pycld2 = details[0][1]

    # Mix of predictions
    language = lang_spacy
    if (lang_spacy != "ca") & (lang_pycld2 == "ca"):
    ...
return language 
```
The class _TfmCategorizerModel1_ has also two functions as described in the design:
- **_init_**: Loads the model created in the training iteration. 
Every language has his own model placed in a subfolder the folder _tfmsurveysapp/models_. 
For example: _nlp_models/ca_, _nlp_models/es_ or _nlp_models/en_. 

- **_test_**: This function creates an _Spacy_ doc object from the received comment. 
This object contains the _cats_ object that indicates the probability that the comment matches with the issue type ‘1 - Professor hasn't done classes’.

This is an example of the _cats_ object, where we can show the probability that the comment matches this type of issue is more than 99%:
```
{'POSITIVE': 0.9999936819076538, 'NEGATIVE': 6.376371402438963e-06}
```
This is the code of the class:
```
class TfmCategorizerModel1():

    def __init__(self, language):
        ...
        self.nlp = spacy.load(pathmodel + language)
        ...

    def test(self, comment):
        doc = self.nlp(comment)
        ...
        return doc.cats
```
### Calculating language in ImportCampaign view

The calculation of the comment language had been added in the _import_comments_ function that is included in the _ImportCampaign_ view.

In the beginning of the function _lang_detector_ variable is created as an instance of _TfmLangDetector_. This action executes automatically the init function of the class.

As shown in the previous iteration, comments are read using a raw query and iterating through them.

The language is obtained by calling the detect function of the lang_detector object.

And the _language_ information is stored in the _tfmcomment_ object and the _tfmcomment_ is saved to disk.

This is the part of the code added in this iteration to manage the language detection:
```
class ImportCampaign(RedirectView):
    ... 
    def get_redirect_url(self, *args, **kwargs):
        ...
        self.import_comments(cod_campania_lime)
        ...

    def import_comments(self, cod_campania_lime):

        #   Init language detector
        lang_detector = TfmLangDetector()
        ...
        comments = SBRes.objects.raw(query, [cod_campania_lime])
        for comment in comments:
            ...
            lang = lang_detector.detect(comment.response)
            ...
            tfmcomment = Comment(
            ...
                language = lang
            )
            comments_list.append(tfmcomment)
        ...
        Comment.objects.bulk_create(comments_list)
        ...

```
### Modification of Comment model

The _Comment_ model had been modified to add the language field where save the language detected in the previous step. It will contain the code of the language (ca, es or en)

```
class Comment(models.Model):
    ...
    language = models.CharField("Idioma", max_length=2, null=True)
```
### Modification in template comments_list.html to identify language

It has been added the ‘Idioma’ column to the table of comments:

```
...
<table align="center" id="Lista" name="Lista" class="display">
   <tr>
        ...
        <th align="center">Idioma</th>
        ...
    </tr>
    {% for comment in comments_list %}
    <tr>
        ...
        <td align="center">{{ comment.language }}</td>
        ...
    </tr>
    ...
```
### Modification in templates to process issue type of comments

To execute the **process** of identifying **comments** of issue type 1 has been added a button in the _campaign_list_ and _comments_list_ templates. 
This button calls a script function that redirects the page to the _process_comments_ view with the parameter _cod_campania_lime_. 

This is the code added to the _campaign_list_:
```
<a  onclick="processarComentaris('{% url 'tfmsurveysapp:process_comments' campaign.cod_campania_lime %}')"
    ...    
</a>
```
And this is the code added to the _comments_list_:
```
<a  onclick="processarComentaris('{% url 'tfmsurveysapp:process_comments' comments_list.first.survey.campaign.cod_campania_lime %}')"
    ...
</a>
```
And this is the script who made the redirection:
```
function processarComentaris(url) {
    ...
    window.location.href = url;
}
```

### Creation of ProcessComments view

The main part in the task of process comments is done by the _ProcessComments_ view, 
included in the _views.py_ configuration file.

This view obtains the _cod_campania_lime_ parameter from the url, executes the _process_model1_ function 
and redirects the page to the _comments_list_ view using the _pattern_name_ attribute of the view.

The _process_model1_ function executes the following steps:

1. Iterate through the possible languages (ca, es, en).

2. Load the model corresponding to the language, creating a _nlp_ object, that is an instance of the _TfmCategorizerModel1_ class. 
This step calls the init function of the class.

3. Filter the comments by the desired language.

4. Iterate through the comments.

5. For every comment evaluate if the comment matches with the issue type. 
This action calls the test function of the _nlp_ object, 
that is an instance of the _TfmCategorizerModel1_ class.

6. If the result of the test is higher than 50% the _isue_type_ field is completed 
and the comment saved with the new value. 
Percentage can be adjusted to be more accurate in the selection of comments.

This is the code of the _ProcessModel1_ view:
```
class ProcessComments(RedirectView):
    query_string = False
    permanent = False
    pattern_name = "tfmsurveysapp:comments_list"

    def get_redirect_url(self, *args, **kwargs):
        cod_campania_lime = kwargs['cod_campania_lime']
        self.process_model1(cod_campania_lime)

        return super().get_redirect_url( *args, **kwargs)
```
And this the more relevant code of the proces_model1 function:
```
def process_model1(self, cod_campania_lime):

    issue_type = IssueType.objects.get(id=1)
    languages = {"ca","es","en"}
    for language in languages:
        nlp = TfmCategorizerModel1(language)
        
        comments = Comment.objects.filter( survey__campaign__cod_campania_lime=cod_campania_lime,language=language)

        for comment in comments:
            result = nlp.test(comment.original_value)
            if (result['POSITIVE'] > 0.5):
                comment.issue_type = issue_type
                comment.save()

        return True
```
### Definition of url to process comments
Next step consists in defining the url to access the ‘_ProcessComments_’ view in the _url.py_ configuration file. 
Exemple: _campaigns/123/process_
```
path('campaigns/<int:cod_campania_lime>/process',
         ProcessComments.as_view(),
         name='process_comments'),
```
### Summary of languages and issue types

So as to validate the language and issue types calculation have been added both summary tables in the comments list page. 
Calculation is done in the _CommentList_ view. 

In the case of language summary values of _comments_list_ hare grouped using the value method and making a count using the annotate method. 
This returns a list of language codes and number of comments.

In the case of issue type summary _comments_list_ is filtered by issue type 
and the count method returns the final number. 
This codification is possible because there is only one type of issue at this moment.

Summaries are stored in the context to be recovered in the template.

This is the part of code corresponding to summary calculation:
```
class CommentsList(ListView):
    ...
    def get_queryset(self):
        ...
        comments_list = Comment.objects.filter( survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])
        self.languages_summary = comments_list.values('language'). annotate(lang_count=Count('id'))
        self.model1_count = comments_list.filter(issue_type__id=1). count()
        self.total_count = comments_list.count()
        ...
    def get_context_data(self, **kwargs):
        context = super(CommentsList, self).get_context_data(**kwargs)
        context['languages_summary'] = self.languages_summary
        context['model1_count'] = self.model1_count
        context['total_count'] = self.total_count
        return context
```
### Filter by language and issue type

The previously calculated summaries enable filter the comment list by language or by issue type. 

_CommentList_ view could be called using three different formats of url. For example:

- `campaigns/123`: Will show all the comments of the campaign 123.
- `campaigns/123/lang/ca`: Will show comments in catalan language of the campaign 123
- `campaigns/123/issue/1`: Will show comments with issue type 1 of the campaign 123

This formats are defined in the _url.py_ configuration file:

The _CommentList_, defined in the _view.py_ configuration file, obtains the _cod_campania_lime_, _language_ and _issue_type_ as parameters and it applies the corresponding filter.
```
class CommentsList(ListView):
    ...
    def get_queryset(self):
        ...
        comments_list = Comment.objects.filter( survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])
        ...
        if "language" in self.kwargs:
            comments_list = comments_list.filter( language=self.kwargs['language'])

        if "issue_type" in self.kwargs:
            comments_list = comments_list.filter( issue_type__id=self.kwargs['issue_type'])
        ...
        return comments_list
```

This urls are used in the _comments_list_.html template:

```
...
{% for language_summary in languages_summary  %}
	<a href="{% url 'tfmsurveysapp:comments_list_language' comments_list.first.survey.campaign.cod_campania_lime language_summary.language %}">
		{{ language_summary.lang_count }}
	</a>
	<br/>
{% endfor %}
<a href="{% url 'tfmsurveysapp:comments_list' comments_list.first.survey.campaign.cod_campania_lime %}">
	{{ total_count }}
</a>
...
<a href="{% url 'tfmsurveysapp:comments_list_issue_type' comments_list.first.survey.campaign.cod_campania_lime 1 %}">
	{{ model1_count }}
</a>
...
```
.


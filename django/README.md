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



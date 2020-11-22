from django.urls import path
from django.utils import timezone
from django.views.generic import DetailView, ListView
from tfmsurveysapp.models import Campaign, Survey
from tfmsurveysapp.forms import CampaignsForm

app_name = "tfmsurveysapp"

urlpatterns = [
    # List campaigns
    path('',
        ListView.as_view(
            queryset=Campaign.objects.all(),
            context_object_name='campaigns_list',
            template_name='tfmsurveysapp/campaigns_list.html'),
        name='campaigns_list'),
    path('campaigns/<int:pk>',
        ListView.as_view(
            queryset=Survey.objects.all(),
            context_object_name='surveys_list',
            template_name='tfmsurveysapp/surveys_list.html'),
        name='surveys_list')

]

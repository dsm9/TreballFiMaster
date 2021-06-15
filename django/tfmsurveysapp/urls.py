from django.contrib.auth.decorators import login_required
from django.urls import path
from django.utils import timezone
from django.views.generic import DetailView, ListView
from . import views
from tfmsurveysapp.models import Campaign, Survey, Comment
from tfmsurveysapp.views import CommentDetail, CommentsList, ImportCampaign, ProcessComments, progress_view
from tfmsurveysapp.forms import CommentForm

app_name = "tfmsurveysapp"

urlpatterns = [
    # List campaigns
    # Option 1: url - view method
    path('', views.campaigns_list, name='campaigns_list'),
    path('campaigns/', views.campaigns_list, name='campaigns_list2'),

    # List comments of a campaign
    # Opcion 2: ListView
#    path('campaigns/<int:cod_campania_lime>/',
#         login_required(ListView.as_view(
#         queryset=Comment.objects.filter(survey__campaign__cod_campania_lime=170),
#         context_object_name='comments_list',
#         template_name='tfmsurveysapp/comments_list.html')),
#         name='comments_list'),

    # Opcion 3: ListView (class)
    # include all the comments
     path('campaigns/<int:cod_campania_lime>',
          CommentsList.as_view(),
          name='comments_list'),

    # include comments in a language
    path('campaigns/<int:cod_campania_lime>/lang/<str:language>',
         CommentsList.as_view(),
         name='comments_list_language'),

    # include comments of a issue type
    path('campaigns/<int:cod_campania_lime>/issue/<int:issue_type>',
         CommentsList.as_view(),
         name='comments_list_issue_type'),

    # Show the details of a comment
    path('campaigns/<int:cod_campania_lime>/<int:pk>',
         CommentDetail.as_view(),
         name='comment_detail'),

#    path('campaigns/<int:cod_campania_lime>/import',
#         views.import_campaign,
#         name='import_campaign'),

    # Imports the information from a campaign
    path('campaigns/<int:cod_campania_lime>/import',
         ImportCampaign.as_view(),
         name='import_campaign'),

    # Process comments to classify it in type of issues
    path('campaigns/<int:cod_campania_lime>/process',
         ProcessComments.as_view(),
         name='process_comments'),

    path('campaigns/process',
         views.progress_view,
         name="progress_view"),

]

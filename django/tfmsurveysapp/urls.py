from django.contrib.auth.decorators import login_required
from django.urls import path
from django.utils import timezone
from django.views.generic import DetailView, ListView
from . import views
from tfmsurveysapp.models import Campaign, Survey, Comment
from tfmsurveysapp.views import CommentDetail, CommentsList, ImportCampaign
from tfmsurveysapp.forms import CommentForm

app_name = "tfmsurveysapp"

urlpatterns = [
    # List campaigns
    # Option 1: url - view method
    path('', views.campaigns_list, name='campaigns_list'),

    # List comments of a campaign
    # Opcion 2: ListView
#    path('campaigns/<int:cod_campania_lime>/',
#         login_required(ListView.as_view(
#         queryset=Comment.objects.filter(survey__campaign__cod_campania_lime=170),
#         context_object_name='comments_list',
#         template_name='tfmsurveysapp/comments_list.html')),
#         name='comments_list'),

    # Opcion 3: ListView (class)
     path('campaigns/<int:cod_campania_lime>',
          CommentsList.as_view(),
          name='comments_list'),


    # Show the details of a comment
    path('campaigns/<int:cod_campania_lime>/<int:pk>',
         CommentDetail.as_view(),
         name='comment_detail'),

#    path('campaigns/<int:cod_campania_lime>/import',
#         views.import_campaign,
#         name='import_campaign'),

    path('campaigns/<int:cod_campania_lime>/import',
         ImportCampaign.as_view(),
         name='import_campaign'),

]

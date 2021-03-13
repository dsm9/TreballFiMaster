from django.contrib.auth.decorators import login_required
from django.urls import path
from django.utils import timezone
from django.views.generic import DetailView, ListView
from . import views
from tfmsurveysapp.models import Campaign, Survey, Comment
from tfmsurveysapp.views import CommentsList
from tfmsurveysapp.forms import CommentForm

app_name = "tfmsurveysapp"

urlpatterns = [
    # List campaigns
#    path('', views.campaigns_list, name='campaigns_list'),
#    path('campaigns', views.campaigns_list, name='campaigns_list'),
    path('',
         login_required(ListView.as_view(
         queryset=Campaign.objects.all(),
         context_object_name='campaigns_list',
         template_name='tfmsurveysapp/campaigns_list.html')),
         name='campaigns_list'),

    # List comments of a campaign
    # Opcion 1 : url - view
#    path('campaigns/<int:cod_campania_lime>', views.comments_list, name='comments_list'),

    # Opcion 2: ListView
#    path('campaigns/<int:cod_campania_lime>',
#         login_required(ListView.as_view(
#         queryset=Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime),
#         context_object_name='comments_list',
#         template_name='tfmsurveysapp/comments_list.html')),
#         name='comments_list'),

    # Opcion 3: ListView (class)
     path('campaigns/<int:cod_campania_lime>',
          CommentsList.as_view(),
          name='comments_list'),


    # Show the details of a comment
    path('campaigns/<int:cod_campania_lime>/<int:id>', views.comment_detail,name='comment_detail')

]

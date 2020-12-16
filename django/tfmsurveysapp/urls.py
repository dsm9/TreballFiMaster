from django.urls import path
from django.utils import timezone
from django.views.generic import DetailView, ListView
from tfmsurveysapp.models import Campaign, Survey, Comment
from tfmsurveysapp.forms import CommentForm
from tfmsurveysapp.views import CommentDetail

app_name = "tfmsurveysapp"

urlpatterns = [
    # List campaigns
    path('',
        ListView.as_view(
            queryset=Campaign.objects.all(),
            context_object_name='campaigns_list',
            template_name='tfmsurveysapp/campaigns_list.html'),
        name='campaigns_list'),
    # List comments of a campaign
    path('campaigns/<int:pk>',
        ListView.as_view(
            queryset=Comment.objects.all(),
            context_object_name='comments_list',
            template_name='tfmsurveysapp/comments_list.html'),
        name='comments_list'),
    path('campaigns2/<int:pk>',
        ListView.as_view(
            queryset=Campaign.objects.get(id=3),
            context_object_name='campaign_detail',
            template_name='tfmsurveysapp/comments_list.html'),
        name='campaign_detail'),
    path('comments/<int:pk>',
         CommentDetail.as_view(),
         name='comment_detail'
    )

]

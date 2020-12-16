from django.contrib import admin
from tfmsurveysapp.models import *

# Register your models here.
admin.site.register(CampaignType)
admin.site.register(Campaign)
admin.site.register(Survey)
admin.site.register(Comment)
admin.site.register(Professor)
admin.site.register(IssueType)
admin.site.register(SolutionType)
admin.site.register(CommentIssue)
admin.site.register(CommentSolution)

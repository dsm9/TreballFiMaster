from django.forms import ModelForm
from tfmsurveysapp.models import Campaign

class CampaignsForm(ModelForm):
    class Meta:
        model = Campaign
        exclude = ()

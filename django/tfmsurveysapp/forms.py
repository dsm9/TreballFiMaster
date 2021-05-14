from django.forms import ModelForm
from tfmsurveysapp.models import Comment, IssueType, SolutionType
from django import forms

class CommentForm(ModelForm):
    language = forms.ChoiceField(choices=[('ca','Català'),('es','Castellà'),('en','Anglés')], required=False)
    issue_type = forms.ModelChoiceField(queryset=IssueType.objects, required=False, widget=forms.Select(attrs={'class':'CampoComentario'}))
    solution_type = forms.ModelChoiceField(queryset=SolutionType.objects, required=False, widget=forms.Select(attrs={'class':'CampoComentario'}))
    new_value = forms.CharField(required=False, widget=forms.Textarea(attrs={'cols':'80','rows':'10','class':'CampoComentario'}))

    class Meta:
        model = Comment
        fields =('language','issue_type','solution_type','new_value')
        exclude = ()

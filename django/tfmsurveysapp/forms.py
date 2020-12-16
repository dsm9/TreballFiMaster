from django.forms import ModelForm
from tfmsurveysapp.models import Comment

class CommentForm(ModelForm):
    class Meta:
        model = Comment
        exclude = ()

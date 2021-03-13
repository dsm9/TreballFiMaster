from django.shortcuts import render
from django.utils.decorators import method_decorator
from django.contrib.auth.decorators import login_required
from django.contrib.auth import logout
from django.core.exceptions import PermissionDenied
from django.urls import reverse
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from django.shortcuts import get_object_or_404
from django.utils.decorators import method_decorator
from django.views.generic import DetailView, ListView
from django.views.generic.edit import CreateView, UpdateView

from tfmsurveysapp.models import Campaign, CampaignType
from tfmsurveysapp.models import Survey, Comment

# Security Mixins

class LoginRequiredMixin(object):
    @method_decorator(login_required())
    def dispatch(self, *args, **kwargs):
        return super(LoginRequiredMixin, self).dispatch(*args, **kwargs)

class CheckIsOwnerMixin(object):
    def get_object(self, *args, **kwargs):
        obj = super(CheckIsOwnerMixin, self).get_object(*args, **kwargs)
        if not obj.user == self.request.user:
            raise PermissionDenied
        return obj

# HTML Views

#@login_required()
#def campaigns_list(request):
#    campaigntypes_list = CampaignType.objects.all()
#    campaigns_list=Campaign.objects.all()
#    context = {'campaigns_list': campaigns_list,
#               'campaigntypes_list': campaigntypes_list}
#    return render(request, 'tfmsurveysapp/campaigns_list.html', context)

# Opcion 1: url - view
#@login_required()
#def comments_list(request, cod_campania_lime):
#    comments_list = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime)
#    context = {'comments_list': comments_list}
#    return render(request, 'tfmsurveysapp/comments_list.html', context)

# Opcion 2: ListView
#   Nothing

# Opcion 3: ListView (class)
#class CommentsList(ListView):
#    model = Comment
#    context_object_name = 'comments_list'
#    queryset = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime)
#    template_name = 'tfmsurveysapp/comments_list.html'

# Opcion 4: ListView (class - queryset)
class CommentsList(ListView):
    model = Comment
    context_object_name = 'comments_list'
    template_name = 'tfmsurveysapp/comments_list.html'

    def get_queryset(self):
        return Comment.objects.filter(survey__campaign__cod_campania_lime=self.kwargs['cod_campania_lime'])


@login_required()
def comment_detail(request, cod_campania_lime, id):
    comment = Comment.objects.get(id=id)
    context = {'comment': comment}
    return render(request, 'tfmsurveysapp/comment_detail.html', context)




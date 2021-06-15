from celery import shared_task, Celery
from celery_progress.backend import ProgressRecorder
from tfmsurveysapp.models import IssueType, Comment
from tfmsurveysapp.spacy.model_1_execution import TfmCategorizerModel1
from tfmsurveysapp.spacy.model_2_execution import TfmCategorizerModel2

#app = Celery('tasks', broker='pyamqp://guest@localhost//')

@shared_task
def add(x, y):
    return x + y

@shared_task(bind=True)
def process_models_task(self, cod_campania_lime):
    progress_recorder = ProgressRecorder(self)

    issue_type1 = IssueType.objects.get(id=1)
    issue_type2 = IssueType.objects.get(id=6)
    languages = {"ca","es","en"}
    for language in languages:
        nlp1 = TfmCategorizerModel1(language)
#        if language != "en":
#            nlp2 = TfmCategorizerModel2(language)
        print ("ProcessComments: Model readed: ", language )

        comments = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime, language=language)
        print("ProcessComments: process_model1: Comments=", len(comments))

        i = 0
        total = len(comments)
        positives1 = 0
        positives2 = 0
        for comment in comments:
            result1 = nlp1.test(comment.original_value)
            if result1['POSITIVE'] > 0.5:
                positives1 = positives1 + 1;
                print("ProcessComments: process_model1: comment: ", comment.original_value)
                print("ProcessComments: process_model1: comment: ", result1)
                comment.issue_type = issue_type1
                comment.save()

            i = i + 1
            progress_recorder.set_progress(i, total, description="Testing comment " + str(i))

 #           if language != "en":
 #               result2 = nlp2.test(comment.original_value)
 #               if result2['POSITIVE'] > 0.5:
 #                   positives2 = positives2 + 1;
 #                   print("ProcessComments: process_model1: comment: ", comment.original_value)
 #                   print("ProcessComments: process_model1: comment: ", result2)
 #                   comment.issue_type = issue_type2
 #                   comment.save()

        print("ProcessComments: process_model1: Positives: ", positives1)
 #       print("ProcessComments: process_model2: Positives: ", positives2)

    return True

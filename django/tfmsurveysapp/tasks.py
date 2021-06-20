from celery import shared_task, Celery
from celery_progress.backend import ProgressRecorder
from tfmsurveysapp.models import IssueType, Comment, Campaign
from tfmsurveysapp.spacy.model_1_execution import TfmCategorizerModel1
from tfmsurveysapp.spacy.model_2_execution import TfmCategorizerModel2

#app = Celery('tasks', broker='pyamqp://guest@localhost//')

@shared_task(bind=True)
def process_models_task(self, cod_campania_lime):

    campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
#    campaign.estat = "Processant comentaris..."
#    campaign.subestat = "Iniciant process de calcul"
#    campaign.save()

    process_model1(cod_campania_lime, campaign)
    process_model2(cod_campania_lime, campaign)

    campaign.estat = "Comentaris processats"
    campaign.subestat = ""
    campaign.save()

    return True

def process_model1(cod_campania_lime, campaign):

    issue_type1 = IssueType.objects.get(id=1)
    languages = {"ca","es","en"}
    for language in languages:

        print ("ProcessComments: Reading model: ", language )
        campaign.subestat = "Llegint model 1: " + language
        campaign.save()

        nlp1 = TfmCategorizerModel1(language)

        comments = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime, language=language)
        print("ProcessComments: process_model1: Comments=", len(comments))

        print("ProcessComments: Processing comments", language)
        campaign.subestat = "Processant comentaris model 1: " + language
        campaign.save()

        positives1 = 0
        for comment in comments:
            result1 = nlp1.test(comment.original_value)
            if result1['POSITIVE'] > 0.5:
                positives1 = positives1 + 1;
                print("ProcessComments: process_model1: comment: ", comment.original_value)
                print("ProcessComments: process_model1: comment: ", result1)
                comment.issue_type = issue_type1
                comment.save()

        print("ProcessComments: process_model1: Positives: ", positives1)

    return True

def process_model2(cod_campania_lime, campaign):

    issue_type2 = IssueType.objects.get(id=6)
    languages = {"ca","es","en"}
    for language in languages:
        if language != "en":
            print("ProcessComments: Reading model 2", language)
            campaign.subestat = "Llegint model 2: " + language
            campaign.save()

            nlp2 = TfmCategorizerModel2(language)

        comments = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime, language=language)
        print("ProcessComments: process_model1: Comments=", len(comments))

        print("ProcessComments: Processing comments", language)
        campaign.subestat = "Processant comentaris model 2: " + language
        campaign.save()

        positives2 = 0
        for comment in comments:
            if language != "en":
                result2 = nlp2.test(comment.original_value)
                if result2['POSITIVE'] > 0.5:
                    positives2 = positives2 + 1;
                    print("ProcessComments: process_model2: comment: ", comment.original_value)
                    print("ProcessComments: process_model2: comment: ", result2)
                    comment.issue_type = issue_type2
                    comment.save()

        print("ProcessComments: process_model2: Positives: ", positives2)

    return True


def process_models_task_copia(self, cod_campania_lime):
    progress_recorder = ProgressRecorder(self)

    campaign = Campaign.objects.get(cod_campania_lime=cod_campania_lime)
#    campaign.estat = "Processant comentaris..."
#    campaign.subestat = "Iniciant process de calcul"
#    campaign.save()

    issue_type1 = IssueType.objects.get(id=1)
    issue_type2 = IssueType.objects.get(id=6)
    languages = {"ca","es","en"}
    for language in languages:

        print ("ProcessComments: Reading model: ", language )
        campaign.subestat = "Reading model 1: " + language
        campaign.save()

        nlp1 = TfmCategorizerModel1(language)
        if language != "en":
            print("ProcessComments: Reading model 2", language)
            campaign.subestat = "Reading model 2: " + language
            campaign.save()

            nlp2 = TfmCategorizerModel2(language)

        comments = Comment.objects.filter(survey__campaign__cod_campania_lime=cod_campania_lime, language=language)
        print("ProcessComments: process_model1: Comments=", len(comments))

        print("ProcessComments: Processing comments", language)
        campaign.subestat = "Processing comments: " + language
        campaign.save()

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

            if language != "en":
                result2 = nlp2.test(comment.original_value)
                if result2['POSITIVE'] > 0.5:
                    positives2 = positives2 + 1;
                    print("ProcessComments: process_model1: comment: ", comment.original_value)
                    print("ProcessComments: process_model1: comment: ", result2)
                    comment.issue_type = issue_type2
                    comment.save()

        print("ProcessComments: process_model1: Positives: ", positives1)
        print("ProcessComments: process_model2: Positives: ", positives2)

    campaign.estat = "Comentaris processats"
    campaign.subestat = ""
    campaign.save()

    return True

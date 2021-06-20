import json
import os.path
import sys
import csv
import numpy as np
import pandas as pd
from colorama import Fore

#from __future__ import unicode_literals, print_function
import plac
import random
from pathlib import Path

import spacy
from spacy.util import minibatch, compounding
from spacy import displacy
from spacy.matcher import Matcher

pathmodel = "tfmsurveysapp/spacy/nlp_models/model2/"
languages = {"ca":"ca_fasttext_wiki", "es":"es_core_news_lg", "en":"en_core_web_sm" }
debug = 1

class TfmCategorizerModel2():

    def __init__(self, language):
        model = languages[language]

        self.nlp = spacy.load(pathmodel + language)
        if debug >= 1 :
            print("TfmCategorizeModel2: init: Model read: ", model)

    def test(self, comment):
        doc = self.nlp(comment)
        if debug >= 2:
            print("TfmCategorizerModel2: test", doc.cats)

        return doc.cats

import pycld2 as cld2
import spacy
from spacy_langdetect import LanguageDetector

debug = 1

class TfmLangDetector():

    #   Initialitation of the natural language processor
    def __init__(self):
        # Load English tokenizer, tagger, parser, NER and word vectors

        # ca_fasttext_wiki
        # es_core_news_sm
        # en_core_web_sm
        print("Inicializar clase")
        self.nlp = spacy.load("en_core_web_sm")
        self.nlp.add_pipe(LanguageDetector(), name='language_detector', last=True)
        print("Language Detector creado")

    # Detection of language using Spacy and PyCld2 and convination of both results
    def detect(self, comment):
        # Language detected by Spacy
        lang_spacy = self.nlp(comment)._.language["language"]

        # Language detecte by Pycld2
        isReliable, textBytesFound, details = cld2.detect(comment.encode('utf-8', 'replace'),
                                    isPlainText=True, bestEffort=True, returnVectors=False)
        lang_pycld2 = details[0][1]

        # Mix of predictions
        language = lang_spacy
        if (lang_spacy != "ca") & (lang_pycld2 == "ca"):
            language = "ca"

        if (lang_spacy != "ca") & (lang_spacy != "es") & (lang_pycld2 == "es"):
            language = "es"

        if (lang_spacy == "en") & (lang_pycld2 != "ca") & (lang_pycld2 != "es") & (lang_pycld2 != "en"):
            language = "ca"

        if language not in ("ca","es","en"):
            language = "ca"
            
        if (debug == 2):
            print(comment, ", ", lang_spacy, ", ", lang_pycld2, ", ", language)

        return language

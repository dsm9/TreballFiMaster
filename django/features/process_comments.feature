Feature: Process comments
In order to analyze the classification of the comment in a campaign
As a user
I want to process the comments of the campaign with the NLP Spacy model

Background: There is a registered user
  Given Exists a user "user" with password "password"
    And I login as user "user" with password "password"

  Scenario: Import surveys and comment of a campaign
    Given A list of comments of a campaing have been imported from lime
      |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||
    When I click the button process comments
    Then Comments of the campaing are processed with the NLP Spacy model
     And I'm viewing the list of comments of the campaign processed and his classification
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.|Comentari problemàtic|||

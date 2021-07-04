Feature: Process comments
In order to analyze the classification of the comment in a campaign
As a user
I want to process the comments of the campaign with the NLP Spacy model

Background: There is a registered user
  Given Exists a user "user" with password "password"
    And I login as user "user" with password "password"

  Scenario: Process comments of a campaign
    Given A list of comments of a campaing have been imported from lime
      |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||
    When I click the button process comments
    Then Comments of the campaing are processed with the NLP Spacy model
     And I'm viewing the list of comments of the campaign processed and his classification
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.|Comentari problemàtic|||

  Scenario: Process comments of a campaign
    Given A list of comments of a campaing have been imported from lime
      |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||
    When I click the button process comments
    Then Processing of comments starts with the NLP Spacy model
     And A timer starts counting 5 second
     And An information panel is visible with information about the processing state
     And I'm viewing the list of comments of the campaign
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||


  Scenario: Comments are being processed
    Given A list of comments of a campaing have been imported from lime
      |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees
    When Timer is activated
     And Processing of comments is executing
    Then Information panel is updated with processing state
     And Timer counts 5 seconds more
     And I'm viewing the list of comments of the campaign
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||

  Scenario: Processing has finished
    Given A list of comments of a campaing have been imported from lime
      |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees
    When Timer is activated
     And Processing of comments has finished
    Then Information panel show the final of the process
     And Closed button is visible
     And I'm viewing the list of comments of the campaign
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||


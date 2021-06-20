Feature: List survey comments
In order to list the surveys and comments associated with a campaign
As a user
I want to see a list of all comm|ents included in the surveys of the campaign

Background: There is a registered user
  Given Exists a user "user" with password "password"
  And I login as user "user" with password "password"

  Scenario: Select a campaign from a list
    Given A list of campaigns have been imported from lime
    | Codi campanya | Nom campanya | Codi tipus campanya | Tipus campanya | Data extracció Lime | Data importació |
    |101|18-19 Assignatura-professor màsters P 1r S|25|Enquesta assignatura-professor grau i màster univ.|2020-11-06|2021-03-15|
    |112|18-19 Assignatura-professor màsters P 2n S|25|Enquesta assignatura-professor grau i màster univ.|2020-11-06|2021-03-19|
    |115|18-19 Assignatura-professor INEFC 2n S|25|Enquesta assignatura-professor grau i màster univ.|2020-11-06||
    |132|18-19 Pràctiques externes - estudiantat (GEM - 3P)|9|Pràctiques externes - estudiantat      |2020-11-06|2021-03-21|
    |136|18-19 Pràctiques externes - tutor acadèmic (GEM)|11|Pràctiques externes - tutor acadèmic    |2020-11-06|2021-03-26|
    |137|18-19 Pràctiques externes - tutor acadèmic (UXXI)|11|Pràctiques externes - tutor acadèmcia  |2020-11-06||
    |105|105|2020-02-03|18-19 Titulats Grau AQU|7|Enquesta final programa - Grau|2020-11-06|2021-04-02|
    |106|106|2020-02-03|18-19 Titulats Doble Grau AQU|7|Enquesta final programa - Grau|2020-11-06|2021-04-12|

    When I select a campaign
    Then I'm viewing a list of comments from the selected campaign
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||


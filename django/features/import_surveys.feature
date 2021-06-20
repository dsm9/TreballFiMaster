Feature: Import surveys
In order to review comments in the surveys of a campaign
As a user
I want to import surveys and comments of a campaign from Lime

Background: There is a registered user
  Given Exists a user "user" with password "password"
    And I login as user "user" with password "password"

  Scenario: Import surveys and comment of a campaign
    Given A list of campaigns have been imported from lime
      | Codi campanya | Nom campanya | Codi tipus campanya | Tipus campanya | Data extracció Lime | Data importació |
      |101|18-19 Assignatura-professor màsters P 1r S|25|Enquesta assignatura-professor grau i màster univ.|2020-11-06|2021-03-15|
    When I click the import button from a campaign
    Then Surveys of the campaign are imported from Lime
     And Professor of the imported surveys are imported from Lime
     And Comments of the imported surveys are imported from Lime
     And Import date is updated
     And I'm viewing the list of comments imported from Lime of the selected campaign
    |sid |Descripció |Tipus preg. |Codi pregunta |Pregunta |tid |Idioma	|Comentari original	|Tipus incidència |Solució |Comentari proposat |
    |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||

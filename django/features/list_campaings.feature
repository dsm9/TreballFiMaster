Feature: List Campaigns
In order to list the campaings imported from Lime
As a user
I want to see a list of all imported campaigns

Background: There is a registered user
  Given Exists a user "user" with password "password"

  Scenario: Select a campaign from a list
    Given I login as user "user" with password "password"
      And A set of campaign types had been imported from Lime
    | id  | cod_tipo_campania_lime  | name                                                |
    | 7   | 7                       | Enquesta de final de programa - Grau                |
    | 8   | 8                       | Enquesta de final de programa - Master              |
    | 9   | 9                       | Enquesta de Pràcticum - Estudiantat                 |
    | 11  | 11                      | Enquesta de Pràcticum - Tutor acadèmic              |
    | 16  | 16                      | Enquesta de Pràcticum - Tutor empresa               |
    | 25  | 25                      | Enquesta assignatura-professor grau i màster univ.  |
      And A set of campaigns had been imported from Lime
    | id | cod_campania_lime | fecha_extraccion_lime | name | import_date | type_campaign_id |
    |101|101|2019-10-18|18-19 Assignatura-professor màsters P 1r S|2020-11-06|25|
    |112|112|2019-09-25|18-19 Assignatura-professor màsters P 2n S|2020-11-06|25|
    |115|115|2020-03-12|18-19 Assignatura-professor INEFC 2n S|2020-11-06|25|
    |132|132|2019-11-06|18-19 Pràctiques externes - estudiantat (GEM - 3P)|2020-11-06|9|
    |133|133|2019-12-18|18-19 Pràctiques externes INEFC – Alumnat|2020-11-06|9|
    |134|134|2019-12-18|18-19 Pràctiques externes INEFC – Tutor empresa|2020-11-06|16|
    |135|135|2019-12-18|18-19 Pràctiques externes INEFC – Tutor acadèmic|2020-11-06|11|
    |136|136|2020-03-09|18-19 Pràctiques externes - tutor acadèmic (GEM)|2020-11-06|11|
    |137|137|2019-11-06|18-19 Pràctiques externes - tutor acadèmic (UXXI)|2020-11-06|11|
    |105|105|2020-02-03|18-19 Titulats Grau AQU|2020-11-06|7|
    |106|106|2020-02-03|18-19 Titulats Doble Grau AQU|2020-11-06|7|
    |168|168|2020-03-18|19-20 Pràctiques externes - estudiantat (GEM - 1P)|2020-11-06|9|

    When I list the campaigns
    Then I'm viewing a list of campaigns
      | Codi campanya | Nom campanya  | Codi tipus campanya | Tipus campanya | Data extacció |
      | 168 | 19-20 Pràctiques externes - estudiantat (GEM - 1P) | 9 | Enquesta de Pràcticum - Estudiantat | Nov. 17, 2020 |
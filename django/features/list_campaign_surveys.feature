Feature: List Campaign Surveys
In order to list the surveys and comments associated with a campaign imported from Lime database
As a user
I want to see a list of all imported campaigns where I can select the one I'm interested in

Background: There is a registered user
  Given Exists a user "user" with password "password"

  Scenario: Select a campaign from a list
    Given I login as user "user" with password "password"
    And A set of campaigns have been imported from Lime
    And I'm viewing the list of campaigns
      | Cod. campanya | Nom campanya  | Tipus campanya | Data extacció |
    When I select the campaign "18-19 Assignatura-professor grau i màster univ."
    Then I see a list of surveys from campaign "18-19 Assignatura-professor grau i màster univ."


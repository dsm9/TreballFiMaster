Feature: Authenticate user
In order to list the campaings imported from Lime
As a user
I want to enter my user and password

Background: There is a registered user
  Given Exists a user "user" with password "password"

  Scenario: Select a campaign from a list
    Given the application has a correct connection to Lime database
    When I enter the user "user" and the password "password"
    Then the campaigns closed in Lime are syncronized with the campaigns in this App database
    And I see a list of campaigns
      | Cod. campanya | Nom campanya  | Tipus campanya | Data extacció |

Feature: Edit Comment
In order to edit the content of a comment
As a user
I want to see the details of the original commentary, including type of issue, type of proposed solution and the proposed commentary. It must be possible edit all the field unless the original commentary

Background: There is a registered user
  Given Exists a user "user" with password "passord"

  Scenario: Select a comment from a list
    Given I login as user "user" with password "password"
    And A record of comment have been imported from Lime
    And I'm viewing the fields of the comment
      | sid | Descripció | Codi pregunta | Pregunta | tid | Comentari original | Tipus incidència | Comentari proposat | Acceptar |
    When I modify the fields Tipus incidencia, Proposta solucio and Comentari proposat
    Then The fields modified have been saved and the program returns to surveys page

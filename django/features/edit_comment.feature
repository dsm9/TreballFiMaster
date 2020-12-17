Feature: Edit Comment
In order to edit the content of a comment
As a user
I want to see the details of the original commentary, including type of issue, type of proposed solution and the proposed commentary.
It must be possible edit all the field unless the original commentary

Background: There is a registered user
  Given Exists a user "user" with password "passord"
  And I login as user "user" with password "password"

  Scenario: Select a comment from a list
    Given A record of comment have been imported from Lime
    And I'm viewing the fields of the comment
      | sid | Descripció | Codi pregunta | Pregunta | tid | Comentari original | Tipus incidència | Comentari proposat | Acceptar |
    When I modify the field Tipus incidencia
    And I modify the field Proposta solucio
    And I modify the field Comentari proposat
    And I accept the changes
    Then The fields modified have been saved
    And the program returns to surveys page with the campaign "18-19 Assignatura-professor grau i màster univ."

Feature: List Survey Comments
In order to show the comment associated with a survey imported from Lime database
As a user
I want to see a list of all imported surveys and comments where I can select the one I'm interested in

Background: There is a registered user
  Given Exists a user "user" with password "password"

  Scenario: Select a comment from a list
    Given I login as user "user" with password "password"
    And A set of surveys and comments have been imported from Lime
    And I'm viewing the list of surveys and comment
      | sid | Descripció | Codi pregunta | Pregunta | tid | Comentari original | Tipus incidència | Comentari proposat | Acceptar |
    When I select the comment with sid=1028, codi pregunta=P0202 and tid=1
    Then I see a the details of the comment with sid=1028, codi pregunta=P0202 and tid=1

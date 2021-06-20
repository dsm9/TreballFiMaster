Feature: View survey comment
In order to show the detail of a comment associated with a survey
As a user
I want to see the details of the comment

Background: There is a registered user
  Given Exists a user "user" with password "password"
  And I login as user "user" with password "password"

  Scenario: Select a comment from a list
    Given A set of surveys and comments have been imported from Lime
    And I'm viewing the list of surveys and comments
      | sid | Descripció | Tipus pregunta |Codi pregunta | Pregunta | tid | Idioma | Comentari original | Tipus incidència | Comentari proposat |
      |916267 |Enquesta als titulats/des en MÀSTER DISSENY I GESTIÓ D'ENTORNS BIM: EDIFICACIÓ, ESTRUCTURES I INSTAL·LAC - 034M ||PR020 |Punts forts / Àrees de millora |	8 |	ca |Millorar en l'organització del curs, i el compliment dels horaris.||||

    When I select a comment
    Then I see the details of the comment in an editable form
    | Tipus pregunta | Codi pregunta | Tid | Pregunta | Comentari original | Idioma | Tipus incidencia | Proposta solucio | Comentari proposat |


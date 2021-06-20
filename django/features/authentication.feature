Feature: Authenticate user
In order to access to the application
As a user
I want to enter my user and password

Background: There is a registered user
  Given Exists a user "user" with password "password"

  Scenario: Successful login
    Given the application has a correct connection to Lime database
    When I enter the user "user" and the password "password"
    And user and password are correct
    Then I see the default page of the app

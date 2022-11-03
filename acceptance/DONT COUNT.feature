Feature: login
  In order to have access to all of the features of JKN-Bay
  As a person
  I want to be able to login to my profile

  Scenario: try with correct info
    Given that I have created my profile
    When I input the correct username and password for my profile
    Then I am logged into my account
  
  Scenario: try with incorrect info
    Given that I have created my profile
    When I input the incorrect username and password for my profile
    Then I am not logged into my profile

Feature: logout
  In order to safely exit JKN-bay
  As a buyer, or seller
  I want to be able to log out 

  Scenario:
    Given that I have clicked the "Log out" button
    Then I should be redirected to the main page as a person

Feature: Create_Profile
  In order to be able to login
  As a person
  I want to be able to create my profile

  Scenario: try input proper info
    Given that I am in "/Product/index"
    When I click the "Create Profile" button
    And input all feilds
    Then I am redirected to the login page

  Scenario: try input username that already taken
    Given that I am in "/Product/index"
    When I click the "create profile" button
    And input all feilds with an existing username
    Then my profile is not created
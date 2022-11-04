Feature: Edit_Profile
  In order to have the proper info for my profile
  As a buyer, or seller
  I want to be able to update my profile

  Scenario: try to edit my profile
    Given that I am on "/Profile/edit"
    When I input my new info
    And I click the "Save" button
    Then my profile is updated

  Scenario: try to edit my username to one thats already taken
    Given that I am on "/Profile/edit"
    When I input my new username thats taken
    And I click the "Save" button
    Then my profile is not updated

  Scenario: try to edit my postal code to one thats not valid
    Given that I am on "/Profile/edit"
    When I input my new postal code thats invalid
    And I click the "Save" button
    Then my profile is not updated

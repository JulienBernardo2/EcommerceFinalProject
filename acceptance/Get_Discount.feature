Feature: get discount code
  In order to get a rebait on checkout
  As a buyer
  I want to be able to get my discount code

  Scenario:
    Given that I have just created my profile
    And am on "/Product/index"
    When I click the "My Profile" button
    Then I am able to see my discount code
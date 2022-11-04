Feature: Rate_Products
  In order to give feedback on products
  As a buyer
  I want to be able to rate the product

  Scenario:
    Given that I am on "/Product/index"
    And that I have clicked on the "Details" button
    When I click on the "Rate" button
    And input my rating
    Then I can see my rating for that product
Feature: Input_Discount
  In order to get a reduced price for my cart
  As a buyer
  I want to be able to input my discount code

  Scenario:
    Given that I have added a product to my cart
    When I click on the "Cart" button
    And input my discount code
    Then the total price of my cart should decrease
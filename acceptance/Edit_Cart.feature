Feature: Edit_Cart
  In order to edit the amount of a specific product in my cart
  As a buyer
  I want to be able to edit the amount of a specific product

  Scenario: try with a proper quantity amount
    Given that I have added a product to my cart
    When I click on the "Cart" button
    And click on the quantity
    When I input the new quantity
    And I click the "Update Cart" button
    Then my cart is updated

  Scenario: try with a improper quantity amount
    Given that I have added a product to my cart
    When I click on the "Cart" button
    And click on the quantity
    When I input the new quantity too high for the seller
    And I click the "Update Cart" button
    Then my cart is not updated

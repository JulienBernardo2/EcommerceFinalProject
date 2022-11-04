Feature: Checkout_Cart
  In order to buy products
  As a buyer
  I want to be able to buy many products
 
  Scenario: 
    Given I have a product with a cost of "$200" in my cart
    When I click the "Checkout" button
    Then my cart is empty
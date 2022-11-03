Feature: Add_Product
  In order to select products that I want to buy
  As a buyer
  I want to be able to add products to my cart

  Scenario: add an item with a proper quantity amount
    Given that I am in "/Product/index"
    When I click the "Add to cart" button
    And I select the quantity that I want to add
    Then the product is added to my cart
  
  Scenario: add an item with an inproper quantity amount
    Given that I am in "/Product/index"
    When I click the "Add to cart" button
    And I select a quantity higher then the seller has in stock 
    Then nothing is added to my cart
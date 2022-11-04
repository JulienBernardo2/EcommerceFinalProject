Feature: View_Cart
  In order to see all of my products in my cart
  As a buyer
  I want to be able to view my cart

  Scenario:
    Given that I am on "/Product/index"
    When I click on the "Cart" button
    Then I am able to see my cart
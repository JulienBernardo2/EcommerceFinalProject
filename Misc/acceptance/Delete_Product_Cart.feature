Feature: Delete_Product_Cart
  In order to delete products in my cart
  As a buyer
  I want to be able to delete the product

  Scenario:
    Given that I have added a product to my cart
    When I click on the "Cart" button
    And click on the "Delete" button
    Then the product is deleted from my cart

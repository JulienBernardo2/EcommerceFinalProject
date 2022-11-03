Feature: Delete_My_Products
  In order to keep track of what is being sold
  As a seller
  I want to be able to delete my products

  Scenario:
    Given that I am on "/Seller/index"
    And that I have clicked on the "Profile" button
    When I click the "Delete" button
    Then the product is deleted 

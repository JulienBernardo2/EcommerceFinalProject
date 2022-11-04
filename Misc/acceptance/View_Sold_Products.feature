Feature: View_Sold_Products
  In order to keep track of all my past products
  As a seller
  I want to be able to view all of my sold products

  Scenario:
    Given that I am on "/Seller/index"
    And that I have clicked on the "Profile" button
    When I click on the "Sold History" button
    Then I see all of my sold products

Feature: View_My_Products
  In order to view everything that I am selling
  As a seller
  I want to be able to view my products

  Scenario:
    Given that I have products for sale
    And that I am on "Seller/index"
    When I click on the "Profile" button
    Then I see all of my products
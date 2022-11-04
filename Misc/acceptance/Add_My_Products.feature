Feature: Add_My_Products
  In order to sell products
  As a seller
  I want to be able to add them to the catalog

  Scenario:
    Given that I am on "/Seller/index"
    And that I have clicked on the "Profile" button
    When I click on the "Add product" button
    And input the feilds
    Then I can see my new item in the catalog
Feature: Edit_My_products
  In order to keep my product info up to date
  As a seller
  I want to be able to edit my product

  Scenario:
    Given that I am on "/Seller/index"
    And that I have clicked on the "Profile" button
    When I the "Edit" button
    And I input the new feilds
    Then the product is updated
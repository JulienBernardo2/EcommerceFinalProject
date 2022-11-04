Feature: Add_My_Products
  In order to sell products
  As a seller
  I want to be able to add them to the catalog

  Scenario:
    Given that I am on "/Product/index"
    When I click on the "Add product" button
    And input the feilds
    Then I can see my new product in the "My products" page

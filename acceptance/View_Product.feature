Feature: View_Product
  In order to browse through the catalog
  As a person, or buyer
  I want to be able to view the products for sale

  Scenario:
    Given that I am on "/Product/index"
    Then I see a catalog with all of the availible products

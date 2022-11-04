Feature: Search_Product
  In order to find products
  As a person, or buyer
  I want to be able to input search terms to see the matching availible products

  Scenario: try searching "shoes"
    Given that I have clicked in the search box
    When I input "shoes"
    Then I see many products with a similar or identical name, description or category to "shoes"
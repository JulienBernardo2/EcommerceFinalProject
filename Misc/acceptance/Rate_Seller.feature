Feature: Rate_Sellers
  In order to give feedback on seller
  As a buyer
  I want to be able to rate the sellers

  Scenario: through order history
    Given that I am on "/Products/index"
    And that I have clicked on the "Profile" button
    When I click on the "Order History" button
    Then I see my bought products
    When I click on the seller username
    Then I can see the seller profile
    When I click on the "Rate" button
    And input my rating
    Then I can see my rating for that seller

  Scenario: through search
    Given that I am on "/Product/index"
    Given that I have clicked in the search box
    And I input "julien"
    When I click on the seller username
    Then I can see the sellet profile
    When I click on the "Rate" button
    And input my rating
    Then I can see my rating for that seller
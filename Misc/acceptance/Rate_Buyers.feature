Feature: Rate_Buyers
  In order to give feedback on buyers
  As a seller
  I want to be able to rate the buyers

  Scenario: through sold history
    Given that I am on "/Admin/index"
    And that I have clicked on the "Profile" button
    When I click on the "Sold History" button
    Then I see my sold products
    When I click on the buyer username
    Then I can see the buyer profile
    When I click on the "Rate" button
    And input my rating
    Then I can see my rating for that buyer

  Scenario: through search
    Given that I am on "/Admin/index"
    Given that I have clicked in the search box
    And I input "julien"
    When I click on the buyer username
    Then I can see the buyer profile
    When I click on the "Rate" button
    And input my rating
    Then I can see my rating for that buyer
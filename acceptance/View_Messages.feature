Feature: View_Messages
  In order to get information
  As a buyer, or seller
  I want to be able to view my messages

  Scenario: 
    Given that I am on "/Product/index"
    When I click on the "Messages" button
    Then I see a list of messages from sellers

Feature: Delete_Messages
  In order to avoid problem
  As a buyer, or seller
  I want to be able to delete my messages

  Scenario: 
    Given that I am on "/Product/index"
    When I click on the "Messages" button
    Then I see a list of messages from sellers
    When I click the "Delete" button
    Then my message is deleted
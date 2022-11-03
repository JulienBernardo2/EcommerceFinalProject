Feature: Contact_Buyer
  In order to reply to the questions about my products
  As a seller
  I want to be able to reply to my messages

  Scenario: 
    Given that I am on "/Seller/index"
    And that I have clicked on the "Messages" button
    Then I see a list of messages
    When I click the "Reply" button
    And input my message
    Then the message is sent to the buyer
Feature: Contact_Seller
  In order to ask questions about products
  As a buyer
  I want to be able to contact the seller

  Scenario:
    Given that I am on "/Product/index"
    When I click on the "details" button
    Then I am able to write a short message
    When I click the "send" button
    Then it sends my message to the seller

Feature: View_Orders
  In order to keep track of all my past orders
  As a buyer
  I want to be able to view all of my bought products

  Scenario:
    Given that I am on "/Profile/index"
    When I click on the "Order History" button
    Then I see all of my past bought products
# **Feature Suite**

### Team Members
  1. Julien Bernardo
  2. Natan Lellouche
  3. Kyle Husbands

---

1. Feature: search products
   <br> &emsp;In order to find products
   <br> &emsp;As a person
   <br> &emsp;I want to be able to input search terms to see the matching availible products
    
    &emsp;Scenario: try searching "shoes"
    <br> &emsp;&emsp;Given that I have clicked in the search box
    <br> &emsp;&emsp;When I input "shoes"
    <br> &emsp;&emsp;Then I see many products with a similar or identical name, description or category to "shoes"

Feature: view the catalog of products
  In order to browse through the catalog
  As a person
  I want to be able to view the products for sale

  Scenario:
    Given that I am at JKN-Bay website
    Then I see a catalog with all of the availible products

Feature: create profile
  In order to be able to login
  As a person
  I want to be able to create my profile

  Scenario: try input proper info
    Given that I have clicked the create profile button
    When I input "Julien" as a username, "1234" as a password, "I am new to JKN-Bay" as my bio
    And I select buyer as my role
    And I click the Create profile button
    Then I am redirected to the login page

  Scenario: try input username that already taken
    Given that I have clicked the create profile button
    When I input "Julien" as a username, "1234" as a password, "I am new to JKN-Bay" as my bio
    And I select buyer as my role
    And I click the Create profile button
    Then there is a error message shown stating that my username is already taken


Feature: login
  In order to have access to all of the features of JKN-Bay
  As a person
  I want to be able to login to my profile

  Scenario: try with correct info
    Given that I have created my profile
    When I input the correct username and password for my profile
    Then I am logged into my account
  
  Scenario: try with incorrect info
    Given that I have created my profile
    When I input the incorrect username and password for my profile
    Then I am not logged into my profile

Feature: get discount code
  In order to get a rebait on checkout
  As a buyer
  I want to be able to get my discount code

  Scenario:
    Given that I have just created my profile
    And logged into JKN-Bay
    When I click on Profile Button
    Then I am able to see my discount code

Feature: edit my profile
  In order to have the proper info for my profile
  As a buyer
  I want to be able to update my profile

  Scenario: try to edit my bio
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I input my new bio
    And click on the save button
    Then my bio is updated

  Scenario: try to edit my username to one thats already taken
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I input my new username thats already taken
    And click on the save button
    Then there is an error message shown and my profile is not updated

Feature: view order history
  In order to keep track of all my past orders
  As a buyer
  I want to be able to view all of my bought products

  Scenario:
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I click on the Order History button
    Then I see all of my bought products

Feature: view the catalog of products
  In order to browse through the catalog
  As a buyer
  I want to be able to view the products for sale

  Scenario:
    Given that I am in JKN-Bay
    Then I see a catalog with all of the availible products

Feature: contact seller
  In order to ask questions about products
  As a buyer
  I want to be able to contact the seller

  Scenario:
    Given that I am in the catalog and have an product that I want to question about
    When I click on the details button for that product
    Then I am able to write a short message
    When I click the send button
    Then it sends my message to that seller 

Feature: view messages
  In order to view the answers to my questions about a product
  As a buyer
  I want to be able to view my messages

  Scenario: 
    Given that I have logged into JKN-bay
    When I click on the messages button
    Then I see a list of messages from sellers

Feature: add products to my cart
  In order to select products that I want to buy
  As a buyer
  I want to be able to add products to my cart

  Scenario: add an item with a proper quantity amount
    Given that I am in the catalog and have a product that I want
    When I click the add to cart button
    And I select the quantity that I want to add
    Then that product is added in my cart
  
  Scenario: add an item with an inproper quantity amount
    Given that I am in the catalog and have a product that I want
    When I click the add to cart button
    And I select a quantity higher then the seller has in stock 
    Then an error message is shown and nothing is added to my cart

Feature: view details about a product
  In order to know more information about the product
  As a buyer
  I want to be able to view the details about a product

  Scenario:
    Given that I am in the catalog and have a product I want
    When I click the details button for that product
    Then I see all of the details for that product


Feature: search products
  In order to find products
  As a buyer
  I want to be able to input search terms to see the matching availible products

  Scenario: try searching "shoes"
    Given that I have clicked in the search box
    When I input "shoes"
    Then I see many products with a similar or identical name, description or category to "shoes"

Feature: view my cart
  In order to see all of my products in my cart
  As a buyer
  I want to be able to view my cart

  Scenario:
    Given that I have logged into JKN-Bay
    When I click on the Cart Button
    Then I am able to see the products that are in my cart

Feature: edit quantities in cart
  In order to edit the amount of a specific product in my cart
  As a buyer
  I want to be able to edit the amount of a specific product

  Scenario: try with a proper quantity amount
    Given that I have added a product to my cart
    When I click on the quantity for the specific product in mind
    And input the new quantity
    Then I click the Update cart button
    And a success message is shown and my cart is updated

  Scenario: try with improper quantity amount
    Given that I have added a product to my cart
    When I click the on the quantity for the specific product in mind
    And input the new quantity which is too low or high from what the seller has in stock
    Then I click the Update cart button
    And a error message is shown and my cart is not updated

Feature: delete products from cart
  In order to delete products in my cart
  As a buyer
  I want to be able to delete the product

  Scenario:
    Given that I have added a product to my cart
    When I click on the delete button for that specific product in mind
    Then the product is deleted from my cart

Feature: checkout my cart
  In order to buy products
  As a buyer
  I want to be able to buy many products
 
  Scenario: 
    Given I have a product with a cost of $200 in my cart
    When I click the checkout button
    Then my cart is empty


Feature: input discount code
  In order to get a reduced price for my cart
  As a buyer
  I want to be able to input my discount code

  Scenario:
    Given that I have products in my cart
    And that I have inputted my discount code
    Then the total price of my cart should decrease by 15%

Feature: logout
  In order to safely exit JKN-bay
  As a buyer
  I want to be able to log out 

  Scenario:
    Given that I have clicked the log out button
    Then I should be redirected to the main page as a person

Feature: view my products
  In order to view everything that I am selling
  As a seller
  I want to be able to view my products

  Scenario:
    Given that I have products for sale
    And that I have logged in
    When I click on the profile button
    Then I see all of my products that I have posted for sale

Feature: add products
  In order to sell products
  As a seller
  I want to be able to add them to the catalog

  Scenario:
    Given that I have clicked on the profile button
    And I have clicked on the add product button
    When I click the add product button
    And input the product name, description, quantity
    Then I can see my new item in the catalog

Feature: edit products
  In order to keep my product info up to date
  As a seller
  I want to be able to edit my product

  Scenario:
    Given that I have clicked on the profile button
    And I have clicked on the desired product to edit
    When I input the new name or description or quantity
    Then there is a success message shown and the product has been updated 

Feature: delete products
  In order to keep track of what is being sold
  As a seller
  I want to be able to delete my products

  Scenario:
  Given that I have clicked on the profile button
  When I click on the delete button for my desired product to delete
  Then the product is deleted 

Feature: view sold products history
  In order to keep track of all my past products
  As a buyer
  I want to be able to view all of my sold products

  Scenario:
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I click on the Sold History button
    Then I see all of my sold products

Feature: edit my profile
  In order to have the proper info for my profile
  As a seller
  I want to be able to update my profile

  Scenario: try to edit my bio
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I input my new bio
    And click on the save button
    Then my bio is updated

  Scenario: try to edit my username to one thats already taken
    Given that I have logged into JKN-Bay
    And I have clicked on the Profile button
    When I input my new username thats already taken
    And click on the save button
    Then there is an error message shown and my profile is not updated

Feature: view messages
  In order to view the questions about my products
  As a seller
  I want to be able to view my messages

  Scenario: 
    Given that I have logged into JKN-bay
    When I click on the messages button
    Then I see a list of messages from interested buyers

Feature: reply to messages
  In order to reply to the questions about my products
  As a seller
  I want to be able to reply to my messages

  Scenario: 
    Given that I have logged into JKN-bay
    When I click on the messages button
    Then I see a list of messages from interested buyers
    When select the buyer message that I want to respond too
    And input my message
    Then the message is sent to the buyer

Feature: logout
  In order to safely exit JKN-bay
  As a seller
  I want to be able to log out 

  Scenario:
    Given that I have clicked the log out button
    Then I should be redirected to the main page as a person

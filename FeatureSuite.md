# **Feature Suite**

### Team Members
  1. Julien Bernardo
  2. Natan Lellouche
  3. Kyle Husbands

---
<details>
  <summary>Features for Person</summary>
   <br>&emsp;&emsp;1. Feature: search products
                  <br> &emsp;&emsp;&emsp;&emsp;In order to find products
                  <br> &emsp;&emsp;&emsp;&emsp;As a person
                  <br> &emsp;&emsp;&emsp;&emsp;I want to be able to input search terms to see the matching availible products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try searching "shoes"
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked in the search box
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input "shoes"
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see many products with a similar or identical name, description or category to "shoes"
   <br><br>
   &emsp;&emsp;2. Feature: view the catalog of products
                  <br>&emsp;&emsp;&emsp;&emsp;In order to see all of the products for sale
                  <br>&emsp;&emsp;&emsp;&emsp;As a person
                  <br>&emsp;&emsp;&emsp;&emsp;I want to be able to view the catalog
   <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
   <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am at JKN-Bay website
   <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see a catalog with all of the availible products
  <br><br>
  &emsp;&emsp;3. Feature: create profile
                 <br> &emsp;&emsp;&emsp;&emsp;In order to be able to login
                 <br> &emsp;&emsp;&emsp;&emsp;As a person
                 <br> &emsp;&emsp;&emsp;&emsp;I want to be able to create my profile
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try input proper info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked the create profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input "Julien Bernardo" as fullname, "1234" as a password, "H3e-23m" as my postal code, "665-444" as credit card         &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;number, "laval" as my city
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I select buyer as my role
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I click the Create profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I am redirected to the login page and my profile is created
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try input improper info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked the create profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input "Julien Bernardo" as fullname, "1234" as a password, "hello" as my postal code, "hello" as credit card             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;number, "laval" as my city
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I select buyer as my role
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I click the Create profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then there is a error message shown and my profile is not created
  <br><br>
   &emsp;&emsp;4. Feature: switch from buyer to seller
                 <br> &emsp;&emsp;&emsp;&emsp;In order to have access to all of the features of buyer and seller
                 <br> &emsp;&emsp;&emsp;&emsp;As a person
                 <br> &emsp;&emsp;&emsp;&emsp;I want to be able to switch my account role to buyer or seller
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try as seller
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have created my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have logged in as a seller
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the buyer button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then my profile is switched to buyer version
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try as buyer
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have created my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have logged in as a buyer
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the seller button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then my account is switched to my seller version
  <br><br>
  &emsp;&emsp;5. Feature: login
                 <br> &emsp;&emsp;&emsp;&emsp;In order to have access to all of the features of JKN-Bay
                 <br> &emsp;&emsp;&emsp;&emsp;As a person
                 <br> &emsp;&emsp;&emsp;&emsp;I want to be able to login to my profile
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with correct info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have created my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input the correct username and password for my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I am logged into my account
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with incorrect info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have created my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input the incorrect username and password for my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I am not logged into my profile
</details>
<br>
<details>
  <summary>Features for Buyer</summary>
  <br>&emsp;&emsp;6. Feature: get discount code
                     <br> &emsp;&emsp;&emsp;&emsp;In order to get a rebait on checkout
                     <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                     <br> &emsp;&emsp;&emsp;&emsp;I want to be able to get my discount code
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have just created my profile
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on Profile Button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I am able to see my discount code
   <br><br>
  <br>&emsp;&emsp;7. Feature: edit my profile
                     <br> &emsp;&emsp;&emsp;&emsp;In order to have the proper info for my profile
                     <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                    <br> &emsp;&emsp;&emsp;&emsp;I want to be able to update my profile
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try to edit my bio
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input my new info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And click on the save button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then my bio is updated
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try to edit my info incorrectly
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input my new credit card or postal code that is fake
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And click on the save button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then there is an error message shown and my profile is not updated
   <br><br>
  <br>&emsp;&emsp;8. Feature: view order history
                    <br> &emsp;&emsp;&emsp;&emsp;In order to keep track of all my past orders
                    <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                    <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view all of my bought products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the Order History button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see all of my bought products
<br><br>
  <br>&emsp;&emsp;9. Feature: view the catalog of products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to browse through the catalog
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view the products for sale
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am in JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see a catalog with all of the availible products
<br><br>
  <br>&emsp;&emsp;10. Feature: contact seller
                      <br> &emsp;&emsp;&emsp;&emsp;In order to ask questions about products
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to contact the seller
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am in the details section for a product
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the contact seller button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I write a short message
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I click the send button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then it sends my message to that seller 
<br><br>
  <br>&emsp;&emsp;11. Feature: view messages
                      <br> &emsp;&emsp;&emsp;&emsp;In order to view the answers to my questions about a product
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view my messages
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: 
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the messages button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see a list of messages from sellers
<br><br>
  <br>&emsp;&emsp;12. Feature: add products to my cart
                      <br> &emsp;&emsp;&emsp;&emsp;In order to select products that I want to buy
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to add products to my cart
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: add an item with a proper quantity amount
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am in the catalog and have a product that I want
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the add to cart button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I select the quantity that I want to add
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then that product is added in my cart
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: add an item with an inproper quantity amount
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am in the catalog and have a product that I want
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the add to cart button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I select a quantity higher then the seller has in stock 
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then an error message is shown and nothing is added to my cart
<br><br>
  <br>&emsp;&emsp;13. Feature: view details about a product
                      <br> &emsp;&emsp;&emsp;&emsp;In order to know more information about the product
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view the details about a product
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I am in the catalog and have a product in mind
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the details button for that product
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see all of the details for that product
<br><br>
  <br>&emsp;&emsp;14. Feature: search products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to find products
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to input search terms to see the matching availible products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try searching "shoes"
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked in the search box
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input "shoes"
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see many products with a similar or identical name, description or category to "shoes"
<br><br>
  <br>&emsp;&emsp;15. Feature: view my cart
                      <br> &emsp;&emsp;&emsp;&emsp;In order to see all of my products in my cart
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view my cart
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the Cart Button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I am able to see the products that are in my cart
<br><br>
  <br>&emsp;&emsp;16. Feature: edit quantities in cart
                      <br> &emsp;&emsp;&emsp;&emsp;In order to edit the amount of a specific product in my cart
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to edit the amount of a specific product
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with a proper quantity amount
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have added a product to my cart
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the quantity for the specific product in mind
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And input the new quantity
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the Update cart button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then a success message is shown and my cart is updated
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with improper quantity amount
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have added a product to my cart
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the on the quantity for the specific product in mind
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And input the new quantity which is too low or high from what the seller has in stock
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the Update cart button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then a error message is shown and my cart is not updated
<br><br>
  <br>&emsp;&emsp;17. Feature: delete products from cart
                      <br> &emsp;&emsp;&emsp;&emsp;In order to delete products in my cart
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to delete the product
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have added a product to my cart
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the delete button for that specific product in mind
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then the product is deleted from my cart
<br><br>
  <br>&emsp;&emsp;18. Feature: checkout my cart
                      <br> &emsp;&emsp;&emsp;&emsp;In order to buy products
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to buy many products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: 
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given I have a product with a cost of $200 in my cart
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the checkout button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then my cart is empty
<br><br>
  <br>&emsp;&emsp;19. Feature: input discount code
                      <br> &emsp;&emsp;&emsp;&emsp;In order to get a reduced price for my cart
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to input my discount code
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have products in my cart
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And that I have inputted my discount code
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then the total price of my cart should decrease by 15%
<br><br>
  <br>&emsp;&emsp;20. Feature: logout
                      <br> &emsp;&emsp;&emsp;&emsp;In order to safely exit JKN-bay
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to log out 
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked the log out button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I should be redirected to the main page as a person
</details>
<br>
<details>
  <summary>Features for Seller</summary>
  <br>
  <br>&emsp;&emsp;21. Feature: view my products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to view everything that I am selling
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view my products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have products for sale
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And that I have logged in
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see all of my products that I have posted for sale
<br><br>
  <br>&emsp;&emsp;22. Feature: add products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to sell products
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to add them to the catalog
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with proper values
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked on the profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the add product button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the add product button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And input the product name, price, description, quantity, image, and category
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I can see my new item is added in the catalog
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with improper values
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked on the profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the add product button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click the add product button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And input the product name, price, description, "hello" as quantity, image, and category
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I can see my new item is not added in the catalog
<br><br>
  <br>&emsp;&emsp;23. Feature: edit products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to keep my product info up to date
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to edit my product
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with proper values
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked on the profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the desired product to edit
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input the new info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then there is a success message shown and the product has been updated 
   <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try with improper values
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked on the profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the desired product to edit
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input the new info but with the wrong types for quantity
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then there is a error message shown and the product is not updated 
<br><br>
  <br>&emsp;&emsp;24. Feature: delete products
                      <br> &emsp;&emsp;&emsp;&emsp;In order to keep track of what is being sold
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to delete my products
  <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked on the profile button
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the delete button for my desired product to delete
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then the product is deleted 
<br><br>
  <br>&emsp;&emsp;25. Feature: view sold products history
                      <br> &emsp;&emsp;&emsp;&emsp;In order to keep track of all my past products
                      <br> &emsp;&emsp;&emsp;&emsp;As a buyer
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view all of my sold products
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the Sold History button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see all of my sold products
<br><br>
  <br>&emsp;&emsp;26. Feature: edit my profile
                     <br> &emsp;&emsp;&emsp;&emsp;In order to have the proper info for my profile
                     <br> &emsp;&emsp;&emsp;&emsp;As a seller
                    <br> &emsp;&emsp;&emsp;&emsp;I want to be able to update my profile
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try to edit my bio
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input my new info
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And click on the save button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then my bio is updated
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: try to edit my info incorrectly
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-Bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And I have clicked on the Profile button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I input my new credit card or postal code that is fake
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And click on the save button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then there is an error message shown and my profile is not updated
   <br><br>
  <br>&emsp;&emsp;27. Feature: view messages
                      <br> &emsp;&emsp;&emsp;&emsp;In order to view the questions about my products
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to view my messages
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: 
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the messages button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see a list of messages from interested buyers
<br><br>
  <br>&emsp;&emsp;28. Feature: reply to messages
                      <br> &emsp;&emsp;&emsp;&emsp;In order to reply to the questions about my products
                      <br> &emsp;&emsp;&emsp;&emsp;As a seller
                      <br> &emsp;&emsp;&emsp;&emsp;I want to be able to reply to my messages
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario: 
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have logged into JKN-bay
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When I click on the messages button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I see a list of messages from interested buyers
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;When select the buyer message that I want to respond too
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;And input my message
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then the message is sent to the buyer
<br><br>
  <br>&emsp;&emsp;29. Feature: logout
                      <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;In order to safely exit JKN-bay
                      <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;As a seller
                      <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;I want to be able to log out 
    <br><br>&emsp;&emsp;&emsp;&emsp;Scenario:
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Given that I have clicked the log out button
    <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Then I should be redirected to the main page as a person
  </details>

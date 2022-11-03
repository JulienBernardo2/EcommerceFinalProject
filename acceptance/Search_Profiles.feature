Feature: Search_Profiles
  In order to find people
  As a person, buyer, or seller
  I want to be able to input search terms to see the matching people

  Scenario: try searching "julien"
    Given that I have clicked in the search box
    When I input "julien"
    Then I see the profile named "julien"
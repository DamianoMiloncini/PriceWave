Feature: View Recipe Price
  In order to know the cost of recipes
  As a user
  I want to be able to view the current price of a recipe
  
  Scenario: View current price of a recipe
    Given I am on the "/Recipe/displayAll"
    Then I should see the total price of the "Fruit Bowl" recipe is "8.18"
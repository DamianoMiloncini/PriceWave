Feature: FilterByPrice
  In order to filter item search by price
  As a visitor or logged in user
  I need to have searched for an item, gotten results and applied price filters

Scenario: try SearchForItem "milk"
        Given I login
        And I am on "http://localhost/home"
        When I enter "milk" in the search bar
        And I click "searchButton"
        Then I am redirected to "http://localhost/Item/search/milk"
        And I see an array of "item" whose attribute "name" contains "milk"

  
  Scenario: try FilterByPrice from chosen range
        Given I am on "http://localhost/Item/search/milk"
        And I see an array of "item" whose attribute "name" contains "milk"
        When I fill "minPrice" in "3.93" 
        And I fill "maxPrice" in "3.95" 
        And I click "Apply"
        Then I see "Skim Milk"  

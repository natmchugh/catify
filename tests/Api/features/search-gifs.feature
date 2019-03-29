Feature: Searching Gifs
    In order to improve my well being
    As a cat lover
    I need to see animated gifs of cats for a given search term

Scenario: Search for a popular term that gives me results
        Given I want to search gifs
        And I have a valid API Token
        When I search "typing"
        Then I should get:
        """
        {
            "data": [
                {
                  "title": "Typing",
                  "url": "/gifs/typing.gif"
                }   
            ]
        }
        """
        And I should get a "200" Response Code with Status "OK"

Scenario: Search for a unpopular term that gives me no results
        Given I want to search gifs
        And I have a valid API Token
        When I search "dogs"
        Then I should get a "404" Response Code with Status "Not Found"

Scenario: Search with an invalid API-TOKEN
        Given I want to search gifs
        And I have a invalid API Token
        When I search "anything"
        Then I should get a "401" Response Code with Status "Unauthorized"

Scenario: Search for a random cat gif
        Given I want to search gifs
        And I have a valid API Token
        When I visit the random endpoint
        Then I should get a "200" Response Code with Status "OK"
        And I should get a gif with a title and url

Scenario: Show all the gifs available with a wildcard search
        Given I want to search gifs
        And I have a valid API Token
        When I search with no term
        Then I should get a "200" Response Code with Status "OK"
        And I should get multiple gifs

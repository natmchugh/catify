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
            "data": {
                "gif": {
                  "title": "Typing",
                  "url": "/gifs/typing.gif"
                }   
            }
        }
        """
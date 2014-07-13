Feature: Alert Service
    Scenario Outline: Use a cleaner API to create popular alerts
        When I create a "<type>" alert with "msg"
        Then the output should match the stub for "<type>" 

        Examples:
            | type    |
            | success |
            | info    |
            | danger  |
            | warning |

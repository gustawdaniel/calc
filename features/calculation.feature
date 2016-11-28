Feature: Executing calculations on the website
  In order to calculate sum or difference
  As an web browser
  I want to see result after pressing button

  @javascript
  Scenario Outline: Action on two numbers
    Given I am on the homepage
    And I set "a" as <a>
    And I set "b" as <b>
    When I press "<action>"
    And I wait 1000 ms for jQuery
    Then Result should be <result>

    Examples:
      | a      | b       | action | result |
      | 1      | 2       | sum    | 3      |
      | 3      | 6       | sum    | 9      |
      | 100    | 2000    | sum    | 2100   |
      | -1.5   | -3.1    | sum    | -4.6   |
      | 1.9990 | -0.0090 | sum    | 1.99   |
      | 1      | 2       | diff   | -1     |
      | -1     | -2      | diff   | 1      |
      | 1.001  | 2.001   | diff   | -1     |
      | 0.993  | 9.33    | diff   | -8.337 |
      | 12     | -12     | diff   | 24     |

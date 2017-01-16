Feature: Create class due domain event

  Scenario: Create class
    Given I have base project with psr-0
    When I pick up event on created class with name "Foo" in namespace "Bar\"
    Then I should see new file at "src/Bar/Foo.php"
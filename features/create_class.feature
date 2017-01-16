Feature: Create class due domain event

  Scenario: Create class in PSR-0
    Given I have base project "Test\Domain\" with psr-0
    When I pick up event on created class with name "Foo" in namespace "Bar\"
    Then I should see new file at "src/Bar/Foo.php" in project
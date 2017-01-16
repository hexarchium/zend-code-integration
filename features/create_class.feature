Feature: Create class due domain event

  Scenario: Create class in PSR-0
    Given I have base project with psr-0
    When I pick up event on created class with name "Foo" in namespace "Test\Bar\"
    Then I should see new file at "src/Test/Bar/Foo.php" in project
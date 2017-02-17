Feature: Create class due domain event

  @psr0
  Scenario: Create class in PSR-0
    When I pick up event on created class with name "Foo" in namespace "Test\Bar\"
    Then I should see new file at "src/Test/Bar/Foo.php" in project

  @psr4
  Scenario: Create class in PSR-4 with base prefix "Test\"
    When I pick up event on created class with name "Foo" in namespace "Test\Bar\"
    Then I should see new file at "src/Bar/Foo.php" in project

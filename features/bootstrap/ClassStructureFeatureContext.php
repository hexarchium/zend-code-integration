<?php
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;

/**
 * Copyright
 */
class ClassStructureFeatureContext implements \Behat\Behat\Context\Context
{
    /** @var  ClassStructureProjector */
    private $classStructureProjector;

    /**
     * ClassStructureFeatureContext constructor.
     *
     * @param ClassStructureProjector $classStructureProjector
     */
    public function __construct(ClassStructureProjector $classStructureProjector)
    {
        $this->classStructureProjector = $classStructureProjector;
    }

    /**
     * @When I pick up event on created class with name :name in namespace :namespace
     */
    public function iPickUpEventOnCreatedClassWithNameInNamespace(string $name, string $namespace)
    {
        $this->classStructureProjector->onClassCreated(
            new \Helpers\Events\ClassStructureAdded(
                ['name' => $name, 'namespace' => $namespace]
            )
        );
    }
}

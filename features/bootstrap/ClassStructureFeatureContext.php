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
     * @When I pick up event on created class with name :arg1 in namespace :arg2
     */
    public function iPickUpEventOnCreatedClassWithNameInNamespace($arg1, $arg2)
    {
        $this->classStructureProjector->onClassCreated(
            new \Helpers\Events\ClassStructureAdded(
                ['name' => $arg1, 'namespace' => $arg2]
            )
        );
    }
}

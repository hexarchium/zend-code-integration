<?php
use Behat\Behat\Tester\Exception\PendingException;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;

/**
 * Copyright
 */
class FeatureContext implements \Behat\Behat\Context\Context
{
    /** @var  ClassStructureProjector */
    private $classStructureProjector;

    /**
     * FeatureContext constructor.
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
        throw new PendingException();
    }

    /**
     * @Then I should see new file at :arg1 in project
     */
    public function iShouldSeeNewFileAtInProject($arg1)
    {
        throw new PendingException();
    }
}

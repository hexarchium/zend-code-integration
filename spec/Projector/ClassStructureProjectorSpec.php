<?php

namespace spec\Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\CodeDomain\Model\ClassStructure\Events\ClassStructureAdded;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;
use PhpSpec\ObjectBehavior;

class ClassStructureProjectorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ClassStructureProjector::class);
    }

    function it_should_handle_class_created_domain_event(ClassStructureAdded $classStructureAdded)
    {
        $this->onClassCreated($classStructureAdded)->shouldReturn(null);
    }
}

<?php

namespace spec\Hexarchium\ZendCodeIntegration\Factory;

use Hexarchium\ZendCodeIntegration\Factory\ClassStructureProjectorFactory;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;
use PhpSpec\ObjectBehavior;

class ClassStructureProjectorFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ClassStructureProjectorFactory::class);
    }

    function it_should_factory_class_structure_projector(ProjectSourceLocationStrategy $projectSourceLocationStrategy)
    {
        $this->factory($projectSourceLocationStrategy)
            ->shouldReturnAnInstanceOf(
                ClassStructureProjector::class
            );
    }

}

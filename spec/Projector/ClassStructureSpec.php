<?php

namespace spec\Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\ZendCodeIntegration\Projector\ClassStructure;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClassStructureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ClassStructure::class);
    }
}

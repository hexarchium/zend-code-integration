<?php

namespace spec\Hexarchium\ZendCodeIntegration\Domain\CodeDomain\Repository;

use Hexarchium\CodeDomain\Model\ClassStructure\Repository\ClassStructureRepositoryInterface;
use Hexarchium\ZendCodeIntegration\Domain\CodeDomain\Repository\ClassStructureRepository;
use PhpSpec\ObjectBehavior;

class ClassStructureRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ClassStructureRepository::class);
        $this->shouldBeAnInstanceOf(ClassStructureRepositoryInterface::class);
    }
}

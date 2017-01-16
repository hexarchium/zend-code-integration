<?php

namespace spec\Hexarchium\ZendCodeIntegration\File;

use Hexarchium\ZendCodeIntegration\File\AutoloadStrategyInterface;
use Hexarchium\ZendCodeIntegration\File\Psr4AutoloadStrategy;
use PhpSpec\ObjectBehavior;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;

class Psr4AutoloadStrategySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Foo\\Bar\\');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Psr4AutoloadStrategy::class);
        $this->shouldBeAnInstanceOf(AutoloadStrategyInterface::class);
    }

    function it_should_calculate_file_position(FileGenerator $fileGenerator)
    {
        $class = new ClassGenerator('Test');
        $class->setNamespaceName('Foo\\Bar\\');
        $fileGenerator->getClass()->willReturn($class);

        $this->calculatePosition($fileGenerator)->shouldReturn('Test.php');
    }
}

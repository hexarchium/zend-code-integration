<?php

namespace spec\Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\ZendCodeIntegration\Events\ClassStructureAddedInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Zend\Code\Generator\FileGenerator;

class ClassStructureProjectorSpec extends ObjectBehavior
{
    function let(ProjectSourceLocationStrategy $projectSourceLocationStrategy)
    {
        $this->beConstructedWith($projectSourceLocationStrategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ClassStructureProjector::class);
    }

    function it_should_handle_class_created_domain_event(
        ProjectSourceLocationStrategy $projectSourceLocationStrategy,
        ClassStructureAddedInterface $classStructureAdded
    ) {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR;

        mkdir($dir . 'src/Foo/', 0777, true);

        /** @var FileGenerator $fileGenerator */
        $fileGenerator = Argument::type(FileGenerator::class);
        $projectSourceLocationStrategy
            ->getSourcePath($fileGenerator)
            ->willReturn(
                $dir . 'src/Foo/Bar.php'
            );
        $this->beConstructedWith($projectSourceLocationStrategy);

        $classStructureAdded->getName()->shouldBeCalled();
        $classStructureAdded->getNamespace()->shouldBeCalled();

        $this->onClassCreated($classStructureAdded)->shouldReturn(null);
        unlink($dir . 'src/Foo/Bar.php');
    }
}

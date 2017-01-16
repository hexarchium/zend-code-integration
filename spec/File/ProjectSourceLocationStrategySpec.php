<?php

namespace spec\Hexarchium\ZendCodeIntegration\File;

use Hexarchium\ZendCodeIntegration\File\AutoloadStrategyInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Zend\Code\Generator\FileGenerator;

class ProjectSourceLocationStrategySpec extends ObjectBehavior
{
    function let(AutoloadStrategyInterface $autoloadStrategy)
    {
        /** @var FileGenerator $fileGenerator */
        $fileGenerator = Argument::type(FileGenerator::class);
        $autoloadStrategy->calculatePosition($fileGenerator)->willReturn('Test.php');

        $this->beConstructedWith('', $autoloadStrategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectSourceLocationStrategy::class);
    }

    function it_should_have_source_path(FileGenerator $fileGenerator)
    {
        $this->getSourcePath($fileGenerator)->shouldReturn('src/Test.php');
    }
}

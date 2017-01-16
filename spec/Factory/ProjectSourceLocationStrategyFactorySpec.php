<?php

namespace spec\Hexarchium\ZendCodeIntegration\Factory;

use Hexarchium\ZendCodeIntegration\Factory\ProjectSourceLocationStrategyFactory;
use Hexarchium\ZendCodeIntegration\File\AutoloadStrategyInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use PhpSpec\ObjectBehavior;

class ProjectSourceLocationStrategyFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProjectSourceLocationStrategyFactory::class);
    }

    function it_should_factory_source_location_strategy(AutoloadStrategyInterface $autoloadStrategy)
    {
        $this->factory('/test', $autoloadStrategy)->shouldBeAnInstanceOf(ProjectSourceLocationStrategy::class);
    }
}

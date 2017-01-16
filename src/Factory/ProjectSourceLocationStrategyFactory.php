<?php

namespace Hexarchium\ZendCodeIntegration\Factory;

use Hexarchium\ZendCodeIntegration\File\AutoloadStrategyInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;

class ProjectSourceLocationStrategyFactory
{
    public function factory($sourcePath, AutoloadStrategyInterface $autoloadStrategy)
    {
        return new ProjectSourceLocationStrategy($sourcePath, $autoloadStrategy);
    }
}

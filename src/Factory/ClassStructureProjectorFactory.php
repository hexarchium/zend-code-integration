<?php

namespace Hexarchium\ZendCodeIntegration\Factory;

use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;

class ClassStructureProjectorFactory
{
    public function factory(ProjectSourceLocationStrategy $projectSourceLocationStrategy)
    {
        return new ClassStructureProjector($projectSourceLocationStrategy);
    }
}

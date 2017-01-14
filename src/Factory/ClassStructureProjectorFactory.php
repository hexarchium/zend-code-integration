<?php

namespace Hexarchium\ZendCodeIntegration\Factory;

use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;

class ClassStructureProjectorFactory
{

    public function factory()
    {
        return new ClassStructureProjector();
    }
}

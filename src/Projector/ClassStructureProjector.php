<?php

namespace Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\CodeDomain\Model\ClassStructure\Events\ClassStructureAdded;
use Zend\Code\Generator\ClassGenerator;

class ClassStructureProjector
{
    public function onClassCreated(ClassStructureAdded $classStructureAdded)
    {
        $class = new ClassGenerator();
    }
}

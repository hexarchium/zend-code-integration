<?php

namespace Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\CodeDomain\Model\ClassStructure\Events\ClassStructureAdded;
use Zend\Code\Generator\ClassGenerator;

class ClassStructureProjector
{
    public function onClassCreated(ClassStructureAdded $classStructureAdded)
    {
        $name = $classStructureAdded->getPayload()['name'];
        $namespaceName = $classStructureAdded->getPayload()['namespace'];


        $class = new ClassGenerator();
        $class->setName($name)
            ->setNamespaceName($namespaceName);

        $class->generate();

    }
}

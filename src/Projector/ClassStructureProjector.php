<?php

namespace Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\CodeDomain\Model\ClassStructure\Events\ClassStructureAdded;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;

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

        $file = new FileGenerator();
        $file->setClass($class);
    }
}

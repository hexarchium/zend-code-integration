<?php
namespace Hexarchium\ZendCodeIntegration\Projector;

use Hexarchium\ZendCodeIntegration\Events\ClassStructureAddedInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;

class ClassStructureProjector
{
    /**
     * @var ProjectSourceLocationStrategy
     */
    private $projectSourceLocationStrategy;

    public function __construct(ProjectSourceLocationStrategy $projectSourceLocationStrategy)
    {
        $this->projectSourceLocationStrategy = $projectSourceLocationStrategy;
    }

    public function onClassCreated(ClassStructureAddedInterface $classStructureAdded)
    {
        $name = $classStructureAdded->getName();
        $namespaceName = $classStructureAdded->getNamespace();

        $class = new ClassGenerator();
        $class->setName($name)
            ->setNamespaceName($namespaceName);

        $class->generate();

        $file = new FileGenerator();
        $file->setClass($class);

        $sourcePath = $this->projectSourceLocationStrategy->getSourcePath($file);

        @mkdir(dirname($sourcePath), 0777, true);
        file_put_contents($sourcePath, $file->generate());
    }
}

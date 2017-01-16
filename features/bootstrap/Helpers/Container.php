<?php
/**
 * Copyright
 */
namespace Helpers;

use Hexarchium\ZendCodeIntegration\Factory\ClassStructureProjectorFactory;
use Hexarchium\ZendCodeIntegration\Factory\ProjectSourceLocationStrategyFactory;
use Hexarchium\ZendCodeIntegration\File\AutoloadStrategyInterface;
use Hexarchium\ZendCodeIntegration\File\ProjectSourceLocationStrategy;
use Hexarchium\ZendCodeIntegration\File\Psr0AutoloadStrategy;
use Hexarchium\ZendCodeIntegration\File\Psr4AutoloadStrategy;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;
use Interop\Container\ContainerInterface;

class Container extends \ArrayObject implements ContainerInterface
{
    const BASE_PATH = 'base_path';

    static public function factory()
    {
        $container = new self();

        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR;
        mkdir($dir . 'src/', 0777, true);

        $container->offsetSet(self::BASE_PATH, $dir);

        $container->initializeAutoloadStrategy();
        $container->initializeFactory();
        $container->initializeServices();
        $container->initializeProjector();

        return $container;
    }

    private function initializeAutoloadStrategy()
    {
        $this->offsetSet(
            Psr0AutoloadStrategy::class,
            new Psr0AutoloadStrategy()
        );

        $this->offsetSet(
            Psr4AutoloadStrategy::class,
            new Psr4AutoloadStrategy('Foo\\Bar\\')
        );

        $this->offsetSet(
            AutoloadStrategyInterface::class,
            $this->get(Psr0AutoloadStrategy::class)
        );
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new \Exception(sprintf("Given service '%s' don't exist", $id));
        }

        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    public function initializeFactory()
    {
        $this->offsetSet(
            ClassStructureProjectorFactory::class,
            new ClassStructureProjectorFactory()
        );

        $this->offsetSet(
            ProjectSourceLocationStrategyFactory::class,
            new ProjectSourceLocationStrategyFactory()
        );
    }

    private function initializeServices()
    {
        $this->offsetSet(
            ProjectSourceLocationStrategy::class,
            $this->get(ProjectSourceLocationStrategyFactory::class)->factory(
                $this->get(self::BASE_PATH),
                $this->get(AutoloadStrategyInterface::class)
            )
        );
    }

    public function initializeProjector()
    {
        $this->offsetSet(
            ClassStructureProjector::class,
            $this->get(ClassStructureProjectorFactory::class)->factory(
                $this->get(ProjectSourceLocationStrategy::class)
            )
        );
    }
}

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
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;

class ContainerPSR0Factory
{
    const BASE_PATH = 'base_path';

    public function factory(): Container
    {
        $container = new Container();

        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR;
        mkdir($dir . 'src/', 0777, true);

        ContainerPSR0Factory::initializeAutoloadStrategy($container);
        ContainerPSR0Factory::initializeFactory($container);
        ContainerPSR0Factory::initializeServices($container, $dir);
        ContainerPSR0Factory::initializeProjector($container);

        return $container;
    }

    static private function initializeAutoloadStrategy(Container $container)
    {
        $container->set(
            AutoloadStrategyInterface::class,
            new Psr0AutoloadStrategy()
        );
    }

    static private function initializeFactory(Container $container)
    {
        $container->offsetSet(
            ClassStructureProjectorFactory::class,
            new ClassStructureProjectorFactory()
        );

        $container->offsetSet(
            ProjectSourceLocationStrategyFactory::class,
            new ProjectSourceLocationStrategyFactory()
        );
    }

    static private function initializeServices(Container $container, $path)
    {
        $container->offsetSet(
            ProjectSourceLocationStrategy::class,
            $container->get(ProjectSourceLocationStrategyFactory::class)->factory(
                $path,
                $container->get(AutoloadStrategyInterface::class)
            )
        );
    }

    static private function initializeProjector(Container $container)
    {
        $container->offsetSet(
            ClassStructureProjector::class,
            $container->get(ClassStructureProjectorFactory::class)->factory(
                $container->get(ProjectSourceLocationStrategy::class)
            )
        );
    }
}

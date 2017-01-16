<?php
/**
 * Copyright
 */
namespace Helpers;

use Hexarchium\ZendCodeIntegration\Factory\ClassStructureProjectorFactory;
use Hexarchium\ZendCodeIntegration\Projector\ClassStructureProjector;
use Interop\Container\ContainerInterface;

class Container extends \ArrayObject implements ContainerInterface
{
    static public function factory()
    {
        $container = new self();

        $container->initializeFactory();
        $container->initializeProjector();

        return $container;
    }

    public function initializeFactory()
    {
        $this->offsetSet(
            ClassStructureProjectorFactory::class,
            new ClassStructureProjectorFactory()
        );
    }

    public function initializeProjector()
    {
        $this->offsetSet(
            ClassStructureProjector::class,
            $this->get(ClassStructureProjectorFactory::class)->factory()
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
}

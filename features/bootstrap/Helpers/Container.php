<?php
/**
 * Copyright
 */
namespace Helpers;

use Interop\Container\ContainerInterface;

class Container extends \ArrayObject implements ContainerInterface
{
    /**
     * AbstractContainer constructor.
     */
    public function __construct()
    {
        $this->offsetSet(Container::class, $this);
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

    public function set(string $key, $value)
    {
        if ($this->has($key)) {
            throw new \Exception(sprintf("Given service '%s' exist", $key));
        }
        $this->offsetSet($key, $value);
    }
}
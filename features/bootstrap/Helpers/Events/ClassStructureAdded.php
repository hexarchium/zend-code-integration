<?php
/**
 * Copyright
 */
namespace Helpers\Events;


use Hexarchium\ZendCodeIntegration\Events\ClassStructureAddedInterface;

class ClassStructureAdded extends \ArrayObject implements ClassStructureAddedInterface
{
    public function getName(): string
    {
        return $this->offsetGet('name');
    }

    public function getNamespace(): string
    {
        return $this->offsetGet('namespace');
    }
}

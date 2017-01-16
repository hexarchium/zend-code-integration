<?php
/**
 * Copyright
 */
namespace Hexarchium\ZendCodeIntegration\Events;


interface ClassStructureAddedInterface
{
    public function getName(): string;

    public function getNamespace(): string;
}
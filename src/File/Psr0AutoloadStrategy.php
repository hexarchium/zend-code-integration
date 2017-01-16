<?php

namespace Hexarchium\ZendCodeIntegration\File;

use Zend\Code\Generator\FileGenerator;

class Psr0AutoloadStrategy implements AutoloadStrategyInterface
{
    public function calculatePosition(FileGenerator $fileGenerator): string
    {
        $classGenerator = $fileGenerator->getClass();
        $fullname = $classGenerator->getNamespaceName() . $classGenerator->getName();

        $path = str_replace('\\', '/', $fullname) . '.php';

        return substr($path, 0, 1) == '/' ? substr($path, 1, -1) : $path;
    }
}

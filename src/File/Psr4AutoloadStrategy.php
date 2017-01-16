<?php

namespace Hexarchium\ZendCodeIntegration\File;

use Zend\Code\Generator\FileGenerator;

class Psr4AutoloadStrategy implements AutoloadStrategyInterface
{
    /** @var  string */
    private $namespacePrefix;

    /**
     * Psr4AutoloadStrategy constructor.
     *
     * @param string $namespacePrefix
     */
    public function __construct($namespacePrefix)
    {
        $this->namespacePrefix = $namespacePrefix;
    }

    public function calculatePosition(FileGenerator $fileGenerator): string
    {
        $classGenerator = $fileGenerator->getClass();
        $fullname = $classGenerator->getNamespaceName() . $classGenerator->getName();

        $fullname = str_replace($this->namespacePrefix, '\\', $fullname);

        $path = str_replace('\\', '/', $fullname) . '.php';

        return substr($path, 0, 1) == '/' ? $path : '/' . $path;
    }
}

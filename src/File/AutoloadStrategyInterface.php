<?php
/**
 * Copyright
 */
namespace Hexarchium\ZendCodeIntegration\File;

use Zend\Code\Generator\FileGenerator;

interface AutoloadStrategyInterface
{
    public function calculatePosition(FileGenerator $fileGenerator): string;
}
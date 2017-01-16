<?php
namespace Hexarchium\ZendCodeIntegration\File;

use Zend\Code\Generator\FileGenerator;

class ProjectSourceLocationStrategy
{
    /** @var  string */
    private $sourcePath;

    /** @var  AutoloadStrategyInterface */
    private $autoloadStrategy;

    /**
     * ProjectSourceLocationStrategy constructor.
     *
     * @param string $sourcePath
     * @param AutoloadStrategyInterface $autoloadStrategy
     */
    public function __construct($sourcePath, AutoloadStrategyInterface $autoloadStrategy)
    {
        $this->sourcePath = $sourcePath;
        $this->autoloadStrategy = $autoloadStrategy;
    }

    public function getSourcePath(FileGenerator $fileGenerator): string
    {
        return $this->sourcePath . '/src' . $this->autoloadStrategy->calculatePosition($fileGenerator);
    }
}

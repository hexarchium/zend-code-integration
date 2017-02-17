<?php
use Helpers\Container;

/**
 * Copyright
 */
class ProjectFeatureContext implements \Behat\Behat\Context\Context
{
    /** @var  string */
    private $workingDir;

    /** @var  Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Cleans test folders in the temporary directory.
     *
     * @BeforeSuite
     * @AfterSuite
     */
    public static function cleanTestFolders()
    {
        if (is_dir($dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat')) {
            self::clearDirectory($dir);
        }
    }

    private static function clearDirectory($path)
    {
        $files = scandir($path);
        array_shift($files);
        array_shift($files);

        foreach ($files as $file) {
            $file = $path . DIRECTORY_SEPARATOR . $file;
            if (is_dir($file)) {
                self::clearDirectory($file);
            } else {
                unlink($file);
            }
        }
        rmdir($path);
    }

    /**
     * @Then I should see new file at :path in project
     */
    public function iShouldSeeNewFileAtInProject($path)
    {
        if (!file_exists($this->workingDir . $path)) {
            throw new \Exception("File not exists in: " . $this->workingDir . $path);
        }
    }

    /**
     * Prepares test folders in the temporary directory.
     *
     * @BeforeScenario
     */
    public function prepareTestFolders()
    {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR;
        @mkdir($dir . 'src/', 0777, true);

        $this->workingDir = $dir;
    }
}
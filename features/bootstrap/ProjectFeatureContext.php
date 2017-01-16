<?php

/**
 * Copyright
 */
class ProjectFeatureContext implements \Behat\Behat\Context\Context
{
    /** @var  string */
    private $workingDir;

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
     * @Given I have base project with psr-0
     */
    public function iHaveBaseProjectWithPsr()
    {
    }

    /**
     * @Then I should see new file at :arg1 in project
     * @param $arg1
     */
    public function iShouldSeeNewFileAtInProject($arg1)
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * Prepares test folders in the temporary directory.
     *
     * @BeforeScenario
     */
    public function prepareTestFolders()
    {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR;
        mkdir($dir . '/src', 0777, true);

        $this->workingDir = $dir;
    }
}
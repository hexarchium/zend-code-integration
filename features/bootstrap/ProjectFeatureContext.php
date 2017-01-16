<?php
use Symfony\Component\Process\Process;

/**
 * Copyright
 */
class ProjectFeatureContext implements \Behat\Behat\Context\Context
{
    /** @var  string */
    private $workingDir;

    /** @var Process */
    private $process;

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
     * @Given I have base project :arg1 with psr-0
     */
    public function iHaveBaseProjectWithPsr($arg1)
    {
        $folder = str_replace('\\', '/', $arg1);
        mkdir($this->workingDir . '/src/' . $folder, 0777, true);
    }

    /**
     * Prepares test folders in the temporary directory.
     *
     * @BeforeScenario
     */
    public function prepareTestFolders()
    {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'behat' . DIRECTORY_SEPARATOR .
            md5(microtime() . rand(0, 10000));

        mkdir($dir . '/src', 0777, true);

        $this->workingDir = $dir;
        $this->process = new Process(null);
        $this->process->setTimeout(20);
    }
}
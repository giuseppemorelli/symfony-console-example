<?php

namespace GM\Console;

use GM\Console\System\Helper;
use Symfony\Component\Console\Application as SymfonyConsoleApplication;
use GM\Console\ApplicationContainer;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class ConsoleApplication extends SymfonyConsoleApplication
{
    private $app;

    public function getApp()
    {
        return $this->app;
    }

    public function __construct(ApplicationContainer $app)
    {
        $this->app = $app;

        parent::__construct($this->app->getDescription(), $this->app->getVersion());

        if(Helper::checkFileExists($this->app['parameters']['config.file.path'])) {
            $this->addCommands($app['commands']);

        } else {
            throw new FileNotFoundException("Config file config.yaml not found!");
        }
    }
}

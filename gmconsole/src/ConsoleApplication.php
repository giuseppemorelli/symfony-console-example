<?php

namespace GM\Console;

use GM\Console\System\Helper;
use Symfony\Component\Console\Application as SymfonyConsoleApplication;

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

        $this->addCommands($app['commands']);
    }
}

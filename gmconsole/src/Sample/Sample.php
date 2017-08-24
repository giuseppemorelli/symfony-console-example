<?php
namespace GM\Console\Sample;

class Sample
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function sayHello()
    {
        $config = $this->app['config'];
        return $config->getConfigData('settings/string');
    }
}
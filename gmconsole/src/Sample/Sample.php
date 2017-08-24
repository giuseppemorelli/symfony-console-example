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
        return $this->app['parameters']['config.file']['app']['string'];
    }
}
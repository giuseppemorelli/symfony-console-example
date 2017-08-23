<?php
namespace GM\Console\Sample;

class Sample
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function sayHello()
    {
        return $this->config['app']['string'];
    }
}
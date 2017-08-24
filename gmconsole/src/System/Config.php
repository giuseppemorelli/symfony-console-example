<?php
namespace GM\Console\System;

class Config
{
    private $app;
    private $env;
    private $conf;

    public function __construct($app)
    {
        $this->app = $app;
        $this->env = $app['env'];
        $this->conf = $app['parameters']['config.file'];
    }

    public function getConfigData($path)
    {
        $path = explode('/', $path);

        foreach($this->conf as $config)
        {
            if($config['app']['environment'] == $this->env)
            {

                die;
            }
            continue;
        }
    }
}
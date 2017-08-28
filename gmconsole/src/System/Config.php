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

    public function getConfigData($origin_path)
    {
        $tree = null;
        $count = null;
        $env = $this->env;
        $path = explode('/', $origin_path);
        $path_count = count($path);

        foreach($this->conf as $config)
        {
            if($config['environment'] == $env)
            {
                $count = 0;
                $tree = $config;

                foreach($path as $node)
                {
                    if(isset($tree[$node]))
                    {
                        $tree = $tree[$node];
                        $count++;
                    }
                }
            }
        }

        if($count == $path_count){
            return $tree;
        }
        else {
            throw new \Exception('Config "'.print_r($origin_path, true). '" not found for environment "'.$env.'"');
        }
    }
}
<?php

namespace GM\Console;

use GM\Console\Command\Sample\SampleCommand;
use GM\Console\Sample\Sample;
use Pimple\Container;
use Symfony\Component\Yaml\Yaml;
use GM\Console\System\Helper;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class ApplicationContainer extends Container
{
    const VERSION = '1.0.0';
    const DESCRIPTION = 'Sample Symfony Console Application';

    public function __construct()
    {
        parent::__construct();

        $app = $this;
        $env = __DIR__.'/../config/env.yaml';

        if(!Helper::checkFileExists($env)) {
            throw new FileNotFoundException("Config file env.yaml not found!");
        }

        $env = Yaml::parse(file_get_contents($env));
        $this['env'] = strtolower($env['environment']);

        $this['parameters'] = function($app) {

            $config = __DIR__.'/../config/config.yaml';
            if(!Helper::checkFileExists($config)) {
                throw new FileNotFoundException("Config file config.yaml not found!");
            }

            return array(
                'config.file.path' => $config,
                'config.file'      => Yaml::parse(file_get_contents($config))
            );
        };

        $this['config'] = function($app) {
            return new \GM\Console\System\Config($app);
        };

        $this['sample'] = function($app) {
            return new Sample($app);
        };

        $this['command.sample'] = function() {
            return new SampleCommand();
        };

        $this['commands'] = function($app) {
            return array(
                $app['command.sample']
            );
        };
    }

    public function getDescription()
    {
        return self::DESCRIPTION;
    }

    public function getVersion()
    {
        return self::VERSION;
    }
}
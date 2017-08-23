<?php

namespace GM\Console;

use GM\Console\Command\Sample\SampleCommand;
use GM\Console\Sample\Sample;
use Pimple\Container;
use Symfony\Component\Yaml\Yaml;

class ApplicationContainer extends Container
{
    const VERSION = '1.0.0';
    const DESCRIPTION = 'Sample Symfony Console Application';

    public function __construct()
    {
        parent::__construct();

        $app = $this;

        $this['parameters'] = array(
            'config.file.path' => __DIR__.'/../config/config.yaml',
            'config.file'      => Yaml::parse(file_get_contents(__DIR__.'/../config/config.yaml'))
        );

        $this['sample'] = function($app) {
            return new Sample($app['parameters']['config.file']);
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
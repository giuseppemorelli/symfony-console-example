<?php

$c = new \Pimple\Container();

$c['parameters'] = array(
    'config.file.path' => __DIR__.'/config.yaml',
    'config.file' => \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/config.yaml'))
);

$c['sample'] = function($c) {
    return new \GM\Console\Sample\Sample($c['parameters']['config.file']);
};

$c['command.sample'] = function($c) {
    return new \GM\Console\Command\Sample\SampleCommand($c['sample']);
};

$c['commands'] = function($c) {
    return array(
        $c['command.sample']
    );
};

$c['application'] = function($c) {

    if(\GM\Console\System\Helper::checkFileExists($c['parameters']['config.file.path'])) {
        $application = new \Symfony\Component\Console\Application('Sample Symfony console', '1.0.0');
        $application->addCommands($c['commands']);
        return $application;
    }
    else {
        throw new \Symfony\Component\Filesystem\Exception\FileNotFoundException("Config file config.yaml not found!");
    }
};

return $c;
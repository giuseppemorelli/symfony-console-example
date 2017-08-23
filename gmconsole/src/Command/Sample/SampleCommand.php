<?php

namespace GM\Console\Command\Sample;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use GM\Console\Command\BaseCommand;

class SampleCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('sample:command')
            ->setDescription('Sample symfony console command');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->app['sample']->sayHello());
    }
}
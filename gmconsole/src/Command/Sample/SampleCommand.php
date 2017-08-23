<?php

namespace GM\Console\Command\Sample;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SampleCommand extends Command
{
    protected $sample;

    public function __construct($sample)
    {
        parent::__construct();
        $this->sample = $sample;
    }

    protected function configure()
    {
        $this
            ->setName('sample:command')
            ->setDescription('Sample symfony console command');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->sample->sayHello());
    }
}
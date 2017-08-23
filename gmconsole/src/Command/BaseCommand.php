<?php

namespace GM\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{
    protected $app;

    public function getApp()
    {
        return $this->app;
    }

    protected function initialize(InputInterface $input = null, OutputInterface $output = null)
    {
        $this->app = $this->getApplication()->getApp();
    }
}
<?php

namespace App\Console;

use Sun\Console\Command;
use Sun\Contracts\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Hello extends Command
{
    /**
     * @var string Command name
     */
    protected $name = 'hello:world';

    /**
     * @var string Command description
     */
    protected $description = "Print hello world";

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct();
        $this->app = $app;
    }

    /**
     * To handle console command
     */
    public function handle()
    {
        $this->info('Hello World!');
    }

    protected function getArguments()
    {
        return [

        ];
    }

    protected function getOptions()
    {
        return [

        ];
    }
}
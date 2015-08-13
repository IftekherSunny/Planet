<?php

namespace App\Console;

use Sun\Console\Command;
use Sun\Contracts\Application;

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

    /**
     * Set your command arguments
     *
     * @return array
     */
    protected function getArguments()
    {
        return [

        ];
    }

    /**
     * Set your command options
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}
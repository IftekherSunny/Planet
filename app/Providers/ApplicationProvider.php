<?php

namespace App\Providers;

use Sun\Contracts\Application as App;

class ApplicationProvider
{
    /**
     * @var \Sun\Contracts\Application
     */
    protected $app;

    /**
     * Create a new instance
     *
     * @param \Sun\Contracts\Application $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Bootstrap service
     */
    public function bootstrap()
    {
        //
    }

    /**
     * Register route
     */
    public function registerRoute()
    {
        //
    }
}
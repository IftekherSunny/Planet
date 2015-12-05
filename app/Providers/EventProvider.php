<?php

namespace App\Providers;

use Sun\Contracts\Application as App;

class EventProvider
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
        $this->app->bind('Sun\Contracts\Event\Event', 'Sun\Event\Event');

        $this->app->make('Sun\Contracts\Event\Event')->register();
    }

    /**
     * Register route
     */
    public function registerRoute()
    {
        return [

        ];
    }

    /**
     * Dispatch service
     */
    public function dispatch()
    {
        $this->app->make('Sun\Contracts\Event\Event')->dispatch();
    }

    /**
     * Publish assets
     *
     * @return array
     */
    public function publish()
    {
        return [

        ];
    }
}
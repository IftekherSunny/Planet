<?php

namespace App\Filters;

use Sun\Contracts\Http\Redirect;
use Sun\Contracts\Session\Session;

class Guest
{
    /**
     * @var \Sun\Contracts\Session\Session
     */
    protected $session;

    /**
     * @var \Sun\Contracts\Http\Redirect
     */
    protected $redirect;

    /**
     * To create filter
     *
     * @param Session  $session
     * @param Redirect $redirect
     */
    public function __construct(Session $session, Redirect $redirect)
    {
        $this->session = $session;
        $this->redirect = $redirect;
    }

    /**
     * To handle request
     */
    public function handle()
    {
        if($this->session->has('login')) {
            $this->redirect->to('/home');
        }

        return request();
    }
}
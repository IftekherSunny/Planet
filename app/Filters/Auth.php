<?php 

namespace App\Filters;

use Sun\Http\Redirect;
use Sun\Routing\Filter;
use Sun\Session;

class Auth extends Filter
{
    /**
     * @var Session
     */
    private $session;
    /**
     * @var Redirect
     */
    private $redirect;

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
        if(! $this->session->has('login')) {
            $this->redirect->to('/auth/login');
        }
    }
}
<?php

namespace App\Events;

class UserWasRegistered
{
    public $username;

    /**
     * To create event
     */
    public function __construct($username)
    {
        $this->username = $username;
    }
}
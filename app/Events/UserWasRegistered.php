<?php

namespace App\Events;

class UserWasRegistered
{
    public $username;

    /**
     * To create event
     *
     * @param $username
     */
    public function __construct($username)
    {
        $this->username = $username;
    }
}
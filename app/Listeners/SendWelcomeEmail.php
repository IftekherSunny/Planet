<?php

namespace App\Listeners;

use App\Events\UserWasRegistered;

class SendWelcomeEmail
{
    /**
     * To listen event
     *
     * @param UserWasRegistered $userWasRegistered
     */
    public function listen(UserWasRegistered $userWasRegistered)
    {
        var_dump($userWasRegistered);
    }
}
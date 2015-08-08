<?php

namespace App\Commands;

use App\Models\User;

class UserCommand
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
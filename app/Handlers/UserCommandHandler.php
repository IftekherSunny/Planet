<?php

namespace App\Handlers;

use App\Commands\UserCommand;

class UserCommandHandler
{
    /**
     * To handle command
     *
     * @param UserCommand $command
     *
     * @return mixed
     */
    public function handle(UserCommand $command)
    {
        return $command->user->name;
    }
}
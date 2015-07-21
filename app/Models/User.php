<?php

namespace App\Models;

use Sun\Database\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'temp_password', 'active'];
}
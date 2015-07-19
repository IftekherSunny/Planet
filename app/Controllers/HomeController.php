<?php

namespace App\Controllers;

use Sun\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return "Welcome to Sun Planet";
    }
}

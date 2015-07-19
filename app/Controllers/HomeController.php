<?php

namespace App\Controllers;

use View;

class HomeController extends Controller{

    public function index()
    {
        return View::render('index.php');
    }

    public function about()
    {
        return View::render('about.php');
    }
}
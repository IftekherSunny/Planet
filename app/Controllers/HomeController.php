<?php

namespace App\Controllers;

class HomeController extends Controller
{
    /**
     * To show home page
     *
     * @return mixed
     */
    public function getIndex()
    {
        return view('home');
    }
}
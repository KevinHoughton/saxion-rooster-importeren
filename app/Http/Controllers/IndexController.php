<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function showHomepage()
    {
        return view('homepage');
    }
}

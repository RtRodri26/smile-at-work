<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('welcome'); // o 'landing' si creas una vista llamada landing.blade.php
    }
}
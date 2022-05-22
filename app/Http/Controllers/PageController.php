<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    
class PageController extends Controller
{
    // Home
    public function index()
    {
        return view('home');
    }
}
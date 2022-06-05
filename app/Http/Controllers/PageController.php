<?php

namespace App\Http\Controllers;

use App\Models\{Klinik, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
    
class PageController extends Controller
{
    // Home
    public function index()
    {
        return view('home');
    }

    // Status Akreditasi
    public function status_akreditasi()
    {
        $k = Klinik::find(Auth::user()->id_klinik);
        return view('status_akreditasi', compact('k'));
    }

    // Profile
    public function user_profil()
    {
        $u = User::find(Auth::user()->id);
        $k = Klinik::find(Auth::user()->id_klinik);
        return view('user_profil', compact('u', 'k'));
    }
}
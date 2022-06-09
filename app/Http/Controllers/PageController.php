<?php

namespace App\Http\Controllers;

use App\Models\{Klinik, User, Artikel, Tags_artikel, Kategori_artikel};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
    
class PageController extends Controller
{
    // Home
    public function index()
    {
        return view('home');
    }

    // Event
    public function event()
    {
        return view('event');
    }

    // Kontak
    public function kontak()
    {
        return view('kontak');
    }

    // Karir
    public function karir()
    {
        return view('karir');
    }

    // Blog
    public function blog(Request $request)
    {
        $artikel = Artikel::join('kategori_artikel as ka', 'artikel.id_kategori', '=', 'ka.id')
            ->join('users as u', 'artikel.created_by', '=', 'u.id')
            ->select('artikel.*', 'ka.id as kaid', 'ka.name as nm_kategori', 'ka.slug as ka_slug', 'u.id as uid', 'u.name as nm_user')
            ->orderBy('id','DESC')->paginate(5);
        return view('blog.index', compact('artikel'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function kategori_blog(Request $request, $slug)
    {
        $artikel = Artikel::join('kategori_artikel as ka', 'artikel.id_kategori', '=', 'ka.id')
            ->join('users as u', 'artikel.created_by', '=', 'u.id')
            ->select('artikel.*', 'ka.id as kaid', 'ka.name as nm_kategori', 'ka.slug as ka_slug', 'u.id as uid', 'u.name as nm_user')
            ->where('ka.slug', $slug)
            ->orderBy('id','DESC')->paginate(5);
        return view('blog.index', compact('artikel'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function tags_blog(Request $request, $slug)
    {
        $artikel = Artikel::join('kategori_artikel as ka', 'artikel.id_kategori', '=', 'ka.id')
            ->join('tags_artikel as ta', 'artikel.id_tags', '=', 'ta.id')
            ->join('users as u', 'artikel.created_by', '=', 'u.id')
            ->select('artikel.*', 'ka.id as kaid', 'ka.name as nm_kategori', 'ka.slug as ka_slug', 'ta.name as nm_tags', 'ta.slug as ta_slug', 'u.id as uid', 'u.name as nm_user')
            ->where('ta.slug', $slug)
            ->orderBy('id','DESC')->paginate(5);
        return view('blog.index', compact('artikel'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function blog_show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $tags = Tags_artikel::where('id', explode(",", $artikel->id_tags))->get();
        $kategori = Kategori_artikel::find($artikel->id_kategori);
        $user = User::find($artikel->created_by);
        return view('blog.show', compact('artikel', 'tags', 'kategori', 'user'));
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
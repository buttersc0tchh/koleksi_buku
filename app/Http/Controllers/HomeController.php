<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
// use App\Models\Buku; // Uncomment this when you have the Buku model

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();
        $kategoriCount = Kategori::count();
        // $bukuCount = Buku::count(); // Uncomment this when you have the Buku model

        return view('home', compact('userCount', 'kategoriCount'));
    }
}

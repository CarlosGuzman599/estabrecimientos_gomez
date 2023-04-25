<?php

namespace App\Http\Controllers;
use App\Models\Categorias;
use App\Models\Localidades;
use Illuminate\Http\Request;

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
        $categorias = Categorias::all();
        $localidades = Localidades::all();
        return view('home', compact('categorias','localidades'));
    }
}

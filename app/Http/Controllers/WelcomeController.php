<?php

namespace App\Http\Controllers;

use App\Models\Anuncios;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
        //$this->middleware('auth');
    //}

    /**
     * Show the Welcome dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $anuncio_near = null;
        if(Auth::user()){
            $anuncio_near = Anuncios::where('localidades_id', Auth::user()->localidad_users_id)->get();
        }else{
            $anuncio_near = Anuncios::where('localidades_id', 1)->get();
        }
        return view('welcome', compact('anuncio_near'));
    }
}

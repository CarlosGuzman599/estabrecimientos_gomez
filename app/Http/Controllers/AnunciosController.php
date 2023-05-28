<?php

namespace App\Http\Controllers;

use App\Models\Tiempos;
use App\Models\Anuncios;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAnunciosRequest;
use App\Http\Requests\UpdateAnunciosRequest;
use Symfony\Component\HttpFoundation\Request;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anuncio_establecimiento_create($id)
    {
        $tiempos = Tiempos::all();
        $establecimiento = Establecimiento::find($id);
        return view('anuncios.anuncio_establecimiento_create', compact('tiempos', 'establecimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnunciosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->establecimientos_id){
            $request->validate([
                'titulo' => 'required|max:50',
                'img' => 'nullable|image|max:2048',
                'descripcion' => 'required|max:255',
                'tiempos_id' => 'required',
            ]);


            if(isset($request['img'])){
                $url_img = $request->file('img')->store('public/anuncios');
                $url = Storage::url($url_img);
                DB::table('anuncios')->insert([
                    'establecimientos_id' => $request['establecimientos_id'],
                    'users_id' => $request['users_id'],
                    'titulo' => $request['titulo'],
                    'img' => $url,
                    'descripcion' => $request['descripcion'],
                    'tiempos_id' => $request['tiempos_id'],
                ]); 
            }else{
                Anuncios::create($request->all());
            }

            return $request;

        }else{
            return 'usuario'; 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncios $anuncios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncios $anuncios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnunciosRequest  $request
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnunciosRequest $request, Anuncios $anuncios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncios $anuncios)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Exception;

use Carbon\Carbon;
use App\Models\Categorias;
use App\Models\Localidades;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        $localidades = Localidades::all();
        return view('establecimientos.index', compact('categorias','localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $categorias = Categorias::all();
        $localidades = Localidades::all();
        return view('establecimientos.create', compact('categorias','localidades'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //return $request->all();

        $request->validate([
            'nombre' => 'required|max:50|unique:establecimientos,nombre',
            'users_id' => 'required',
            'categorias_id' => 'required',
            'localidades_id' => 'required',
            'logo' => 'nullable|image|max:2048',
            'delivery' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|size:10',
            'descripcion' => 'required|max:255',
            'horario' => 'required',
        ]);

        if ( isset($request['logo']) ){
            $url_logo = $request->file('logo')->store('public/logos');
            $url = Storage::url($url_logo);

            DB::table('establecimientos')->insert([
                'nombre' => $request['nombre'],
                'users_id' => $request['users_id'],
                'categorias_id' => $request['categorias_id'],
                'localidades_id' => $request['localidades_id'],
                'logo' => $url,
                'delivery' => $request['delivery'],
                'direccion' => $request['direccion'],
                'colonia' => $request['colonia'],
                'lat' => $request['lat'],
                'lng' => $request['lng'],
                'telefono' => $request['telefono'],
                'descripcion' => $request['descripcion'],
                'horario' => $request['horario'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]); 
        }else{
            Establecimiento::create($request->all());
        }
        return redirect()->route('home');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        return "Desde Edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }
}

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            @foreach ($anuncio_near as $anuncio)
            

                <div class="contenedor-anuncio col-md-5 col-lg-3">
                    <p class="encabezado-anuncio fm-releway-extra-bold fs-3 p-2 m-1">{{$anuncio->titulo}}</p>

                    @if ($anuncio->img == null)
                        <img class="img-anuncio" src="/storage/anuncios/default.png">
                    @else
                        <img class="img-anuncio" src="{{$anuncio->img}}" alt="/storage/anuncios/default.png">
                    @endif

                    <div class="info-container">
                        <p class="m-0 fm-releway">
                            <i class="fas fa-map-marker-alt mx-4 fs-1"></i>
                            {{$anuncio->localidad['nombre']}}
                            @guest
                                <i class="fab fa-whatsapp color-red mx-2 fs-2 mt-2"></i>
                            @else
                                <i class="fab fa-whatsapp color-green mx-2 fs-2 mt-2"></i>
                            @endguest
                        </p>
                        <p class="m-0 fm-releway"> <i class="fas fa-store mx-4 fs-1"></i>{{$anuncio->establecimiento['nombre']}}</p>
                    </div>
                </div>

            @endforeach

        </div>
        
    </div>
    
@endsection


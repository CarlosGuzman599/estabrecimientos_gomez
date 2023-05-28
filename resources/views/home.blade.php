@extends('layouts.app')

@section('scripts')
  <script src="{{ asset('js/establecimientos_index.js') }}" defer></script>
@endsection

@section('content')
  <div class="container">

    <fieldset class="border p-4 mt-5">
      <legend class="text-primary px-2 color-ranita bold fm-releway">Mis Negocios</legend>

      <div class="mt-2 row justify-content-end container">
        <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('establecimiento.create') }}">Agregar nuevo</a>
      </div>
  
      <div class="container-bussines border p-4 mt-2 shadow-lg">
  
        @foreach ($establecimientos_owner as $eo)
          <div class="bussine-container m-1 row" id="container-{{$eo->id}}">
            <div class="col-3 p-0 m-0">
              @if ($eo->logo == null)
                <img class="bussine-img" src="./img/logos/{{$eo->categorias_id}}.png">
              @else
                <img class="bussine-img" src="{{$eo->logo}}" alt="./img/default.png">
              @endif
            </div>
            <div class="col-5 p-0 m-0 text-center">
              <p class="bussine-name text-capitalize">{{$eo->nombre}}</p>
              <p class="bussine-detail">{{$eo->localidad['nombre']}} · <span class="text-capitalize">{{$eo->categoria['nombre']}}</span></p>
            </div>
            
            <div class="col-4 row ml-1" name="{{$eo->nombre}}" id="{{$eo->id}}">
              <a href="{{ route('establecimiento.show', $eo->id) }}" class="btn-function no-hover"><i class="fas fa-tags"></i></i></a>
              <a href="{{ route('establecimiento.edit', $eo->id) }}" class="btn-function no-hover"><i class="far fa-edit"></i></a>
              <i class="btn-function far fa-trash-alt"></i>
            </div>
            
          </div>
        @endforeach
  
      </div> 
    </fieldset>

  </div>
@endsection



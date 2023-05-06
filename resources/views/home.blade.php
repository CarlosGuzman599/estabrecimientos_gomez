@extends('layouts.app')

@section('scripts')
  <script src="{{ asset('js/establecimientos_index.js') }}" defer></script>
@endsection

@section('content')
  <div class="container">
    <h4 class="text-center mt-4 fm-raleway">Mis Negocios</h4>

    <div class="mt-2 row justify-content-end container">
      <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('establecimiento.create') }}">Agregar nuevo</a>
    </div>

    <div class="container-bussines border p-4 mt-2 shadow-lg">

      @foreach ($establecimientos_owner as $eo)
        <div class="bussine-container m-1 row" id="container-{{$eo->id}}">
          <div class="col-3 p-0 m-0">
            
            @if ($eo->logo == null)
            <img class="bussine-img" src="./img/default.png">
            @else
              <img class="bussine-img" src="{{$eo->logo}}" alt="./img/default.png">
            @endif
          </div>
          <div class="col-5 p-0 m-0 text-center">
            <p class="bussine-name">{{$eo->nombre}}</p>
            <p class="bussine-detail">{{$eo->localidad['nombre']}} · <span class="text-capitalize">{{$eo->categoria['nombre']}}</span></p>
          </div>
          
          <div class="col-4 row ml-1" name="{{$eo->nombre}}" id="{{$eo->id}}">
            <i class="btn-function far fa-eye"></i>
            <a class="btn-function no-hover" href="{{ route('establecimiento.edit', $eo->id) }}"><i class="far fa-edit"></i></a>
            <i class="btn-function far fa-trash-alt"></i>
          </div>
          
        </div>
      @endforeach

    </div> 
  </div>
@endsection



@extends('layouts.app')

@section('scripts')
  <script src="{{ asset('js/establecimientos_index.js') }}" defer></script>
@endsection

@section('content')
  <div class="container">

    <fieldset class="border p-4 mt-5">

      <legend class="text-primary px-2 color-ranita bold fm-releway">Mis Establecimientos</legend>

      <div class="mt-2 row justify-content-end container">
        <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('establecimiento.create') }}">Agregar nuevo</a>
      </div>

      <br>

      @foreach ($establecimientos_owner as $eo)

        <div class="bussine-container m-3 row shadow" id="container-{{$eo->id}}">

          <div class="col-3 p-0 m-0 d-flex p-1">
            @if ($eo->logo == null)
              <img class="bussine-img rounded shadow" src="/storage/logos/default/{{$eo->categorias_id}}.png">
            @else
              <img class="bussine-img rounded shadow" src="{{$eo->logo}}" alt="/storage/logos/default/{{$eo->categorias_id}}.png">
            @endif
          </div>

          <div class="col-5 p-0 m-0 text-center">
            <p class="bussine-name text-capitalize">{{$eo->nombre}}</p>
            <p class="bussine-detail">{{$eo->localidad['nombre']}} · <span class="text-capitalize">{{$eo->categoria['nombre']}}</span> </p>
          </div>

          <div class="col-4 row ml-1" name="{{$eo->nombre}}" id="{{$eo->id}}">
            <a href="{{ route('establecimiento.show', $eo->id) }}" class="btn-function no-hover"><img class="btn-function" src="/storage/icons/tags.png"></a>
            <a href="{{ route('establecimiento.edit', $eo->id) }}" class="btn-function no-hover"><img class="btn-function" src="/storage/icons/edit.png"></a>
            <img class="btn-function delete-establecimiento" src="/storage/icons/delete.png">
          </div>

        </div>

      @endforeach
  
    </fieldset>

  </div>

@endsection
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg=" crossorigin="anonymous" />

@endsection

@section('content')
  <div class="container">
    <div class="text-center align-content-center">
      @if ($establecimiento->logo == null)
        <img class="img-show bussine-img mb-3" src="/img/logos/{{$establecimiento->categorias_id}}.png">
      @else
        <img class="img-show bussine-img mb-3" src="{{$establecimiento->logo}}" alt="/img/default.png">
      @endif
      <h3 class="text-capitalize">{{$establecimiento->nombre}}</h4>
    </div>
  
    <fieldset class="border p-4 mt-5">
      <legend class="text-primary px-2 color-ranita bold fm-releway">Mis anuncios</legend>

      <a class="btn-personal btn-primery-personal shadow-lg" href="{{ route('anuncio_establecimiento.create', $establecimiento->id) }}">Agregar nuevo</a>
    </fieldset>
  </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>

  <script src="https://unpkg.com/esri-leaflet" defer></script>
  <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous" defer></script>
@endsection


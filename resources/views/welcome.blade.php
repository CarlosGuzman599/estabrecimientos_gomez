@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center" id="contenedor-anuncios">

            @foreach ($anuncio_near as $anuncio)
            
                <div class="contenedor-anuncio col-11 col-md-5 col-lg-3">
                    <p class="encabezado-anuncio fm-releway-extra-bold fs-3 p-2 m-1">{{$anuncio->titulo}}</p>

                    @if ($anuncio->establecimiento['delivery'] == 1)
                        <i class="fas fa-shipping-fast delivery-anuncio fs-3"></i>
                    @endif

                    @if ($anuncio->img == null)
                        <img class="img-anuncio" src="/storage/anuncios/default.png" data-toggle="modal" data-target="#anuncioInformation" id="{{$anuncio->id}}">
                    @else
                        <img class="img-anuncio" src="{{$anuncio->img}}" alt="/storage/anuncios/default.png" data-toggle="modal" data-target="#anuncioInformation" id="{{$anuncio->id}}">
                    @endif

                    <div class="info-container">
                        <p class="m-0 fm-releway"> <i class="fas fa-store mx-4 fs-1 color-grey"></i>{{$anuncio->establecimiento['nombre']}}</p>
                        <p class="m-0 fm-releway">
                            <i class="fas fa-map-marker-alt mx-3 fs-1 color-grey"></i>
                            {{$anuncio->localidad['nombre']}}

                            @if ($anuncio->establecimiento['protection'] == 1)
                                @guest
                                    <i class="fab fa-whatsapp mx-1 fs-2 mt-2 protection"></i>
                                    <i class="fas fa-phone-alt mx-1 fs-2 mt-2 protection"></i>
                                @else
                                    <a target="_blank" href="https://wa.me/{{ $anuncio->establecimiento['telefono'] }}?text=Hola soy {{Auth::user()->name}}, mire tu anuncio de {{$anuncio->titulo}} en la Ranita... "><i class="fab fa-whatsapp color-green mx-1 fs-2 mt-2"></i></a>
                                    <a href="tel:+52{{ $anuncio->establecimiento['telefono'] }}"><i class="fas fa-phone-alt color-blue mx-1 fs-2 mt-2"></i></a>
                                @endguest
                            @else
                                <a target="_blank" href="https://wa.me/52{{ $anuncio->establecimiento['telefono'] }}?text=Hola, mire tu anuncio de {{$anuncio->titulo}} en la Ranita... "><i class="fab fa-whatsapp color-green mx-1 fs-2 mt-2"></i></a>
                                <a href="tel:+52{{ $anuncio->establecimiento['telefono'] }}"><i class="fas fa-phone-alt color-blue mx-1 fs-2 mt-2"></i></a>
                            @endif

                        </p>
                    </div>
                </div>

            @endforeach

        </div>

        <!-- Modal -->
        <div class="modal fade" id="anuncioInformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        
                        <div class="col-12">
                            <h5 class="modal-title" id="modal-titulo"></h5>
                            <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <img class="img-modal" src="/storage/anuncios/vgfG8aHll2ZPX5wDakq4LgmXULk0PNaaW8qfdEFI.jpg" alt="">
                    </div>

                    <div class="modal-body">
                        <p class="text-justify" id="modal-descripcion"></p>
                    </div>

                    <div class="modal-footer row">
                        <div class="col text-center">
                            <p class="color-grey font-italic">
                                <i class="fas fa-store fs-1"></i>
                                <span id="modal-establecimiento-nombre"></span>
                                <i class="fas fa-map-marker-alt fs-1"></i>
                                <span id="modal-establecimiento-localidad"></span>
                                <i class="fas fa-shipping-fast fs-1"></i>
                                <span id="modal-establecimiento-delivery"></span>
                            </p>
                        </div>
                        <div class="col-12 row justify-content-center">
                            <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary mx-1">Save changes</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection

@section('scripts')
    <script src="/js/welcome.js"></script>
@endsection
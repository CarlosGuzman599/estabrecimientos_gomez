$(document).ready(function(){
    console.log('___ WELCOME ___');

    $('.protection').on('click', function(){
        LounchNotification('Warning', 'El anunciante solicita inico de secion para mostrar su informacion');
    });

    $('.img-anuncio').on('click', function(){
        const id = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: `/anuncio_establecimiento/show/${id}`,
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function (anuncio) {
                console.log(anuncio);
                $('#modal-titulo').text(anuncio.titulo);
                $('#modal-descripcion').text(anuncio.descripcion);
                $('#modal-establecimiento-nombre').text(anuncio.establecimiento_nombre);
                $('#modal-establecimiento-localidad').text(anuncio.establecimiento_localidad);
                if(anuncio.delivery == 1){
                    $('#modal-establecimiento-delivery').text("A Domicilio");
                }else{
                    $('#modal-establecimiento-delivery').text("Sin Servicio A Domicilio");
                }
            },
            error: function(xhr, status, error){
                console.log(error, xhr, status);
                LounchNotification('Error', error);
            }
        });

    });
});
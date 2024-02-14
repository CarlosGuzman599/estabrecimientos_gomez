$(document).ready(function(){
    console.log('___ WELCOME ___');

    $('.protection').on('click', function(){
        console.log('Holi');
        LounchNotification('Warning', 'El anunciante solicita inico de secion para mostrar su informacion');
    });

    $('.img-anuncio').on('click', function(){
        const id = $(this).attr('id');
        $.ajax({
            type: "GET",
            url: `/anuncio_establecimiento/show/${id}`,
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function (anuncio) {
                $('#modal-titulo').text(anuncio.titulo);
                $('#modal-descripcion').text(anuncio.descripcion);
                $('#modal-establecimiento-nombre').text(anuncio.establecimiento_nombre);
                $('#modal-establecimiento-localidad').text(anuncio.establecimiento_localidad);
                $('#modal-img').attr('src', anuncio.img);
                if(anuncio.delivery == 1){
                    $('#modal-establecimiento-delivery').text("A Domicilio");
                }else{
                    $('#modal-establecimiento-delivery').text("Sin Servicio A Domicilio");
                }

                $('#modal-btn-protection').addClass('d-none');
                $('#modal-information').addClass('d-none');
                
                if(anuncio.telefono == 'protection'){
                    $('#modal-btn-protection').removeClass('d-none');
                }else{
                    $('#modal-information').removeClass('d-none');
                    $('#modal-call').prop('href', `tel:+52${anuncio.telefono}`);
                    $('#modal-whatsapp').prop('href', `https://wa.me/52${anuncio.telefono}?text=Hola, mire tu anuncio de ${anuncio.titulo} en la Ranita `);
                }
            },
            error: function(xhr, status, error){
                console.log(error, xhr, status);
                LounchNotification('Error', error);
            }
        });

    });
});
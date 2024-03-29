$(document).ready(function(){
    console.log('___ SHOW ESTABLECIMIENTO ___')

    $('.delete-anuncio').on('click', function(){
        Swal.fire({
            title: 'Eliminar!',
            text: "Estas seguro que deceas eliminar "+$(this).parent().attr('name')+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#container-'+$(this).parent().attr('id')).remove();
                $.ajax({
                    type: "delete",
                    url: "/anuncio_establecimiento/destroy/"+$(this).parent().attr('id'),
                    data: {_token: $('meta[name="csrf-token"]').attr('content')},
                    success:function (response) {
                        if(response.status == 200){
                            Swal.fire(
                                'Eliminado!',
                                'El establecimiento ah sido eliminado',
                                'success'
                            )
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Ocurrio un error: '+response
                            })
                        }
                    }
                });
            }

        });

    });
});
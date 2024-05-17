$(document).ready(function(){
    console.log('___ ALL ___')
    function deshabilitaRetroceso(){
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button" //chrome
        window.onhashchange=function(){window.location.hash="no-back-button";}
    }

    if(!document.getElementById( "contenedor-anuncios" )){
        $('#search-welcome').addClass('d-none');
    }
});

function LounchNotification(Type, Message){

    $

    if(Type == 'Ok'){
        $('#notification').addClass('bg-green');
        $('#notification-header').append(`<i class="fas fa-check-circle"></i>` + '    Hecho');
    }else if(Type == 'Error'){
        $('#notification').addClass('bg-red');
        $('#notification-header').append(`<i class="fas fa-skull-crossbones"></i>` + '    Error');
    }else if(Type == 'Info'){
        $('#notification').addClass('bg-grey');
        $('#notification-header').append(`<i class="fas fa-info-circle"></i>` + '    Informacion');
    }else if(Type == 'Warning'){
        $('#notification').addClass('bg-orange');
        $('#notification-header').append(`<i class="fas fa-exclamation-triangle"></i>` + '    Advertencia');
    }else{
        $('#notification').addClass('bg-grey');
        $('#notification-header').text('');
    }

    $('#notification-message').text(Message);
    $('#notification').show(1000);

    setTimeout(function(){
        $('#notification').hide(1000);
        if(Type == 'Ok'){
            $('#notification').removeClass('bg-green');
        }else if(Type == 'Error'){
            $('#notification').removeClass('bg-red');
        }else if(Type == 'Warning'){
            $('#notification').removeClass('bg-orange');
        }else if(Type == 'Info'){
            $('#notification').removeClass('bg-grey');
        }else{
            $('#notification').removeClass('bg-grey');
        }
        $('#notification-header').text('');
    },5000);
}
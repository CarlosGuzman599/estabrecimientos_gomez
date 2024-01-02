$(document).ready(function(){
    console.log('___ ALL ___')
    function deshabilitaRetroceso(){
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button" //chrome
        window.onhashchange=function(){window.location.hash="no-back-button";}
    }
});
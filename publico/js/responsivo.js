$(document).ready(function() {
    var dispositivo = navigator.userAgent.toLowerCase();
        if( dispositivo.search(/iphone|ipod|ipad|Opera Mini|IEMobile|BlackBerry|android/) > -1 ){
        $("#datosusuarioVista").hide();
        $("#piscinasListaGeneralReportes").hide();
        //$("#piscinasListaGeneralReportes").removeClass('col-sm-12 col-md-9 col-xs-12');
        //$("#piscinasListaGeneralReportes").addClass('col-sm-12 col-md-12 col-xs-12').css('margin-left', '8% !important');
        return false;
    };  
});
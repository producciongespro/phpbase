$(document).ready(function () {
    $("#btnEnviar").click(function (e) { 
        e.preventDefault();
        enviar_datos();
    });
});

function enviar_datos() {
    var titulo = $("#titulo").val();
    var noticia = $("#noticia").val();
    var parametros = {
        "titulo" : titulo,
        "noticia" : noticia
};
$.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'webservices/registro_generico.php?tabla_destino=noticias', //archivo que recibe la peticion
        type:  'post', //método de envio
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var resultado = JSON.parse(response);
            $("#resultado").html(resultado.mensaje);
        }
});

}
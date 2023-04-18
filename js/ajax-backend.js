function modificar(codigo) {
    var parametros = { "modificar": codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            document.getElementById('cod_modificar').value = datos.codigo;
            document.getElementById('nombre').value = datos.nombre;
            document.getElementById('correo').value = datos.correo;
            document.getElementById('dni').value = datos.dni;
            document.getElementById('dni2').value = datos.dni;
            document.getElementById('telefono').value = datos.telefono;
            document.getElementById('direccion').value = datos.direccion;
        }
    });
}

function permisos(codigo) {
    var parametros = { "permisos": codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            document.getElementById('cod_permiso').value = codigo;
            var datos = JSON.parse(response); //se parcea la respuesta como json
            console.log(datos);
            if (datos.length > 0) {
                datos.forEach(e => {
                    if (e == 1) $('#usuarios').prop("checked", true);
                    if (e == 2) $('#clientes').prop("checked", true);
                    if (e == 3) $('#productos').prop("checked", true);
                });
            } else {
                $('#usuarios').prop("checked", false);
                $('#clientes').prop("checked", false);
                $('#productos').prop("checked", false);
            }
        }
    });
}

function eliminar(codigo) {
    var parametros = { "eliminar": codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            document.getElementById('cod_eliminar').value = datos.codigo;
            $('#mensaje').html('¿Está seguro de eliminar a ' + datos.nombre + '?');
        }
    });
}
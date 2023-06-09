function modificarProducto(codigo) {
    var parametros = { 'modificar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/producto_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_producto').val(datos.codigo);
            $('#nombre').val(datos.nombre);
            $('#descripcion').val(datos.descripcion);
            $('#cod_categoria').val(datos.cod_categoria);
            $('#labelModificarCategoria').text(datos.categoria);
            $('#precio').val(datos.precio);
            $('#stock').val(datos.stock);
            datos.estado == 1 ? $('#estado').prop('checked', true) : $('#estado').prop('checked', false);
        }
    });
}

function eliminarProducto(codigo) {
    var parametros = { 'eliminar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/producto_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_producto').val(datos.codigo);
            $('#mensaje').html('¿Está seguro de eliminar ' + datos.nombre + '?');
        }
    });
}

function modificarUsuario(codigo) {
    var parametros = { 'modificar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_usuario').val(datos.codigo);
            $('#nombre').val(datos.nombre);
            $('#correo').val(datos.correo);
            $('#dni').val(datos.dni);
            $('#telefono').val(datos.telefono);
            $('#direccion').val(datos.direccion);
        }
    });
}

function permisosUsuario(codigo) {
    var parametros = { 'permisos': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_permiso').val(codigo);
            var usuarios = false;
            var clientes = false;
            var productos = false;
            if (datos.length > 0) {
                datos.forEach(e => {
                    if (e == 1) usuarios = true;
                    if (e == 2) clientes = true;
                    if (e == 3) productos = true;
                });
                $('#usuarios').prop('checked', usuarios);
                $('#clientes').prop('checked', clientes);
                $('#productos').prop('checked', productos);
            } else {
                $('#usuarios').prop('checked', usuarios);
                $('#clientes').prop('checked', clientes);
                $('#productos').prop('checked', productos);
            }
        }
    });
}

function eliminarUsuario(codigo) {
    var parametros = { 'eliminar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/usuario_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_usuario').val(datos.codigo);
            $('#mensaje').html('¿Está seguro de eliminar a ' + datos.nombre + '?');
        }
    });
}

function modificarCliente(codigo) {
    var parametros = { 'modificar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/cliente_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_cliente').val(datos.codigo);
            $('#nombre').val(datos.nombre);
            $('#correo').val(datos.correo);
            $('#dni').val(datos.dni);
            $('#telefono').val(datos.telefono);
            $('#direccion').val(datos.direccion);
            datos.estado == 1 ? $('#estado').prop('checked', true) : $('#estado').prop('checked', false);
        }
    });
}

function eliminarCliente(codigo) {
    var parametros = { 'eliminar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/cliente_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_cliente').val(datos.codigo);
            $('#mensaje').html('¿Está seguro de eliminar a ' + datos.nombre + '?');
        }
    });
}

$('#dropdownCategoria > option').on('click', setDropdownValue);
$('#dropdownModificarCategoria > option').on('click', setDropdownValueModificar);

function setDropdownValue() {
    $('#categoria').val($(this).val());
    $('#labelCategoria').text($(this).text());
}

function setDropdownValueModificar() {
    $('#cod_categoria').val($(this).val());
    $('#labelModificarCategoria').text($(this).text());
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key == 46 || key >= 48 && key <= 57)
}
var pedido, producto;

function modificarPedido(codigo) {
    var parametros = { 'pedido': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            $('#cod_pedido').val(codigo);
            $('#cantidad').val(datos.cantidad);
            $('#total_pedido').val(datos.total);
            $('#titulo').text(`Detalle de pedido N° ${codigo}`);
            $('#cliente').text(`Cliente: ${datos.cliente}`);
            $('#fecha').text(`Fecha: ${datos.fecha}`);
            $('#total').text(`TOTAL: S/ ${datos.total}`);
            $('#guardar').attr('onclick', `actualizarPedido(${codigo})`);
        }
    });

    $('#detalle').children().remove();

    var parametros = { 'detalle': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            datos.forEach(element => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <img src="data:image/jpg;base64,${element['producto']['imagen']}" style="width: 45px; height: 45px;">
                    </td>
                    <td class="text-white">${element['producto']['nombre']}</td>
                    <td class="text-white">S/ ${element['producto']['precio']}</td>
                    <td class="text-white">
                        <button class="btn btn-rounded btn-icon btn-outline-danger" onclick="quitarCantidad(${element['producto']['codigo']}, ${element['detalle']['codigo']})" style="width: 25px; height: 25px">
                            <i class="fa-solid fa-minus h6 m-0"></i>
                        </button>
                        <span class="mx-3">${element['detalle']['cantidad']}</span>
                        <button class="btn btn-rounded btn-icon btn-outline-success" onclick="agregarCantidad(${element['producto']['codigo']}, ${element['detalle']['codigo']})" style="width: 25px; height: 25px">
                            <i class="fa-solid fa-plus h6 m-0"></i>
                        </button>
                    </td>
                    <td class="text-white">S/ ${element['detalle']['monto']}</td>
                    <td class="text-center">
                        <button id="eliminar_producto" class="btn btn-rounded btn-icon btn-inverse-danger" data-bs-toggle="modal" data-bs-target="#eliminar" data-bs-dismiss="modal" onclick="eliminarDetalle(${element['producto']['codigo']}, ${element['detalle']['codigo']})" style="width: 30px; height: 30px">
                            <i class="fa-solid fa-xmark h4 m-0"></i>
                        </button>
                    </td>
                `;
                pedido = datos;
                $('#detalle').append(row);
            });
        }
    });
}

function agregarProducto(codigo) {
    var parametros = { 'producto': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/producto_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            agregar = true;

            for (let index = 0; index < pedido.length; index++) {
                if (pedido[index]['producto']['codigo'] == codigo) {
                    pedido[index]['detalle']['cantidad']++;
                    cantidad = pedido[index]['detalle']['cantidad'];
                    precio = pedido[index]['producto']['precio'];
                    $('#detalle tr').each(function (i) {
                        if (i == index) {
                            $(this).children().last().prev().prev().children('span').text(cantidad);
                            $(this).children().last().prev().text(`S/ ${cantidad * precio}`);
                        }
                    });
                    agregar = false;
                }
            }

            if (agregar) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <img src="data:image/jpg;base64,${datos.imagen}" style="width: 45px; height: 45px;">
                    </td>
                    <td class="text-white">${datos.nombre}</td>
                    <td class="text-white">S/ ${datos.precio}</td>
                    <td class="text-white">
                        <button class="btn btn-rounded btn-icon btn-outline-danger" onclick="quitarCantidad(${datos.codigo}, '')" style="width: 25px; height: 25px">
                            <i class="fa-solid fa-minus h6 m-0"></i>
                        </button>
                        <span class="mx-3">1</span>
                        <button class="btn btn-rounded btn-icon btn-outline-success" onclick="agregarCantidad(${datos.codigo}, '')" style="width: 25px; height: 25px">
                            <i class="fa-solid fa-plus h6 m-0"></i>
                        </button>
                    </td>
                    <td class="text-white">S/ ${datos.precio}</td>
                    <td class="text-center">
                        <button id="eliminar_producto" class="btn btn-rounded btn-icon btn-inverse-danger" data-bs-toggle="modal" data-bs-target="#eliminar" data-bs-dismiss="modal" onclick="eliminarDetalle(${datos.codigo}, '')" style="width: 30px; height: 30px">
                            <i class="fa-solid fa-xmark h4 m-0"></i>
                        </button>
                    </td>
                `;
                $('#detalle').append(row);
                producto = datos;
                detalle = { codigo: '', cantidad: '1', monto: datos.precio }
                pedido.push({ producto, detalle });
                $('#cantidad').val(pedido.length);
            }

            total = 0;
            pedido.forEach(element => total += (element['detalle']['cantidad'] * element['producto']['precio']));
            $('#total').text(`TOTAL: S/ ${total}`);
            $('#total_pedido').val(total);
        }
    });
}

function agregarCantidad(codigoProducto, codigoDetalle) {
    total = 0;
    pedido.forEach(element => {
        if (element['producto']['codigo'] == codigoProducto) {
            element['detalle']['cantidad']++;
            cantidad = element['detalle']['cantidad'];
            precio = element['producto']['precio'];
            $(event.currentTarget).prev().text(cantidad);
            $(event.currentTarget).parent().next().text(`S/ ${cantidad * precio}`);
        }
        total += (element['detalle']['cantidad'] * element['producto']['precio']);
    });
    $('#total').text('TOTAL: S/ ' + total);
    $('#total_pedido').val(total);

    var parametros = { 'modificar': codigoDetalle, 'cantidad': cantidad, 'monto': cantidad * precio, 'total': total };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post' //método de envio
    });
}

function quitarCantidad(codigoProducto, codigoDetalle) {
    total = 0;
    pedido.forEach(element => {
        if (element['producto']['codigo'] == codigoProducto) {
            if (element['detalle']['cantidad'] > 1) {
                element['detalle']['cantidad']--;
                cantidad = element['detalle']['cantidad'];
                precio = element['producto']['precio'];
                $(event.currentTarget).next().text(cantidad);
                $(event.currentTarget).parent().next().text(`S/ ${cantidad * precio}`);
            }
        }
        total += (element['detalle']['cantidad'] * element['producto']['precio']);
    });
    $('#total').text('TOTAL: S/ ' + total);
    $('#total_pedido').val(total);

    var parametros = { 'modificar': codigoDetalle, 'cantidad': cantidad, 'monto': cantidad * precio, 'total': total };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post' //método de envio
    });
}

function eliminarDetalle(codigoProducto, codigoDetalle) {
    producto = $(event.currentTarget).parent().parent();

    for (let i = 0; i < pedido.length; i++) {
        if (pedido[i]['producto']['codigo'] == codigoProducto) {
            $('#mensaje').html(`¿Está seguro de eliminar ${pedido[i]['producto']['nombre']}?`);
            $('#eliminar_detalle').attr('onclick', `confirmarEliminarDetalle(${i}, ${codigoDetalle})`);
        }
    }
}

function confirmarEliminarDetalle(index, codigoDetalle) {
    total = 0;
    pedido.forEach(element => total += (element['detalle']['cantidad'] * element['producto']['precio']));

    if (pedido.length > 1) {
        total -= (pedido[index]['detalle']['cantidad'] * pedido[index]['producto']['precio']);
        $('#total').text('TOTAL: S/ ' + total);
        $('#total_pedido').val(total);
        pedido.splice(index, 1);
        producto.remove();

        var parametros = { 'eliminar': codigoDetalle };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '../controller/pedido_controller.php', //archivo que recibe la peticion
            type: 'post', //método de envio
        });
    }
}

function actualizarPedido(codigo) {
    total = 0;
    pedido.forEach(element => {
        if (element['detalle']['codigo'] == '') {
            var parametros = { 'insertar': codigo, 'producto': element['producto']['codigo'], 'cantidad': element['detalle']['cantidad'], 'monto': element['detalle']['cantidad'] * element['producto']['precio'] };
            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '../controller/pedido_controller.php', //archivo que recibe la peticion
                type: 'post' //método de envio
            });
        }
        total += (element['detalle']['cantidad'] * element['producto']['precio']);
    });

    var parametros = { 'actualizar': codigo, 'cantidad': pedido.length, 'total': total };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $('#label').parent().removeClass('d-none');
            $('#label').parent().addClass('d-flex');
            if (response) {
                $('#label').parent().addClass('alert-success');
                $('#label').text('Pedido actualizado con éxito.');
                $('#close').addClass('text-success');
            } else {
                $('#label').parent().addClass('alert-danger');
                $('#label').text('Error al actualizar pedido.');
                $('#close').addClass('text-danger');
            }
        }
    });
}

function estadoPedido(codigo) {
    var parametros = { 'pedido': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controller/pedido_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $('#titulo_estado').text(`Modificar Estado de Pedido N° ${codigo}`);
            $('#cod_pedido').val(codigo);
        }
    });
}

function modificarProducto(codigo) {
    var parametros = { 'producto': codigo };
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
    var parametros = { 'producto': codigo };
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

$('#dropdownCategoria > option').on('click', setDropdownCategoria);
$('#dropdownProducto > option').on('click', setDropdownProducto);
$('#dropdownModificarCategoria > option').on('click', setDropdownValueModificar);

function setDropdownCategoria() {
    $('#categoria').val($(this).val());
    $('#labelCategoria').text($(this).text());
}

function setDropdownProducto() {
    $('#producto').val($(this).val());
    $('#labelProducto').text($(this).text());
    $('#agregar').attr('onclick', `agregarProducto(${$(this).val()})`)
}

function setDropdownValueModificar() {
    $('#cod_categoria').val($(this).val());
    $('#labelModificarCategoria').text($(this).text());
}

function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key == 46 || key >= 48 && key <= 57)
}
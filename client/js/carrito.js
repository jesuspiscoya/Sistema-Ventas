//Mostrar los productos guardados en el LS
function leerLocalStorage() {
    let productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function (producto) {
        //Construir plantilla
        mostrarProducto(producto);
    });
}

//Comprobar que hay elementos en el LS
function obtenerProductosLocalStorage() {
    let productoLS;

    //Comprobar si hay algo en LS
    if (localStorage.getItem('productos') === null) {
        productoLS = [];
    } else {
        productoLS = JSON.parse(localStorage.getItem('productos'));
    }
    return productoLS;
}

//Muestra el producto en el carrito
function mostrarProducto(producto) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td class="py-2">
            <img src="data:image/jpg;base64,${producto.imagen}" style="width: 45px; height: 45px;">
        </td>
        <td class="text-white">${producto.nombre}</td>
        <td class="text-white">${producto.precio}</td>
        <td>
            <button id="eliminar" class="btn btn-rounded btn-icon btn-inverse-danger" onclick="eliminarProducto(${producto.codigo})" style="width: 30px; height: 30px">
                <i class="fa-solid fa-xmark h4 m-0"></i>
            </button>
        </td>
    `;
    $('#lista-carrito').append(row);
}

//Agregar el producto seleccionado al carrito
function agregarProducto(codigo) {
    var parametros = { 'agregar': codigo };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: 'client/controller/producto_controller.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            var datos = JSON.parse(response); //se parcea la respuesta como json
            let productosLS = obtenerProductosLocalStorage();
            productosLS.forEach(function (producto) {
                if (producto.codigo === datos.codigo) {
                    productosLS = producto.codigo;
                }
            });

            if (productosLS === datos.codigo) {
                mostrarToast('info', 'El producto ya está agregado.', '#00395dce');
            } else {
                mostrarProducto(datos);
                datos.cantidad = 1;
                guardarProductoLocalStorage(datos);
                mostrarToast('success', 'Producto agregado al carrito.', '#005d43ce');
            }
        }
    });
}

function mostrarToast(icon, mensaje, background) {
    Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 1500
    }).fire({
        icon: icon,
        title: mensaje,
        color: '#ffffff',
        background: background,
    });
}

//Almacenar en el LS
function guardarProductoLocalStorage(producto) {
    //Toma valor de un arreglo con datos del LS
    let productos = obtenerProductosLocalStorage();
    //Agregar el producto al carrito
    productos.push(producto);
    //Agregamos al LS
    localStorage.setItem('productos', JSON.stringify(productos));
}

//Eliminar el producto del carrito en el DOM
function eliminarProducto(codigo) {
    $(event.currentTarget).parent().parent().remove();
    eliminarProductoLocalStorage(codigo);
}

//Eliminar producto por ID del LS
function eliminarProductoLocalStorage(codigo) {
    //Obtenemos el arreglo de productos
    let productosLS = obtenerProductosLocalStorage();
    //Comparar el codigo del producto borrado con LS
    productosLS.forEach(function (producto, index) {
        if (producto.codigo == codigo) {
            productosLS.splice(index, 1);
        }
    });
    //Añadimos el arreglo actual al LS
    localStorage.setItem('productos', JSON.stringify(productosLS));
}

//Elimina todos los productos
function vaciarCarrito() {
    if (obtenerProductosLocalStorage().length === 0) {
        mostrarToast('error', 'El carrito está vacío.', '#820000ce');
    } else {
        Swal.fire({
            title: 'Confirmar acción',
            text: '¿Está seguro de restablecer su carrito?',
            icon: 'warning',
            color: '#ffffff',
            background: '#2a3646f6',
            backdrop: '#000000ae',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#lista-carrito > tr').remove();
                vaciarLocalStorage();
                mostrarToast('success', 'Se ha restablecido su carrito.', '#005d43ce');
            }
        });
    }
}

//Eliminar todos los datos del LS
function vaciarLocalStorage() {
    localStorage.clear();
}

//Procesar pedido
function procesarPedido() {
    if (obtenerProductosLocalStorage().length === 0) {
        mostrarToast('error', 'El carrito está vacío, agrega algún producto.', '#820000ce');
    } else {
        location.href = "client/pages/carrito.php";
    }
}

//Mostrar los productos guardados en el LS en carrito.php
function leerLocalStoragePedido() {
    let productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function (producto) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <img src="data:image/jpg;base64,${producto.imagen}" style="width: 50px; height: 50px;">
            </td>
            <td class="text-white">${producto.nombre}</td>
            <td class="text-white">S/ ${producto.precio}</td>
            <td class="text-white">
                <button class="btn btn-rounded btn-icon btn-outline-danger" onclick="quitar(${producto.codigo})" style="width: 25px; height: 25px">
                    <i class="fa-solid fa-minus h6 m-0"></i>
                </button>
                <span id="cantidad" class="mx-4">${producto.cantidad}</span>
                <button class="btn btn-rounded btn-icon btn-outline-success" onclick="agregar(${producto.codigo})" style="width: 25px; height: 25px">
                    <i class="fa-solid fa-plus h6 m-0"></i>
                </button>
            </td>
            <td id="monto" class="text-white">S/ ${producto.precio * producto.cantidad}</td>
            <td class="text-center">
                <button id="eliminar" class="btn btn-rounded btn-icon btn-inverse-danger" onclick="eliminarProducto(${producto.codigo})" style="width: 35px; height: 35px">
                    <i class="fa-solid fa-xmark h4 m-0"></i>
                </button>
            </td>
        `;
        $('#lista-pedido').append(row);
    });
}

//Calcular montos
function calcularTotal() {
    let total = 0, igv = 0, subtotal = 0;
    let productosLS = obtenerProductosLocalStorage();

    for (let i = 0; i < productosLS.length; i++) {
        let element = Number(productosLS[i].precio * productosLS[i].cantidad);
        total = total + element;
    }

    igv = parseFloat(total * 0.18).toFixed(2);
    subtotal = parseFloat(total - igv).toFixed(2);

    document.getElementById('subtotal').innerHTML = "S/ " + subtotal;
    document.getElementById('igv').innerHTML = "S/ " + igv;
    document.getElementById('total').innerHTML = "S/ " + total.toFixed(2);
}

//Actualizar cantidad
function agregar(codigo) {
    let productosLS = obtenerProductosLocalStorage();
    let cantidad = document.querySelectorAll('#cantidad');
    let monto = document.querySelectorAll('#monto');
    productosLS.forEach(function (producto, index) {
        if (producto.codigo == codigo) {
            producto.cantidad++;
            cantidad[index].innerHTML = producto.cantidad;
            monto[index].innerHTML = 'S/ ' + producto.cantidad * productosLS[index].precio;
        }
    });

    localStorage.setItem('productos', JSON.stringify(productosLS));
    calcularTotal();
}

//Actualizar cantidad
function quitar(codigo) {
    let productosLS = obtenerProductosLocalStorage();
    let cantidad = document.querySelectorAll('#cantidad');
    let monto = document.querySelectorAll('#monto');
    productosLS.forEach(function (producto, index) {
        if (producto.codigo == codigo) {
            if (cantidad[index].textContent > 1) {
                producto.cantidad--;
                cantidad[index].innerHTML = producto.cantidad;
                monto[index].innerHTML = 'S/ ' + producto.cantidad * productosLS[index].precio;
            }
        }
    });

    localStorage.setItem('productos', JSON.stringify(productosLS));
    calcularTotal();
}

function realizarPedido() {
    if (obtenerProductosLocalStorage().length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No hay productos, selecciona alguno.',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location = '../../';
        });
    } else {
        if (!$('#nombre').length) {
            Swal.fire({
                title: 'Iniciar Sesión',
                text: 'Ingrese a su cuenta para realizar su pedido.',
                icon: 'warning',
                color: '#ffffff',
                background: '#2a3646f6',
                backdrop: '#000000ae',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ingresar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '../pages/login.php';
                }
            });
        } else {
            Swal.fire({
                background: '#00000000',
                backdrop: '#000000ca',
                html: `
                    <div id="loaders" class="d-block justify-content-center">
                        <div class="cargando">
                            <div class="pelotas"></div>
                            <div class="pelotas mx-4"></div>
                            <div class="pelotas"></div>
                        </div>
                        <span class="texto-cargando font-weight-bold">Cargando...</span>
                    </div >
                `,
                showConfirmButton: false,
                timer: 2500
            }).then(() => {
                vaciarLocalStorage();
                enviarPedido();
                window.location = '../../';
            });
        }
    }
}

function enviarPedido() {
    
}
<?php
$src = '../';
require '../assets/libraries/fpdf/fpdf.php';
require '../services/pedido_dao.php';
require '../services/detalle_dao.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $pedidoDao = new PedidoDao;
        $cliente = $pedidoDao->buscarPdf($_GET['codigo']);
        //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

        //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
        //$dato_info = $consulta_info->fetch_object();
        $this->SetFont('Arial', 'B', 9); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Image('../assets/img/logo-pdf.png', 10, 10, 50); //logo de la empresa, moverDerecha, moverAbajo, tamañoIMG

        $this->Ln(4);
        $this->Cell(0, 0, utf8_decode('PEDIDO N°' . $_GET['codigo']), 0, 0, 'R'); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion
        $this->SetTextColor(0, 0, 0); //color
        $this->Ln(15); // Salto de línea

        /* TITULO DE LA TABLA */
        $this->SetTextColor(46, 134, 193);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 0, utf8_decode("CONFIRMACIÓN DE PEDIDO"), 0, 0, 'C');
        $this->Ln(13);

        $this->SetTextColor(103); //color
        $this->SetFont('Arial', 'B', 9);
        /* UBICACION */
        $this->Cell(100, 0, utf8_decode("Cliente : " . $cliente->nombre));
        $this->Ln(5);

        /* TELEFONO */
        $this->Cell(0, 0, utf8_decode("Teléfono : " . $cliente->telefono));
        $this->Ln(5);

        /* DIRECCIÓN */
        $this->Cell(0, 0, utf8_decode("Dirección : " . $cliente->direccion));
        $this->Ln(5);

        /* COREEO */
        $this->Cell(0, 0, utf8_decode("Correo : " . $cliente->correo));
        $this->Ln(5);

        /* FECHA */
        $fecha = date('d/m/Y', strtotime($cliente->codigo));
        $this->Cell(0, 0, utf8_decode("Fecha : " . $fecha));
        $this->Ln(9);

        /* CAMPOS DE LA TABLA */
        $this->SetFillColor(40, 116, 166); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(7);
        $this->Cell(8, 8, utf8_decode('#'), 1, 0, 'C', 1);
        $this->Cell(23, 8, utf8_decode('IMÁGEN'), 1, 0, 'C', 1);
        $this->Cell(70, 8, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
        $this->Cell(25, 8, utf8_decode('PRECIO'), 1, 0, 'C', 1);
        $this->Cell(25, 8, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
        $this->Cell(25, 8, utf8_decode('MONTO'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetTextColor(128, 139, 150); //colorTexto
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
    }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 9);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$pedidoDao = new PedidoDao;
$detalleDao = new DetalleDao;
$pedido = $pedidoDao->buscar($_GET['codigo']);
$detalle = $detalleDao->buscar($_GET['codigo']);

/* TABLA */
foreach ($detalle as $key => $value) {
    $pdf->Cell(7);
    $pdf->Cell(8, 12, utf8_decode($key + 1), 0, 0, 'C');
    $dataURI = 'data:image/jpg;base64,' . $value['producto']->imagen;
    $pic = explode(',', $dataURI, 2)[1];
    $imagen = 'data://text/plain;base64,' . $pic;
    $pdf->Cell(25, 12, $pdf->Image($imagen, $pdf->GetX() + 5, $pdf->GetY() + 1, 0, 10, 'jpg'));
    $pdf->Cell(66, 12, utf8_decode($value['producto']->nombre));
    $pdf->Cell(2);
    $pdf->Cell(25, 12, utf8_decode('S/ ' . $value['producto']->precio), 0, 0, 'C');
    $pdf->Cell(25, 12, utf8_decode($value['detalle']->cantidad), 0, 0, 'C');
    $pdf->Cell(25, 12, utf8_decode('S/ ' . $value['detalle']->monto), 0, 1, 'C');
}

$pdf->SetFillColor(214, 234, 248); //colorFondo
$pdf->SetDrawColor(214, 234, 248); //colorBorde
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(0, 3, '', 0, 1);
$pdf->Cell(7);
$pdf->Cell(151, 8, utf8_decode('SUBTOTAL :'), 1, 0, 'R', 1);
$pdf->Cell(25, 8, utf8_decode('S/  ' . $pedido->total - ($pedido->total * 0.18)), 1, 1, 'C', 1);

$pdf->Cell(7);
$pdf->Cell(151, 8, utf8_decode('IGV :'), 1, 0, 'R', 1);
$pdf->Cell(25, 8, utf8_decode('S/  ' . $pedido->total * 0.18), 1, 1, 'C', 1);

$pdf->SetTextColor(40, 180, 99); //colorTexto
$pdf->Cell(7);
$pdf->Cell(151, 8, utf8_decode('TOTAL :'), 1, 0, 'R', 1);
$pdf->Cell(25, 8, utf8_decode('S/  ' . $pedido->total), 1, 1, 'C', 1);

$pdf->Output('BOLETA_' . $_GET['codigo'] . '.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
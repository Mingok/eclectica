<?php
require_once 'classes/prenda/prenda.php';

$tipoVenta1 = $_REQUEST['tipoVenta1'];
$tipoVenta2 = $_REQUEST['tipoVenta2'];
$tipoVenta3 = $_REQUEST['tipoVenta3'];
$tipoVenta4 = $_REQUEST['tipoVenta4'];
$tipoVenta5 = $_REQUEST['tipoVenta5'];
$tipoVenta6 = $_REQUEST['tipoVenta6'];
$idPrenda = $_REQUEST['idPrenda'];
$codigoPrenda = $_REQUEST['codigoPrenda'];
$detallePrenda = $_REQUEST['detallePrenda'];
$cantidadPrenda =$_REQUEST['cantidadPrenda'];
$idColorPrenda = $_REQUEST['idColorPrenda'];
$idEstampadoPrenda =$_REQUEST['idEstampadoPrenda'];
$idTelaPrenda = $_REQUEST['idTelaPrenda'];
$idTallePrenda = $_REQUEST['idTallePrenda'];
$idEstacionPrenda = $_REQUEST['idEstacionPrenda'];
$idEmpresaPrenda = $_REQUEST['idEmpresaPrenda'];
$idProveedorPrenda = $_REQUEST['idProveedorPrenda'];
$idMarcaPrenda=$_REQUEST['idMarcaPrenda'];



$arrPrenda = array(
'idPrenda' => $idPrenda,
'codigoPrenda' => $codigoPrenda,
'detallePrenda'=> $detallePrenda,
'cantidadPrenda' => $cantidadPrenda,
'idColorPrenda' => $idColorPrenda,
'idEstampadoPrenda' => $idEstampadoPrenda,
'idTelaPrenda' => $idTelaPrenda,
'idTallePrenda' => $idTallePrenda,   
'idEstacionPrenda' => $idEstacionPrenda,    
'idEmpresaPrenda'=>$idEmpresaPrenda,
'idProveedorPrenda' => $idProveedorPrenda,	
'idMarcaPrenda'=>$idMarcaPrenda

);
$arrPrecioPrenda = array(
    'tipoVenta1'=>$tipoVenta1,
    'tipoVenta2'=>$tipoVenta2,
    'tipoVenta3'=>$tipoVenta3,
    'tipoVenta4'=>$tipoVenta4,
    'tipoVenta5'=>$tipoVenta5,
    'tipoVenta6'=>$tipoVenta6
);

$prendaClass = new prenda();
if ($idPrenda) {
    
	$prendas = $prendaClass->modificarPrenda($arrPrenda);
} else {
	$prendas = $prendaClass->agregarNuevoPrenda($arrPrenda);
    $prendas = $prendaClass->agregarNuevoPrecioPrenda($arrPrecioPrenda);		
}

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
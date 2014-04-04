<?php
require_once 'classes/tipoVenta/tipoVenta.php';
$detalleTipoVenta = $_REQUEST['detalleTipoVenta'];
$grupoTipoVenta = $_REQUEST['grupoTipoVenta'];
$idTipoVenta = $_REQUEST['idTipoVenta'];
$arrTipoVenta = array(
	'detalleTipoVenta' => $detalleTipoVenta,
	'idTipoVenta' => $idTipoVenta,
    'grupoTipoVenta' => $grupoTipoVenta
);


$tipoVentaClass = new tipoVenta();
	$tipoVentas = $tipoVentaClass->modificarTipoVenta($arrTipoVenta);
   


header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
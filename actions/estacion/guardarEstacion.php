<?php
require_once 'classes/estacion/estacion.php';
$detalleEstacion = $_REQUEST['detalleEstacion'];
$idEstacion = $_REQUEST['idEstacion'];
$arrEstacion = array(
	'detalleEstacion' => $detalleEstacion,
	'idEstacion' => $idEstacion
);


$estacionClass = new estacion();
if ($idEstacion) {
	$estaciones = $estacionClass->modificarEstacion($arrEstacion);
} else {
	$estaciones = $estacionClass->agregarNuevoEstacion($arrEstacion);	
}

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
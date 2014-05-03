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
$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?guardaEstacion=ok');
exit;
?>
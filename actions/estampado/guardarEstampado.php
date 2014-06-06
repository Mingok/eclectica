<?php
require_once 'classes/estampado/estampado.php';
$detalleEstampado = $_REQUEST['detalleEstampado'];
$idEstampado = $_REQUEST['idEstampado'];
$arrEstampado = array(
	'detalleEstampado' => $detalleEstampado,
	'idEstampado' => $idEstampado
	);


$estampadoClass = new estampado();
if ($idEstampado) {
	$estampados = $estampadoClass->modificarEstampado($arrEstampado);
} else {
	$estampados = $estampadoClass->agregarNuevoEstampado($arrEstampado);	
}

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaEstampado=ok');
exit;
?>	
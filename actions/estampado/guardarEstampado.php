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

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>	
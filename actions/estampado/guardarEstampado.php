<?php
require_once 'classes/estampado/estampado.php';
$detalleEstampado = $_REQUEST['detalleEstampado'];
$arrEstampado = array(
	'detalleEstampado' => $detalleEstampado
);

$estampadoClass = new estampado();
$estampados = $estampadoClass->agregarNuevoEstampado($arrEstampado);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
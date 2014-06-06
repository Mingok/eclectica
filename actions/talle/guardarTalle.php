<?php
require_once 'classes/talle/talle.php';
$detalleTalle = $_REQUEST['detalleTalle'];
$idTalle = $_REQUEST['idTalle'];
$arrTalle = array(
	'detalleTalle' => $detalleTalle,
	'idTalle' => $idTalle
);


$talleClass = new talle();
if ($idTalle) {
	$talles = $talleClass->modificarTalle($arrTalle);
} else {
	$talles = $talleClass->agregarNuevoTalle($arrTalle);	
}

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaTalle=ok');
exit;
?>
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

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
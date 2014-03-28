<?php
require_once 'classes/talle/talle.php';
$detalleTalle = $_REQUEST['detalleTalle'];
$arrTalle = array(
	'detalleTalle' => $detalleTalle
);

$talleClass = new talle();
$talles = $talleClass->agregarNuevoTalle($arrTalle);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
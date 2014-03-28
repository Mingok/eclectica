<?php
require_once 'classes/marca/marca.php';
$detalleMarca = $_REQUEST['detalleMarca'];
$arrMarca = array(
	'detalleMarca' => $detalleMarca
);

$marcaClass = new marca();
$marcas = $marcaClass->agregarNuevoMarca($arrMarca);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
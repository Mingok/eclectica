<?php
require_once 'classes/marca/marca.php';
$detalleMarca = $_REQUEST['detalleMarca'];
$idMarca = $_REQUEST['idMarca'];
$arrMarca = array(
	'detalleMarca' => $detalleMarca,
	'idMarca' => $idMarca
);


$marcaClass = new marca();
if ($idMarca) {
	$marcas = $marcaClass->modificarMarca($arrMarca);
} else {
	$marcas = $marcaClass->agregarNuevoMarca($arrMarca);	
}

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
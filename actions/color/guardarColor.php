<?php
require_once 'classes/color/color.php';
$detalleColor = $_REQUEST['detalleColor'];
$idColor = $_REQUEST['idColor'];
$arrColor = array(
	'detalleColor' => $detalleColor,
	'idColor' => $idColor
);


$colorClass = new color();
if ($idColor) {
	$colores = $colorClass->modificarColor($arrColor);
} else {
	$colores = $colorClass->agregarNuevoColor($arrColor);
       
    }

header('Location: '.$_SERVER['HTTP_REFERER'].'?guardado=ok');
exit;
?>
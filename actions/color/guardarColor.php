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

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaColor=ok');
exit;
?>
<?php
require_once 'classes/color/color.php';
$detalleColor = $_REQUEST['detalleColor'];
$arrColor = array(
	'detalleColor' => $detalleColor
);

$colorClass = new color();
$colores = $colorClass->agregarNuevoColor($arrColor);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
<?php
require_once 'classes/color/color.php';
$idColor = $_REQUEST['idColor'];
$arrColor = array(
	'idColor' => $idColor
);

$colorClass = new color();
$colores = $colorClass->eliminarColor($arrColor);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
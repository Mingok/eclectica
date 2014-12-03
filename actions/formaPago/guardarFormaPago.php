<?php
require_once 'classes/formaPago/formaPago.php';
$detalleFormaPago = $_REQUEST['detalleFormaPago'];
$idFormaPago = $_REQUEST['idFormaPago'];
$arrFormaPago = array(
	'detalleFormaPago' => $detalleFormaPago,
	'idFormaPago' => $idFormaPago
);


$formaPagoClass = new formaPago();
if ($idFormaPago) {
	$formaPagoes = $formaPagoClass->modificarFormaPago($arrFormaPago);
} else {
	$formaPagoes = $formaPagoClass->agregarNuevoFormaPago($arrFormaPago);
       
    }

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaFormaPago=ok');
exit;
?>
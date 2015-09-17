<?php

require_once 'classes/gasto/gasto.php';
$idGasto = $_REQUEST['idGasto'];
$idEmpresaGasto = $_REQUEST['idEmpresaGasto'];
if (isset($_REQUEST['fechaGasto'])&& (!($_REQUEST['fechaGasto']=='')))
{$fechaGasto = $_REQUEST['fechaGasto'];
}else {
    $fechaGasto = date('Y-m-d h:i:s', time());
}
$detalleGasto = $_REQUEST['detalleGasto'];
$importeGasto = $_REQUEST['importeGasto'];
$idProveedorGasto = $_REQUEST['idProveedorGasto'];
$idFormaPagoGasto = $_REQUEST['idFormaPagoGasto'];
//var_dump($fechaGasto);
//exit;
$arrGasto = array(
    'idEmpresaGasto' => $idEmpresaGasto,
    'fechaGasto' => $fechaGasto,
    'detalleGasto' => $detalleGasto,
    'detalleGasto' => $detalleGasto,
    'importeGasto' => $importeGasto,
    'idFormaPagoGasto' => $idFormaPagoGasto,
    'idGasto' => $idGasto,
    'idProveedorGasto' => $idProveedorGasto
);


$gastoClass = new gasto();
if ($idGasto) {
    $gastos = $gastoClass->modificarGasto($arrGasto);
} else {
    $gastos = $gastoClass->agregarNuevoGasto($arrGasto);
}

$url = strtok($_SERVER["HTTP_REFERER"], '?');
header('Location: ' . $url . '?pasar=1');
exit;
?>
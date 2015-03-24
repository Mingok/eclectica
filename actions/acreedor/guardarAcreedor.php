<?php

require_once 'classes/proveedor/proveedor.php';
$nombreProveedor = $_REQUEST['nombreProveedor'];
$acreedorProveedor = $_REQUEST['acreedorProveedor'];
$idProveedor = $_REQUEST['idProveedor'];
$arrProveedor = array(
    'nombreProveedor' => $nombreProveedor,
    'idProveedor'=>$idProveedor,
    'acreedorProveedor'=> $acreedorProveedor
    
);

$proveedorClass = new proveedor();

if ($idProveedor) {
    $arrProveedor['idProveedor'] = $idProveedor;
    $proveedores = $proveedorClass->modificarProveedor($arrProveedor);
} else {
    $proveedores = $proveedorClass->agregarNuevoProveedor($arrProveedor);
}

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaAcreedor=ok');
exit;
?>
exit;

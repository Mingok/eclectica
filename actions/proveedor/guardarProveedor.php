<?php

require_once 'classes/proveedor/proveedor.php';
$nombreProveedor = $_REQUEST['nombreProveedor'];
$cuitProveedor = $_REQUEST['cuitProveedor']; 
$condIvaProveedor = $_REQUEST['condIvaProveedor']; 
$direccionProveedor = $_REQUEST['direccionProveedor']; 
$localidadProveedor = $_REQUEST['localidadProveedor']; 
$telefonoProveedor = $_REQUEST['telefonoProveedor']; 
$contactoProveedor = $_REQUEST['contactoProveedor']; 
$bancoProveedor = $_REQUEST['bancoProveedor']; 
$cbuProveedor = $_REQUEST['cbuProveedor'];
$idProveedor = $_REQUEST['idProveedor'];
$emailProveedor = $_REQUEST['emailProveedor'];
$arrProveedor = array(
	'nombreProveedor' => $nombreProveedor,
    'cuitProveedor' => $cuitProveedor, 
    'condIvaProveedor' => $condIvaProveedor, 
    'direccionProveedor' => $direccionProveedor, 
    'localidadProveedor' => $localidadProveedor, 
    'telefonoProveedor'=> $telefonoProveedor, 
    'contactoProveedor'=> $contactoProveedor, 
    'bancoProveedor' => $bancoProveedor, 
    'emailProveedor' => $emailProveedor, 
    'cbuProveedor' => $cbuProveedor
);

$proveedorClass = new proveedor();

if ($idProveedor) {
	$arrProveedor['idProveedor'] = $idProveedor;
	$proveedores = $proveedorClass->modificarProveedor($arrProveedor);
} else {
	$proveedores = $proveedorClass->agregarNuevoProveedor($arrProveedor);	
}


header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
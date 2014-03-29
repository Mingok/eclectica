<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorClass = new proveedor();
$proveedores = $proveedorClass->camposModificarProveedor($_REQUEST['id']);



$nombreProveedor = $proveedores['nombreProveedor'];
$cuitProveedor = $proveedores['cuitProveedor']; 
/*$condIvaProveedor = $_REQUEST['condIvaProveedor']; 
$direccionProveedor = $_REQUEST['direccionProveedor']; 
$localidadProveedor = $_REQUEST['localidadProveedor']; 
$telefonoProveedor = $_REQUEST['telefonoProveedor']; 
$contactoProveedor = $_REQUEST['contactoProveedor']; 
$bancoProveedor = $_REQUEST['bancoProveedor']; 
$cbuProveedor = $_REQUEST['cbuProveedor'];
$arrProveedor = array(
	'nombreProveedor' => $nombreProveedor,
    'cuitProveedor' => $cuitProveedor, 
    'condIvaProveedor' => $condIvaProveedor, 
    'direccionProveedor' => $direccionProveedor, 
    'localidadProveedor' => $localidadProveedor, 
    'telefonoProveedor'=> $telefonoProveedor, 
    'contactoProveedor'=> $contactoProveedor, 
    'bancoProveedor' => $bancoProveedor, 
    'cbuProveedor' => $cbuProveedor
);

$proveedorClass = new proveedor();
$proveedores = $proveedorClass->camposModificarProveedor($arrProveedor);
*/

header('Location: '.$_SERVER['HTTP_REFERER'].'?nombreProveedor="'.$nombreProveedor.'"');
exit;
var_dump($_REQUEST);var_dump($proveedores); exit;
<?php
require_once 'classes/persona/persona.php';
$idPersona = $_REQUEST['idPersona'];
$dniPersona = $_REQUEST['dniPersona'];
$telTrabajoPersona =$_REQUEST['telTrabajoPersona'];
$trabajoPersona =$_REQUEST['trabajoPersona'];
$nombrePersona = $_REQUEST['nombrePersona'];
$apellidoPersona = $_REQUEST['apellidoPersona'];
$direccionPersona = $_REQUEST['direccionPersona']; 
$localidadPersona = $_REQUEST['localidadPersona']; 
$telefonoPersona = $_REQUEST['telefonoPersona'];
$celuPersona = $_REQUEST['celuPersona']; 
$fechaNacPersona = $_REQUEST['fechaNacPersona']; 
$facebookPersona = $_REQUEST['facebookPersona']; 
$cuentaCorrientePersona = $_REQUEST['cuentaCorrientePersona'];
$arrPersona = array(
    'trabajoPersona'=>$trabajoPersona,
    'dniPersona'=>$dniPersona,
    'telTrabajoPersona'=>$telTrabajoPersona,
	'nombrePersona' => $nombrePersona,
    'apellidoPersona' => $apellidoPersona, 
    'direccionPersona' => $direccionPersona, 
    'localidadPersona' => $localidadPersona, 
    'telefonoPersona'=> $telefonoPersona, 
    'celuPersona'=> $celuPersona, 
    'fechaNacPersona' => $fechaNacPersona, 
    'facebookPersona' => $facebookPersona, 
    'cuentaCorrientePersona' => $cuentaCorrientePersona
);
$personaClass = new persona();
if ($idPersona) {
	$arrPersona['idPersona'] = $idPersona;
	$personas = $personaClass->modificarPersona($arrPersona);
} else {
	$personas = $personaClass->agregarNuevaPersona($arrPersona);	
}


header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
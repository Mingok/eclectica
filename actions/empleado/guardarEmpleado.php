<?php
require_once 'classes/persona/persona.php';
require_once 'classes/entrega/entrega.php';
$idPersona = $_REQUEST['idPersona'];
$dniPersona = $_REQUEST['dniPersona'];
$codigoVendedor =$_REQUEST['codigoVendedor'];
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
    'dniPersona'=>$dniPersona,
    'codigoVendedor'=>$codigoVendedor,
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
$personaClass = new persona();$entregaClass = new entrega();
if ($idPersona) {
	$arrPersona['idPersona'] = $idPersona;
	$personas = $personaClass->modificarPersona($arrPersona);
} else {
	$personas = $personaClass->agregarNuevaPersona($arrPersona);	
        $UltimaPersona = $personaClass->eligeUltimaPersona();
    $arrEntrega = array(
        'idCliente' => $UltimaPersona['idPersona'],
        'valorEntrega' => $cuentaCorrientePersona,
        'inicial' => 'S',
        'fechaEntrega' => date('Y-m-d h:i:s', time())
    );
    
    $entrega = null;
    $entrega = $entregaClass->agregarNuevaEntrega($arrEntrega);
}


header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
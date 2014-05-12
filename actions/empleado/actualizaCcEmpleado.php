<?php
require_once 'classes/persona/persona.php';
$idPersona = $_REQUEST['idPersona'];
$cuentaCorrientePersona = $_REQUEST['cuentaCorrientePersona']-$_REQUEST['entregaCliente'];
$arrPersona = array(
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
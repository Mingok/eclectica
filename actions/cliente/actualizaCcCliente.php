<?php
require_once 'classes/persona/persona.php';
$personaClass = new persona();
$estaPersona = $personaClass->eligePersona($_REQUEST['idPersona']);

$cuentaCorrientePersona = $estaPersona['0']['cuentaCorrientePersona'] - $_REQUEST['entregaCliente'];

$arrPersona = array(
    'cuentaCorrientePersona' => $cuentaCorrientePersona,
    'idPersona' =>  $_REQUEST['idPersona']
);
$persona = null;
$persona = json_encode($personaClass->modificarPersona($arrPersona));

echo $persona;
exit;
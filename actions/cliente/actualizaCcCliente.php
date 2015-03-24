<?php

require_once 'classes/persona/persona.php';
require_once 'classes/entrega/entrega.php';




$idPersona = $_REQUEST['idPersona'];
$entrega = $_REQUEST['entregaCliente'];
$codigoVendedor = $_REQUEST['control'];
$fecEntrega = $_REQUEST['fechaEntrega'];

$fecEntrega = strtotime(str_replace('/', '-', $fecEntrega));
$fecEntrega = date('Y-m-d', $fecEntrega). ' 00:00:00';


$personaClass = new persona();
$cliente = $personaClass->eligePersona($idPersona);
$vendedor = $personaClass->eligeVendedor($codigoVendedor);
if (empty($vendedor)) {
    echo 'error:no_vendedor';
    exit;
}

$cuentaCorrientePersona = doubleval($cliente['cuentaCorrientePersona']) - $entrega;

$arrPersona = array(
    'cuentaCorrientePersona' => $cuentaCorrientePersona,
    'idPersona' => $idPersona
);

$persona = null;

$persona = $personaClass->modificarPersona($arrPersona);

$entregaClass = new entrega();


$arrEntrega = array(
    'idCliente' => $idPersona,
    'idVendedor' => $vendedor['idPersona'],
    'valorEntrega' => $entrega,
    'fechaEntrega' => $fecEntrega,
    'inicial' => 'N'
);
$entrega = null;
$entrega = $entregaClass->agregarNuevaEntrega($arrEntrega);

echo json_encode($persona);
exit;

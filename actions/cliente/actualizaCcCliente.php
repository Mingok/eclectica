<?php
require_once 'classes/persona/persona.php';
require_once 'classes/entrega/entrega.php';

$idPersona = $_REQUEST['idPersona'];
$entrega = $_REQUEST['entregaCliente'];
$codigoVendedor = $_REQUEST['control'];

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
    'idPersona' =>  $idPersona
);

$persona = null;

$persona = $personaClass->modificarPersona($arrPersona);

$entregaClass = new entrega();

$arrEntrega = array(
    'idCliente' => $idPersona,
    'idVendedor' => $vendedor['idPersona'],
    'valorEntrega' => $entrega,
    'fechaEntrega' => date('Y-m-d h:i:s', time()),
    'inicial' => 'N'
);
$entrega = null;
$entrega = $entregaClass->agregarNuevaEntrega($arrEntrega);

echo json_encode($persona);
exit;
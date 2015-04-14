<?php
require_once 'classes/prenda/prenda.php';
require_once 'classes/venta/venta.php';
require_once 'classes/entrega/entrega.php';
require_once 'classes/persona/persona.php';
/*
 * QUEDA POR HACER:
 * - marcar venta con devolucion
 * - marcar renglon con cambio
 * - aumentar en 1 el stock de la prenda
 * - descontar de la cuenta corriente el valor de la prenda
 */
$idClienteVenta = $_REQUEST['idClienteVenta'];
$idVendedor = $_REQUEST['idVendedor'];
$idPrenda = $_REQUEST['idPrenda'];
$idVenta = $_REQUEST['idVenta'];

$obj_venta = new venta();
$obj_prenda = new prenda();
$obj_persona = new persona();
$obj_entrega = new entrega();

/*
 * - marcar venta con devolucion
 * - marcar renglon con cambio
 */
$obj_venta->marcarVentaCambio($idVenta, $idPrenda);

/*
 * - aumentar en 1 el stock de la prenda
 */
$obj_prenda->devolverPrenda($idPrenda);



/*
 * - descontar de la cuenta corriente el valor de la prenda
 */
$precio_vendido = $obj_venta->precioVendidoPrenda($idVenta, $idPrenda);
$cliente = $obj_persona->eligePersona($idClienteVenta);
$cuentaCorrientePersona = doubleval($cliente['cuentaCorrientePersona']) - $precio_vendido;

$arrPersona = array(
    'cuentaCorrientePersona' => $cuentaCorrientePersona,
    'idPersona' =>  $idClienteVenta
);

$persona = $obj_persona->modificarPersona($arrPersona);

$arrEntrega = array(
    'idCliente' => $idClienteVenta,
    'idVendedor' => $idVendedor,
    'valorEntrega' => $precio_vendido,
    'fechaEntrega' => date('Y-m-d h:i:s', time()),
    'inicial' => 'C',
    'tipo' => 'C'
);
$entrega = null;
$entrega = $obj_entrega->agregarNuevaEntrega($arrEntrega);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;   
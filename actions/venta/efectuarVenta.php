<?php

require_once 'classes/prenda/prenda.php';
require_once 'classes/venta/venta.php';
require_once 'classes/ventaRenglon/ventaRenglon.php';
$idVendedor         = $_REQUEST['idVendedorVenta'];
$idClienteVenta     = $_REQUEST['idClienteVenta'];
$entrega            = $_REQUEST['entrega'];
$totalCompra        = $_REQUEST['totalCompra'];
$totalCosto         = $_REQUEST['totalCosto'];
$items_venta        = $_REQUEST['venta'];
$condVenta          = $_REQUEST['condVenta'];
$fecVenta           = $_REQUEST['fecVenta'];
$observacionVenta =  $_REQUEST['observacionVenta'];

$saldo = $entrega - $totalCompra;

$obj_prenda = new prenda();
$obj_venta = new venta();
$obj_venta_renglon = new ventaRenglon();

$arrNuevaVenta = array();
$arrNuevaVenta['estado'] = 'V';//vendido
$arrNuevaVenta['idCliente'] = $idClienteVenta;
$arrNuevaVenta['idVendedor'] = $idVendedor;
$arrNuevaVenta['precioVenta'] = $totalCompra;
$arrNuevaVenta['costoVenta'] = $totalCosto;
$arrNuevaVenta['entregaCliente'] = $entrega;
$arrNuevaVenta['condicionVentaGeneral'] = $condVenta;
$arrNuevaVenta['observacionVenta'] = $observacionVenta;

if (empty($fecVenta)) {
    $fecVenta = time();
    $arrNuevaVenta['fechaVenta'] = date('Y-m-d h:i:s', $fecVenta);
} else {
    $fecVenta = strtotime(str_replace('/', '-', $fecVenta));
    $arrNuevaVenta['fechaVenta'] = date('Y-m-d', $fecVenta). ' 00:00:00';
}
$arrNuevaVenta['fechaVenta'] = date('Y-m-d h:i:s', $fecVenta);
$nueva_venta = $obj_venta->agregarNuevaVenta($arrNuevaVenta);

$ultima_venta = $obj_venta->obtenerUltimaVenta();
foreach ($items_venta as $item_venta) {
    $prenda = $obj_prenda->eligePrendaDesdeCodigo($item_venta['codItemVenta']);
    
    //actualizo la cantidad de la prenda
    $cant_actualizada = (int)$prenda['cantidadPrenda'] - (int)$item_venta['cantidadItemVenta'];
    $arrPrenda = array(
        'idPrenda' => $prenda['idPrenda'],
        'cantidadPrenda' => $cant_actualizada
    );
    $obj_prenda->modificarPrenda($arrPrenda);
    
    //armamos el array del renglon
    $arrVentaRenglon = array();
    $arrVentaRenglon['idVenta'] = $ultima_venta['idVenta'];
    $arrVentaRenglon['idPrenda'] = $prenda['idPrenda'];
    $arrVentaRenglon['cantidadPrenda'] = $item_venta['cantidadItemVenta'];
    $arrVentaRenglon['idTipoVenta'] = $item_venta['idCondItemVenta'];
    $arrVentaRenglon['precioVendido'] = $item_venta['precioItemVenta'];
    //insertamos el renglon;
    $obj_venta_renglon->agregarNuevaVentaRenglon($arrVentaRenglon);
}

if ($saldo != 0) {
    require_once 'classes/entrega/entrega.php';
    require_once 'classes/persona/persona.php';
    
    $personaClass = new persona();
    $cliente = $personaClass->eligePersona($idClienteVenta);
    $cuentaCorrientePersona = doubleval($cliente['cuentaCorrientePersona']) - $saldo;

    $arrPersona = array(
        'cuentaCorrientePersona' => $cuentaCorrientePersona,
        'idPersona' =>  $idClienteVenta
    );
    $persona = $personaClass->modificarPersona($arrPersona);

    $entregaClass = new entrega();
    $arrEntrega = array(
        'idCliente' => $idClienteVenta,
        'idVendedor' => $idVendedor,
        'valorEntrega' => $saldo,
        'inicial'=>'NM',
        'fechaEntrega' => date('Y-m-d h:i:s', time())
    );
    $entrega = null;
    $entrega = $entregaClass->agregarNuevaEntrega($arrEntrega);

}
header('Location: '.$_SERVER['HTTP_REFERER']);
exit;   
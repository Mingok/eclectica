<?php
require_once 'classes/prenda/prenda.php';
$order = $_REQUEST['order'];
$offset = $_REQUEST['start'];
$limit = $_REQUEST['length'];
$search = $_REQUEST['search']['value'];
$prendaList = new prenda ();
$options = array();
if ($order) {
    $options['order']=$order;    
}
if ($offset) {
    $options['offset']=$offset;    
}
if ($limit) {
    $options['limit']=$limit;    
}
if ($search) {
    $options['search']=$search;    
}
$prendas = $prendaList->prendasDisponiblesListado($options);
$options['count'] = TRUE;
$prendas_totales = $prendaList->prendasDisponiblesListado($options);

$response = array();
$response['aaData'] = array();
$response['bSortable'] = false;
$response['draw'] = $_REQUEST['draw'];
$response['recordsTotal'] = $prendas_totales;
$response['recordsFiltered'] = $prendas_totales;

foreach ($prendas as $prenda) {
    $row = array();
    $precios_prenda = $prendaList->preciosPrenda($prenda['idPrenda']);
    $row[]= "<a title='Devolver' class='itemDev' id='itemDev' href='#'
                            data-cantidadprenda='{$prenda ['cantidadPrenda']}' 
                            data-idprenda='{$prenda ['idPrenda']}' 
                            data-idestampadoprenda='{$prenda ['idEstampadoPrenda']}' 
                            data-idtelaprenda='{$prenda ['idTelaPrenda']}' 
                            data-idtalleprenda='{$prenda ['idTallePrenda']}' 
                            data-codigoprenda='{$prenda ['codigoPrenda']}' 
                            data-detalleprenda='{$prenda ['detallePrenda']}' 
                            data-idmarcaprenda='{$prenda ['idMarcaPrenda']}' 
                            data-idproveedorprenda='{$prenda ['idProveedorPrenda']}' 
                            data-idestacionprenda='{$prenda ['idEstacionPrenda']}' 
                            data-idcolorprenda='{$prenda ['idColorPrenda']}' 
                            data-valor1='{$precios_prenda[0]['valor']}' 
                            data-valor2='{$precios_prenda[1]['valor']}' 
                            data-valor3='{$precios_prenda[2]['valor']}' 
                            data-valor4='{$precios_prenda[3]['valor']}' 
                            data-valor5='{$precios_prenda[4]['valor']}' 
                            data-valor6='{$precios_prenda[5]['valor']}' 
                            data-valor7='{$precios_prenda[6]['valor']}' 
                            data-valor8='{$precios_prenda[7]['valor']}' 
                            data-valor9='{$precios_prenda[8]['valor']}' 
                            data-valor10='{$precios_prenda[9]['valor']}' 
                            data-valor11='{$precios_prenda[10]['valor']}' />
                <img src='imagenes/iconos/accept.png' width='18px' height='18px' />
            </a>";
    
    $row[] = $prenda ['codigoPrenda'];

    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detallePrenda'])));
    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detalleTalle'])));
    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detalleColor'])));
    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detalleEstampado'])));
    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detalleTela'])));
    $row[] = utf8_encode(ucfirst(strtolower($prenda ['detalleEstacion'])));

    $response['aaData'][] =  array_values($row);
}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($response);

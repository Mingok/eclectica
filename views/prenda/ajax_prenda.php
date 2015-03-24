<?php
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles();
$response = array();

foreach ($prendas as $prenda) {
    $row = array();
    /*
    $row[]= "<a title='Modificar datos' href='#prenda' class='editButtonPrenda' name='editButtonPrenda'
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
                            data-valor1='{$prenda ['valor1']}' 
                            data-valor2='{$prenda ['valor2']}' 
                            data-valor3='{$prenda ['valor3']}' 
                            data-valor4='{$prenda ['valor4']}' 
                            data-valor5='{$prenda ['valor5']}' 
                            data-valor6='{$prenda ['valor6']}' 
                            data-valor7='{$prenda ['valor7']}' 
                            data-valor8='{$prenda ['valor8']}' 
                            data-valor9='{$prenda ['valor9']}' 
                            data-valor10='{$prenda ['valor10']}' 
                            data-valor11='{$prenda ['valor11']}' />
                <img src='../../imagenes/iconos/layout_edit.png' width='18px' height='18px' />
            </a>";
    $row[] = "<a title='copiar' href='#prenda' class='buttonCopiar' name='buttonCopiar' 
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
                            data-valor1='{$prenda ['valor1']}'
                            data-valor2='{$prenda ['valor2']}'
                            data-valor3='{$prenda ['valor3']}'
                            data-valor4='{$prenda ['valor4']}'
                            data-valor5='{$prenda ['valor5']}'
                            data-valor6='{$prenda ['valor6']}'
                            data-valor7='{$prenda ['valor7']}'
                            data-valor8='{$prenda ['valor8']}'
                            data-valor9='{$prenda ['valor9']}'
                            data-valor10='{$prenda ['valor10']}'
                            data-valor11='{$prenda ['valor11']}' />
                <img src='../../imagenes/iconos/copiar.png' width='18px' height='18px' />
            </a>";
    $row[] = "<a class='fancyboxPrecios' id='fancyboxPrecios'
                href='./indexPreciosPrenda.php?idPrenda={$prenda ['idPrenda']}'>
                {$prenda ['codigoPrenda']}
            </a>";*/
    $row[] = ucfirst(strtolower($prenda ['detallePrenda']));

    $row[] = ucfirst(strtolower($prenda ['detalleTalle']));
    $row[] = ucfirst(strtolower($prenda ['detalleColor']));
    $row[] = ucfirst(strtolower($prenda ['detalleEstampado']));
    $row[] = ucfirst(strtolower($prenda ['detalleTela']));
    $row[] = ucfirst(strtolower($prenda ['detalleEstacion']));
/*
    if (isset($prenda['cantidadPrenda']) && ($prenda['cantidadPrenda'] == '0')) {
        $row[] = "<div style='background-color: red; font-weight: bolder;text-align: center;'>{$prenda ['cantidadPrenda']}</div>";
    } else {
        $row[] = "<div style='text-align: center;' >{$prenda ['cantidadPrenda']}</div>";
    }*/
    $response[] =  array_values($row);
}
echo "<pre>";
var_dump($response);
var_dump(json_encode($response));
switch (json_last_error()) {
    case JSON_ERROR_NONE:
        echo ' - No errors';
        break;
    case JSON_ERROR_DEPTH:
        echo ' - Maximum stack depth exceeded';
        break;
    case JSON_ERROR_STATE_MISMATCH:
        echo ' - Underflow or the modes mismatch';
        break;
    case JSON_ERROR_CTRL_CHAR:
        echo ' - Unexpected control character found';
        break;
    case JSON_ERROR_SYNTAX:
        echo ' - Syntax error, malformed JSON';
        break;
    case JSON_ERROR_UTF8:
        echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
    default:
        echo ' - Unknown error';
        break;
}
echo "<pre>";
exit;
echo json_encode($response);

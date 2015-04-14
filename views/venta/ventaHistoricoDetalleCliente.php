<?php

require_once 'classes/ventaRenglon/ventaRenglon.php';
require_once 'classes/venta/venta.php';
require_once 'classes/persona/persona.php';
$obj_Persona = new persona();
$obj_venta = new venta();
$ventaRenglonClass = new ventaRenglon();
$idMiVenta = $_REQUEST['idMiVenta'];

$ultima_venta = null;
$renglones = null;
$renglones = $ventaRenglonClass->ventaParticular($idMiVenta);
$ultima_venta = $obj_venta->obtenerEstaVenta($idMiVenta);
$estaVenta = null;

$estaVenta = $obj_Persona->eligePersona($ultima_venta['idCliente']);

echo '
    <div class="panel panel-default">
        <div class="panel-heading">  
            <div class="row" style="text-align: right; padding-right: 20px;">
                <table  style="width: 100%">
                    <tr>
                        <td style="text-align: left; width: 20%; padding-left: 20px;">
                            <h3 class="panel-title">
                                <table style="width:100%">
                                    <tr>
                                        
                                        <td>';
echo $estaVenta['nombrePersona'] . " " . $estaVenta['apellidoPersona'];
echo'</td>
                                        <td style="text-align: right">                                            ';
echo date('d/m/Y', strtotime($ultima_venta['fechaVenta']));
echo'
                                        </td>
                                    </tr>
                                </table>
                            </h3>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" >
                    <table class="table table-condensed" id="tblPrendaVenta">
                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                            <tr>
                                <td>
                                    Cnt.
                                </td>
                                <td>
                                    Detalle
                                </td>
                                <td>
                                    Condicion
                                </td>
                                <td>
                                    P. U.
                                </td>
                                <td>
                                    P. T. Vendido
                                </td>
                            </tr>
                        </thead>
                        <tbody>';
foreach ($renglones as $renglon) {
//    var_dump($renglon);
    if ($renglon['estado'] == 'C') {
        echo '<tr bgcolor="#FF0000">';
    } else {
        echo '<tr >';
    }
    echo '        <td style="text-align: left;">';
    echo $renglon['cantidadPrenda'];
    echo'</td>
                                        <td style="text-align: left;">';
    echo ucfirst(strtolower($renglon['detallePrenda']));
    echo'</td>
                                        <td style="text-align: left;">';
    echo ucfirst(strtolower($renglon['detalleTipoVenta']));
    echo'</td>
                                        <td style="text-align: right;">';
    echo '$ ' . number_format($renglon['precioVendido'], 2);
    echo'</td>
                                        <td style="text-align: right;">';
    $aux = $renglon['precioVendido'] * $renglon['cantidadPrenda'];
    echo '$ ' . number_format($aux, 2);
    echo'</td>
                                </tr>';
}
echo'</tbody>
                    </table>
                </div> 
            </div>
        </div>
       
        <div class="panel-heading" style="text-align: right;"><h4 class="panel-title">  ';
echo'Total: $';
$aux2 = $ultima_venta['precioVenta'];
echo '' . number_format($aux2, 2);

echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo'Entrega: $';
$aux2 = $ultima_venta['entregaCliente'];
echo '' . number_format($aux2, 2);

//echo ' </h4></div></div>';
//var_dump(); exit;
echo '

            <div class="row" style="text-align: left; padding-right: 20px;">
                <div class="col-md-12" >'
;
echo '<br>Observacion:' . $ultima_venta['observacionVenta'] . '<br><br>';
echo'</div></div>';

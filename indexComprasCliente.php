<?php
require_once 'classes/venta/venta.php';
require_once 'classes/persona/persona.php'; 
$idCliente = $_REQUEST['idCliente'];
$personaList=new persona(); 
$personas=$personaList->eligePersona($idCliente); 
$obj_venta = new venta();
$idCliente = $_REQUEST['idCliente'];

$moviemientos_cliente = $obj_venta->movimientosCliente($idCliente);

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">';
echo '<h3 class="panel-title"><table style="width:100%"><tr><td>Historial de Movimientos</td><td style="text-align: right"><h4>C.C.:$'.$personas["cuentaCorrientePersona"].'</h4></td></tr></table></h3>';
echo '</div>';
echo '<div class="panel-body">';
echo '<div class="row scrol"> ';
echo '<table class="table table-condensed">';
echo '<thead>';
echo '<tr style="text-align: center;">';
echo '<td><strong>Fecha</strong></td>';
echo '<td><strong>Tipo</strong></td>';
echo '<td><strong>Valor</strong></td>';
echo '</tr>';
echo '</thead>';
if (!empty($moviemientos_cliente)) {
    foreach ($moviemientos_cliente as $moviemiento) {
        echo '<tr style="text-align: center">';
        echo '<td>'.date('d/m/Y', strtotime($moviemiento['fecha'])).'</td>';
        echo '<td>'.$moviemiento['tipo'].'</td>';
        echo '<td>'.number_format($moviemiento['valor'],2).'</td>';
        echo '</tr>';
    }
}
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
exit;
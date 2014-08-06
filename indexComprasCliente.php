<?php
require_once 'classes/venta/venta.php';
require_once 'classes/persona/persona.php';
$idCliente = $_REQUEST['idCliente'];
$personaList = new persona();
$personas = $personaList->eligePersona($idCliente);
$obj_venta = new venta();
$obj_venta1 = new venta();
$idCliente = $_REQUEST['idCliente'];
$idPrenda = isset($_REQUEST['idPrenda'])?$_REQUEST['idPrenda']:NULL;

$moviemientos_cliente = $obj_venta->movimientosCliente($idCliente,$idPrenda);

echo '<div class="panel panel-default" >';
echo '<div class="panel-heading">';
echo '<h3 class="panel-title"><table style="width:100%"><tr><td>Historial de Movimientos</td><td style="text-align: right"><h4>C.C.:$' . $personas["cuentaCorrientePersona"] . '</h4></td></tr></table></h3>';
echo '</div>';
echo '<div class="panel-body">';
echo '<div class="row scrol"> ';
echo '<table class="table table-condensed">';
echo '<thead class="btn-success" style="font-weight: bolder; text-align: center;">';
echo '<tr style="text-align: center;">';
if(!is_null($idPrenda)) {
    echo '<td><strong>Sel</strong></td>';
}
echo '<td><strong>Fecha</strong></td>';
echo '<td><strong>Tipo</strong></td>';
echo '<td><strong>Vendido</strong></td>';
echo '<td><strong>Entregado</strong></td>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
if (!empty($moviemientos_cliente)) {
    foreach ($moviemientos_cliente as $moviemiento) {
        if ($moviemiento['Inicial'] == 'S')
            $moviemiento['tipo'] = 'Saldo Inicial';
       
        switch ($moviemiento['tipo']){
            case 'Saldo Inicial': 
                echo '<tr style="text-align: center; background-color:#aaaaaa;font-weight: bolder;color:#ffffff">';
                echo '<td>' . date('d/m/Y', strtotime($moviemiento['fecha'])) . '</td>';
                echo '<td>' . $moviemiento['tipo'] . '</td>';
                echo '<td>' . number_format($moviemiento['valor'], 2) . '</td>';
                echo '<td></td>';
                break;
            case 'Venta': 
                $ventita = $obj_venta1->obtenerEstaVenta($moviemiento['numero']);
                echo '<tr style="text-align: center; background-color:#cccccc;font-weight: bolder;">';
                if(!is_null($idPrenda)) {
                    echo '<td>';
                    echo "<a title='Devolver' class='ventaDev' id='ventaDev' data-idventa='{$moviemiento['numero']}' >";
                    echo "<img src='./imagenes/iconos/accept.png' width='18px' height='18px' />";
                    echo "</a>";
                    echo '</td>';
                }
            
                echo '<td>' . date('d/m/Y', strtotime($moviemiento['fecha'])) . '</td>';
                echo '<td ><a id="fancyboxRenglon" class="miVenta" data-idEstaVenta="' . $moviemiento['numero'] . '" href="#historicoDetalleCliente">' . $moviemiento['tipo'] . '</a></td>';    
                echo '<td>' . number_format($moviemiento['valor'], 2) . '</td>';

                echo '<td>'.number_format($ventita['entregaCliente'],2).'</td>';
            
                break;
            case 'Entrega': 
                if ($moviemiento['Inicial'] != 'NM'){
                   
                echo '<tr style="text-align: center;background-color:#dddddd;font-weight: bolder;">';
                echo '<td>' . date('d/m/Y', strtotime($moviemiento['fecha'])) . '</td>';
            echo '<td > '. $moviemiento['tipo'] .'</td>';    
            echo '<td></td>';
            
            echo '<td>' . number_format($moviemiento['valor'], 2) . '</td>';
                }
                break;
            
        }
        
        
        echo '</tr>';
    }
}
echo'</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

<script type="text/javascript">
    $('.miVenta').click(function() {
        $('input[name=estaVenta]').val($(this).data('idestaventa'));
        var url = './views/venta/ventaHistoricoDetalleCliente.php';
        var idMiVenta = $('#estaVenta').val();
        var esteCliente = $('#cliente1').val();
        $.ajax({
            type: "POST",
            url: url,
            data: {'idMiVenta': idMiVenta}, 
            success: function(data) {
                if (data) {
                    $('.movimientosVentaRenglon').html(data);
                }
            }
        });
    });
</script>

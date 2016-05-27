<?php
if ($_GET['action'] == 'listar') {
    $ds = DIRECTORY_SEPARATOR;
    require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT * FROM (
                SELECT tmp.*, vr.cantidadPrenda FROM (
                    SELECT venta.*, 
                            CONCAT(persona.apellidoPersona, ', ', persona.nombrePersona) AS detalleCliente,
                            CONCAT(persona1.apellidoPersona, ', ', persona1.nombrePersona) AS detalleVendedor
                            FROM venta AS venta
                            JOIN persona AS persona ON venta.idCliente = persona.idPersona
                            JOIN persona AS persona1 ON venta.idVendedor = persona1.idPersona 
                            WHERE venta.estado='V') tmp
                            JOIN 
                            (SELECT idVenta, SUM(cantidadPrenda) AS cantidadPrenda FROM venta_renglon GROUP BY idVenta)
                            vr ON tmp.idVenta = vr.idVenta) final ";
    $arrayFiltro = array();

    // valores recibidos por POST
    if (isset($_POST['selecEmpleado'])) {
        if ($_POST['selecEmpleado'] != '') {
            $arrayFiltro[] = "idVendedor = " . $_POST['selecEmpleado'];
        }
    }

    if (isset($_POST['selecCliente'])) {
        if ($_POST['selecCliente'] != '') {
            $arrayFiltro[] = "idCliente = " . $_POST['selecCliente'];
        }
    }

    if (isset($_POST['fecDesde'])) {
        if ($_POST['fecDesde'] != '') {
            $date = str_replace('/', '-', $_POST['fecDesde']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
            $arrayFiltro[] = "fechaVenta >= '" . $fecha . "'";
        }
    }

    if (isset($_POST['fecHasta'])) {
        if ($_POST['fecHasta'] != '') {
            $date = str_replace('/', '-', $_POST['fecHasta']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
            $arrayFiltro[] = "fechaVenta <= '" . $fecha . "'";
        }
    }



    // Vericamos si hay algun filtro

    $auxArray = implode(' AND ', $arrayFiltro);
    if (count($arrayFiltro) != 0) {
        $sql .= " WHERE ";
        $sql.=$auxArray;
    }


    // Ordenar por
    $vorder = isset($_POST['orderby']) ? $_POST['orderby'] : '';

    if ($vorder != '') {
        $sql .= " ORDER BY " . $vorder;
    }
//    echo "<pre>";
//    var_dump($sql);
//    echo "</pre>";
//    exit;
    $objManejoMySQL->consultar($sql, $arrResultado);
    $str_final = '';
    if (!empty($arrResultado)) {
        $precio_venta = 0;
        $entrega = 0;
        $costo = 0;
        $prendas = 0;
        foreach ($arrResultado as $registro) {
            $str_final .= '<tr>';
            $str_final .= '<td>' . date('d/m/Y H:i', strtotime($registro['fechaVenta'])) . ' hs</td>';
            $str_final .= '<td>' . $registro['detalleCliente'] . '</td>';
            $str_final .= '<td>' . $registro['precioVenta'] . '</td>';
            $str_final .= '<td>' . $registro['entregaCliente'] . '</td>';
            $str_final .= '<td>' . $registro['costoVenta'] . '</td>';
            $str_final .= '<td>' . $registro['cantidadPrenda'] . '</td>';
            $str_final .= '<td >' . $registro['detalleVendedor'] . '</td>';
            if ($registro['observacionVenta'] != NULL) {
                $str_final .= '<td style="text-align:center"> <a id="fancyboxRenglon" class="miVenta" data-idEstaVenta="' . $registro['idVenta'] . '" href="#historicoDetalleCliente">
                        <img src="./imagenes/iconos/informes.png" height="24px" title="Ver venta" />
                       
                    </a></td>';
            } else {
                $str_final .= '<td style="text-align:center">-</td>';
            }

            $str_final .= '</tr>';
            $precio_venta += intval($registro['precioVenta']);
            $entrega += intval($registro['entregaCliente']);
            $costo += intval($registro['costoVenta']);
            $prendas += intval($registro['cantidadPrenda']);
        }
        $str_final .= '<tr>';
        $str_final .= '<td colspan="2"><b>TOTAL</b></td>';
        $str_final .= '<td><b>' . $precio_venta . '</b></td>';
        $str_final .= '<td><b>' . $entrega . '</b></td>';
        $str_final .= '<td><b>' . $costo . '</b></td>';
        $str_final .= '<td colspan="3"><b>' . $prendas . '</b></td>';
        $str_final .= '</tr>';
    } else {
        $str_final .= '<tr><td colspan="8" align="center">No se encontraron ventas.</td></tr>';
    }

    // convertimos el array de datos a formato json
//	echo json_encode($array_final);

    echo $str_final;
}
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
                    $.fancybox({
                        maxWidth: 700,
                        maxHeight: 400,
                        closeEffect: 'elastic',
                        href: '#historicoDetalleCliente'
                    });
                }
            }
        });
    });
</script>

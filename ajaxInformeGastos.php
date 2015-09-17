<?php

if ($_GET['action'] == 'listar') {
    $ds = DIRECTORY_SEPARATOR;
    require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT gasto.*, proveedor.nombreProveedor, empresa.nombreEmpresa, formaPago.detalleFormaPago FROM gasto AS gasto
            LEFT JOIN proveedor AS proveedor ON gasto.idProveedorGasto = proveedor.idProveedor
            LEFT JOIN empresa AS empresa ON gasto.idEmpresaGasto = empresa.idEmpresa
            LEFT JOIN formaPago AS formaPago ON gasto.idFormaPagoGasto = formaPago.idFormaPago";
    $arrayFiltro = array();
    // valores recibidos por POST

    if (isset($_POST['idFormaPagoGasto'])) {
        if ($_POST['idFormaPagoGasto'] != '') {
            $arrayFiltro[] = "idFormaPagoGasto = " . $_POST['idFormaPagoGasto'];
        }
    }
    if (isset($_POST['idProveedorGasto'])) {
        if ($_POST['idProveedorGasto'] != '') {
            $arrayFiltro[] = "idProveedorGasto = " . $_POST['idProveedorGasto'];
        }
    }
    if (isset($_POST['detalleGasto'])) {
        if ($_POST['detalleGasto'] != '') {
            $arrayFiltro[] = "detalleGasto = " . $_POST['detalleGasto'];
        }
    }
    if (isset($_POST['importeGasto'])) {
        if ($_POST['importeGasto'] != '') {
            $arrayFiltro[] = "importeGasto = " . $_POST['importeGasto'];
        }
    }

    if (isset($_POST['fecDesde'])) {
        if ($_POST['fecDesde'] != '') {
            $date = str_replace('/', '-', $_POST['fecDesde']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
            $arrayFiltro[] = "fechaGasto >= '" . $fecha . "'";
        }
    }

    if (isset($_POST['fecHasta'])) {
        if ($_POST['fecHasta'] != '') {
            $date = str_replace('/', '-', $_POST['fecHasta']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
            $arrayFiltro[] = "fechaGasto <= '" . $fecha . "'";
        }
    }
    // Vericamos si hay algun filtro

    $auxArray = implode(' AND ', $arrayFiltro);
    if (count($arrayFiltro) != 0) {
        $sql .= " WHERE ";
        $sql.=$auxArray;
        $sql .= " ORDER BY fechaGasto DESC";
    }else {$sql .= " ORDER BY fechaGasto DESC";}


    // Ordenar por
    $vorder = isset($_POST['orderby']) ? $_POST['orderby'] : '';

    if ($vorder != '') {
        $sql .= " ORDER BY " . $vorder  ;
    }
    
//    echo "<pre>";
//    var_dump($sql);
//    echo "</pre>";
//    exit;

    $objManejoMySQL->consultar($sql, $arrResultado);
    $str_final = '';
    if (!empty($arrResultado)) {
        $precio_gasto = 0;

        foreach ($arrResultado as $registro) {
            $str_final .= '<tr>';
            $str_final .= '<td >' . date('d/m/Y', strtotime($registro['fechaGasto'])) . '</td>';
            $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
            $str_final .= '<td>' . $registro['detalleFormaPago'] . '</td>';
            $str_final .= '<td>' . $registro['detalleGasto'] . '</td>';
            $str_final .= '<td style="text-align:right">' . $registro['importeGasto'] . '</td>';
            $str_final .= '</tr>';
            $precio_gasto += intval($registro['importeGasto']);
        }
        $str_final .= '<tr>';
        $str_final .= '<td colspan="4" style="text-align:right"><b>TOTAL</b></td>';
        $str_final .= '<td style="text-align:right"><b>' . $precio_gasto . '</b></td>';
        $str_final .= '<td></td>';
        $str_final .= '<td></td>';
        $str_final .= '</tr>';
    } else {
        $str_final .= '<tr><td colspan="5" align="center">No se encontraron Gastos y Costos.</td></tr>';
    }

    // convertimos el array de datos a formato json
//	echo json_encode($array_final);

    echo $str_final;
}
?>
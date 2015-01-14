<?php

if ($_GET['action'] == 'listar') {
    $ds = DIRECTORY_SEPARATOR;
    require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT proveedor.nombreProveedor, formaPago.detalleFormaPago, sum(gasto.importeGasto) as importeGasto FROM gasto AS gasto
            JOIN proveedor AS proveedor ON gasto.idProveedorGasto = proveedor.idProveedor
            JOIN formaPago AS formaPago ON gasto.idFormaPagoGasto = formaPago.idFormaPago ";

    $arrayFiltro = array();

    // valores recibidos por POST

    if (isset($_POST['fecDesde'])) {
        if ($_POST['fecDesde'] != '') {
            $date = str_replace('/', '-', $_POST['fecDesde']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
            $arrayFiltro[] = "gasto.fechaGasto >= '" . $fecha . "'";
        }
    }

    if (isset($_POST['fecHasta'])) {
        if ($_POST['fecHasta'] != '') {
            $date = str_replace('/', '-', $_POST['fecHasta']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
            $arrayFiltro[] = "gasto.fechaGasto <= '" . $fecha . "'";
        }
    }
    // Vericamos si hay algun filtro

    $auxArray = implode(' AND ', $arrayFiltro);
    if (count($arrayFiltro) != 0) {
        $sql .= " and ";
        $sql.=$auxArray;
        
    }


    // Ordenar por
    $vorder = isset($_POST['orderby']) ? $_POST['orderby'] : '';
    $sql.= " group by `idFormaPago`";
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
        foreach ($arrResultado as $registro) {
            
            $str_final .= '<tr>';
            $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
            $str_final .= '<td>' . $registro['detalleFormaPago'] . '</td>';
            $str_final .= '<td>' . $registro['importeGasto'] . '</td>';
            
            $str_final .= '</tr>';
            
        }
       
    } else {
        $str_final .= '<tr><td colspan="8" align="center">No se encontraron ventas.</td></tr>';
    }

    // convertimos el array de datos a formato json
//	echo json_encode($array_final);

    echo $str_final;
}
?>
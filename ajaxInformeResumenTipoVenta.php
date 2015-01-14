
<?php

if ($_GET['action'] == 'listar') {
    $ds = DIRECTORY_SEPARATOR;
    require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT vr.`idTipoVenta`, `detalleTipoVenta`, sum(vr.`precioVendido`) as precioVendido 
            FROM `venta_renglon` vr JOIN venta v ON v.idVenta = vr.idVenta 
            join tipoventa tv on tv.idTipoVenta = vr.idTipoVenta WHERE vr.`estado` = 'V'";
    $arrayFiltro = array();

    // valores recibidos por POST

    if (isset($_POST['fecDesde'])) {
        if ($_POST['fecDesde'] != '') {
            $date = str_replace('/', '-', $_POST['fecDesde']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 00:00:00';
            $arrayFiltro[] = "v.fechaVenta >= '" . $fecha . "'";
        }
    }

    if (isset($_POST['fecHasta'])) {
        if ($_POST['fecHasta'] != '') {
            $date = str_replace('/', '-', $_POST['fecHasta']);
            $fecha = date('Y-m-d', strtotime($date)) . ' 23:59:59';
            $arrayFiltro[] = "v.fechaVenta <= '" . $fecha . "'";
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
    $sql.= " group by `idTipoVenta`";
    if ($vorder != '') {
        $sql .= " ORDER BY " . $vorder;
    }
//    echo "<pre>";
//    var_dump($sql);
//    echo "</pre>";
//    exit;
//    var_dump($sql);
    $objManejoMySQL->consultar($sql, $arrResultado);
    $str_final = '';
    if (!empty($arrResultado)) {
        $precio_venta = 0;
        $entrega = 0;
        foreach ($arrResultado as $registro) {
            
            $str_final .= '<tr>';
            $str_final .= '<td>' . $registro['detalleTipoVenta'] . '</td>';
            $str_final .= '<td>' . $registro['precioVendido'] . '</td>';
            
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
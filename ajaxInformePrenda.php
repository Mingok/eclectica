<?php

if ($_GET['action'] == 'listar') {
    $ds = DIRECTORY_SEPARATOR;
    require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado, 
                        tela.detalleTela, talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca
			FROM prenda AS prenda 
			LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
			LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
			LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
			LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
			LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
			LEFT JOIN estacion AS estacion ON prenda.idEstacionPrenda = estacion.idEstacion
			LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca
			";
    $arrayFiltro = array();
   
    
   
   
    // valores recibidos por POST
    if ( $_POST['detallePrenda'] != '') {
        $arrayFiltro[] = " CONCAT(detallePrenda,' ', codigoPrenda) LIKE '%".$_POST['detallePrenda']."%'";
    }
    if ($_POST['idTela'] != '') {
        $arrayFiltro[] = " prenda.idTelaPrenda = " . $_POST['idTela'];
    }
    if ($_POST['idMarca'] != '') {
        $arrayFiltro[] = " prenda.idMarcaPrenda = " . $_POST['idMarca'];
    }
    if ($_POST['idEstacion'] !=''){    
         $arrayFiltro[] = " prenda.idEstacionPrenda = " . $_POST['idEstacion'];
    }
    if ($_POST['idEstampado'] !=''){    
         $arrayFiltro[] = " prenda.idEstampadoPrenda = " . $_POST['idEstampado'];
    }
    if ($_POST['idColor'] !=''){    
         $arrayFiltro[] = " prenda.idColorPrenda = " . $_POST['idColor'];
    }
    if ($_POST['idTalle'] !=''){    
         $arrayFiltro[] = " prenda.idTallePrenda = " . $_POST['idTalle'];
    }
//        
   


    // Vericamos si hay algun filtro
	
         $auxArray = implode(' AND ', $arrayFiltro);
    if (count($arrayFiltro) != 0) {
        $sql .= "WHERE";
        $sql.=$auxArray;
    }


    // Ordenar por
    $vorder = isset($_POST['orderby']) ? $_POST['orderby'] : '';

    if ($vorder != '') {
        $sql .= " ORDER BY " . $vorder;
    }
//	$sql .= " limit 21 ";

    $objManejoMySQL->consultar($sql, $arrResultado);
    $str_final = '';
    if (!empty($arrResultado)) {
    foreach ($arrResultado as $registro) {
        $str_final .= '<tr>';
        $str_final .= '<td>' . $registro['codigoPrenda'] . '</td>';
        $str_final .= '<td>' . date('d-m-Y', strtotime($registro['fechaPrenda'])) . '</td>';
        $str_final .= '<td>' . $registro['detallePrenda'] . '</td>';
        $str_final .= '<td>' . $registro['detalleTalle'] . '</td>';
        $str_final .= '<td>' . $registro['detalleColor'] . '</td>';
        $str_final .= '<td>' . $registro['detalleEstampado'] . '</td>';
        $str_final .= '<td>' . $registro['detalleTela'] . '</td>';
        $str_final .= '<td>' . $registro['detalleEstacion'] . '</td>';
        $str_final .= '<td>' . $registro['detalleMarca'] . '</td>';
        $str_final .= '<td>' . $registro['nombreProveedor'] . '</td>';
        $str_final .= '<td>' . $registro['cantidadPrenda'] . '</td>';
        $str_final .= '</tr>';
    }
    }else {$str_final .= '<tr><td colspan=10" align="center">No se encontraron prendas.</td></tr>';}

    // convertimos el array de datos a formato json
//	echo json_encode($array_final);

    echo $str_final;
}
?>
<?php 
if($_GET['action'] == 'listar') {
        require_once (__DIR__ . '\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL ();
	// valores recibidos por POST
	$filtro_tela   = isset($_POST['idTela'])?$_POST['idTela']:'';
	
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
										
	// Vericamos si hay algun filtro
//	$sql .= ($vnm != '')      ? " AND CONCAT(nombre,' ', email) LIKE '%$vnm%'" : "";
        if ($filtro_tela != '') {
            $sql .= "WHERE prenda.idTelaPrenda = $filtro_tela"; 
        }
        
	
	// Ordenar por
	$vorder = isset($_POST['orderby'])?$_POST['orderby']:'';
	
	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}
//	$sql .= " limit 21 ";
        
	$objManejoMySQL->consultar($sql, $arrResultado);
        $str_final = '';
        foreach ($arrResultado as $registro) {
            $str_final .= '<tr>';
            $str_final .= '<td>' . $registro['codigoPrenda'] . '</td>';
            $str_final .= '<td>' . $registro['detallePrenda'] . '</td>';
            $str_final .= '<td>' . $registro['detalleTalle'] . '</td>';
            $str_final .= '<td>' . $registro['detalleColor'] . '</td>';
            $str_final .= '<td>' . $registro['detalleEstampado'] . '</td>';
            $str_final .= '<td>' . $registro['detalleTela'] . '</td>';
            $str_final .= '<td>' . $registro['detalleEstacion'] . '</td>';
            $str_final .= '<td>' . $registro['cantidadPrenda'] . '</td>';

            $str_final .= '</tr>';
        }
        
	// convertimos el array de datos a formato json
//	echo json_encode($array_final);
    
	echo $str_final;
}

?>
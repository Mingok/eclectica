<?php

if ($_GET['action'] == 'listar') {
    require_once (__DIR__ . '\base\manejoMySQL.php');

    $objManejoMySQL = new manejoMySQL ();
    $sql = "SELECT * FROM (
                SELECT venta.*, 
                        CONCAT(persona.apellidoPersona, ', ', persona.nombrePersona) as detalleCliente,
                        CONCAT(persona1.apellidoPersona, ', ', persona1.nombrePersona) as detalleVendedor
			FROM venta AS venta
			JOIN persona AS persona ON venta.idCliente = persona.idPersona
			JOIN persona AS persona1 ON venta.idVendedor = persona1.idPersona
			) tmp ";
    $arrayFiltro = array();
   
    
   
   
    // valores recibidos por POST
    if (isset($_POST['selectEmpleado'])) {
        if ($_POST['selectEmpleado'] !=''){    
             $arrayFiltro[] = "idVendedor = " . $_POST['selectEmpleado'];
        }      
    }
   
    if (isset($_POST['fecDesde'])) {
        if ($_POST['fecDesde'] !=''){
            $date = str_replace('/', '-', $_POST['fecDesde']);
            $fecha = date('Y-m-d',strtotime($date)).' 00:00:00';
            $arrayFiltro[] = "fechaVenta >= '" . $fecha . "'";
        }      
    }
   
    if (isset($_POST['fecHasta'])) {
        if ($_POST['fecHasta'] !='') {
            $date = str_replace('/', '-', $_POST['fecHasta']);
            $fecha = date('Y-m-d',strtotime($date)).' 23:59:59';
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

    $objManejoMySQL->consultar($sql, $arrResultado);
    $str_final = '';
    if (!empty($arrResultado)) {
        foreach ($arrResultado as $registro) {
            $str_final .= '<tr>';
            $str_final .= '<td>' . $registro['fechaVenta'] . '</td>';
            $str_final .= '<td>' . $registro['detalleCliente'] . '</td>';
            $str_final .= '<td>' . $registro['precioVenta'] . '</td>';
            $str_final .= '<td>' . $registro['entregaCliente'] . '</td>';
            $str_final .= '<td>' . $registro['detalleVendedor'] . '</td>';
            $str_final .= '</tr>';
        }
    }

    // convertimos el array de datos a formato json
//	echo json_encode($array_final);

    echo $str_final;
}
?>
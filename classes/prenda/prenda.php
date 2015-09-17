<?php

class prenda {

    public function prendasDisponibles() {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL ();
        $strSql = "SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado, tela.detalleTela,
					talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca,
					tvp1.valor as valor1, tvp2.valor as valor2, tvp3.valor as valor3, tvp4.valor as valor4, tvp5.valor as valor5,
					tvp6.valor as valor6, tvp7.valor as valor7, tvp8.valor as valor8, tvp9.valor as valor9, tvp10.valor as valor10, tvp11.valor as valor11
			FROM prenda AS prenda 
			LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
			LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
			LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
			LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
			LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
			LEFT JOIN estacion AS estacion ON prenda.idEstacionPrenda = estacion.idEstacion
			LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca
			LEFT JOIN tipoventa_prenda AS tvp1 ON tvp1.idPrenda = prenda.idPrenda AND tvp1.idTipoVenta = 1
			LEFT JOIN tipoventa_prenda AS tvp2 ON tvp2.idPrenda = prenda.idPrenda AND tvp2.idTipoVenta = 2
            LEFT JOIN tipoventa_prenda AS tvp3 ON tvp3.idPrenda = prenda.idPrenda AND tvp3.idTipoVenta = 3
            LEFT JOIN tipoventa_prenda AS tvp4 ON tvp4.idPrenda = prenda.idPrenda AND tvp4.idTipoVenta = 4
            LEFT JOIN tipoventa_prenda AS tvp5 ON tvp5.idPrenda = prenda.idPrenda AND tvp5.idTipoVenta = 5
            LEFT JOIN tipoventa_prenda AS tvp6 ON tvp6.idPrenda = prenda.idPrenda AND tvp6.idTipoVenta = 6
            LEFT JOIN tipoventa_prenda AS tvp7 ON tvp7.idPrenda = prenda.idPrenda AND tvp7.idTipoVenta = 7
            LEFT JOIN tipoventa_prenda AS tvp8 ON tvp8.idPrenda = prenda.idPrenda AND tvp8.idTipoVenta = 8
            LEFT JOIN tipoventa_prenda AS tvp9 ON tvp9.idPrenda = prenda.idPrenda AND tvp9.idTipoVenta = 9
            LEFT JOIN tipoventa_prenda AS tvp10 ON tvp10.idPrenda = prenda.idPrenda AND tvp10.idTipoVenta = 10
            LEFT JOIN tipoventa_prenda AS tvp11 ON tvp11.idPrenda = prenda.idPrenda AND tvp11.idTipoVenta = 11
            
			ORDER BY prenda.`idPrenda` desc";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;

        //        if ($arrResultado){
        //        	$prendaList = new prenda();
        //			$prendas = $prendaList->ordenarTablaPrenda($arrResultado);
        //       		return $prendas;
        //        }
    }

    public function prendasDisponiblesListado($options = array()) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $objManejoMySQL = new manejoMySQL ();
        $order = isset($options['order'])?$options['order']:FALSE;
        $offset = isset($options['offset'])?$options['offset']:'0';
        $limit = isset($options['limit'])?$options['limit']:'10';
        $count = isset($options['count'])?$options['count']:FALSE;
        $search = isset($options['search'])?$options['search']:FALSE;
        
        $strSQL_order = "ORDER BY prenda.`idPrenda` desc";
        $strSQL_limit = "";
        if ($limit && !$count) {
            $strSQL_limit = "LIMIT $offset, $limit";            
        }
        $strSQL_search = "";
        if ($search) {
            $strSQL_search = " WHERE CONCAT(detallePrenda,' ', codigoPrenda) LIKE '%$search%'";            
        }
        
        $strSql = "SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado, tela.detalleTela,
					talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca
			FROM prenda AS prenda 
			LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
			LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
			LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
			LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
			LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
			LEFT JOIN estacion AS estacion ON prenda.idEstacionPrenda = estacion.idEstacion
			LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca
			$strSQL_search
                        $strSQL_order
                        $strSQL_limit
                ";
        if ($count) {
            $strSql = "SELECT count(*) as total
			FROM prenda
                        $strSQL_search";
        }
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if ($count) {
            return $arrResultado[0]['total'];
        }
        return $arrResultado;
    }

    public function eligePrendaDesdeCodigo($lngCodigoPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT * FROM `prenda` where codigoPrenda=$lngCodigoPrenda";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }

    public function eligePrenda($lngIdPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT * FROM `prenda` where idPrenda=$lngIdPrenda";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }

    public function agregarNuevoPrenda($arrPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL ();
        foreach ($arrPrenda as $nombreCampo => $valorCampo) {
            $strValoresCampos .= $strValoresCampos == '' ? '' : ',';
            $strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
            if (is_null($valorCampo)) {
                $strValoresCampos .= 'null';
            } else {
                if (gettype($valorCampo) == 'string') {
                    $strValoresCampos .= "'$valorCampo'";
                } else {
                    $strValoresCampos .= "$valorCampo";
                }
            }
        }

        $strSql = "INSERT INTO `prenda`($strNombresCampos) VALUES($strValoresCampos)";

        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        return $arrResultado;
    }

    public function agregarNuevoPrecioPrenda($arrPrecioPrenda, $id) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL ();
        $strSql = "SELECT idPrenda FROM prenda ORDER BY idPrenda DESC LIMIT 1;";
        $prendaId = null;
        $objManejoMySQL->consultar($strSql, $prendaId);

        foreach ($prendaId as $nombreCampo1 => $valorCampo1) {
            $varPrenda = $valorCampo1;
        }

        $cont = 0;
        foreach ($arrPrecioPrenda as $nombreCampo => $valorCampo) {
            $cont ++;
            $strSql = "INSERT INTO `tipoventa_prenda`(`valor`, `idTipoVenta`, `idPrenda`) 
        			VALUES ('$valorCampo','$cont','$id')";

            $arrResultado = null;
            $objManejoMySQL->consultar($strSql, $arrResultado);
        }
        return $arrResultado;
    }

    /* 	public function eliminarColor($objColor){
      require_once (__DIR__.'/../../base/manejoMySQL.php');

      $objManejoMySQL = new manejoMySQL();
      $lngIdColor = $objColor['idColor'];
      $strSql = "DELETE FROM `color` WHERE `idColor`=$lngIdColor";
      $arrResultado = null;
      $objManejoMySQL->consultar($strSql, $arrResultado);
      return $arrResultado;
      }
     */

    public function modificarPrenda($arrPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrPrenda as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idPrenda') {
                $strUpdate .= $strUpdate == '' ? '' : ',';
                if (is_null($valorCampo)) {
                    $strUpdate .= "$nombreCampo='null'";
                } else {
                    if (gettype($valorCampo) == 'string') {
                        $strUpdate .= "`$nombreCampo`='" . rtrim($valorCampo) . "'";
                    } else {
                        $strUpdate .= "`$nombreCampo` = $valorCampo";
                    }
                }
            } else {
                $lngIdPrenda = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL ();
        $strSql = "UPDATE `prenda` SET $strUpdate
					WHERE `idPrenda`=$lngIdPrenda";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarPrecioPrenda($arrPrecioPrenda, $id) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta1']) . " WHERE `idTipoVenta`=1 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta2']) . " WHERE `idTipoVenta`=2 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta3']) . " WHERE `idTipoVenta`=3 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta4']) . " WHERE `idTipoVenta`=4 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta5']) . " WHERE `idTipoVenta`=5 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta6']) . " WHERE `idTipoVenta`=6 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta7']) . " WHERE `idTipoVenta`=7 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta8']) . " WHERE `idTipoVenta`=8 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta9']) . " WHERE `idTipoVenta`=9 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta10']) . " WHERE `idTipoVenta`=10 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        $strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval($arrPrecioPrenda ['tipoVenta11']) . " WHERE `idTipoVenta`=11 AND`idPrenda`=" . $id;
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);

        return $arrResultado;
    }

    public function preciosPrenda($idPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strSql = "
		SELECT * FROM `tipoventa_prenda` `tvp`
		JOIN  `tipoVenta` as tv ON tv.idTipoVenta = tvp.idTipoVenta 
		WHERE `tvp`.`idPrenda`=$idPrenda
		ORDER BY tv.`idTipoVenta`";
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function devolverPrenda($lngIdPrenda) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strSql = "UPDATE `prenda` SET `cantidadPrenda` = (`cantidadPrenda`+1 ) WHERE `idPrenda`=$lngIdPrenda";
        $objManejoMySQL = new manejoMySQL ();
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

<?php
class prenda {
	public function prendasDisponibles() {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL ();
		$strSql = "SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado, tela.detalleTela,
					talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca,
					tvp1.valor as valor1, tvp2.valor as valor2, tvp3.valor as valor3, tvp4.valor as valor4, tvp5.valor as valor5,
					tvp6.valor as valor6
			FROM prenda AS prenda 
			LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
			LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
			LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
			LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
			LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
			LEFT JOIN estacion AS estacion ON prenda.idEstacionPrenda = estacion.idEstacion
			LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca
			JOIN tipoventa_prenda AS tvp1 ON tvp1.idPrenda = prenda.idPrenda AND tvp1.idTipoVenta = 1
			JOIN tipoventa_prenda AS tvp2 ON tvp2.idPrenda = prenda.idPrenda AND tvp2.idTipoVenta = 2
            JOIN tipoventa_prenda AS tvp3 ON tvp3.idPrenda = prenda.idPrenda AND tvp3.idTipoVenta = 3
            JOIN tipoventa_prenda AS tvp4 ON tvp4.idPrenda = prenda.idPrenda AND tvp4.idTipoVenta = 4
            JOIN tipoventa_prenda AS tvp5 ON tvp5.idPrenda = prenda.idPrenda AND tvp5.idTipoVenta = 5
            JOIN tipoventa_prenda AS tvp6 ON tvp6.idPrenda = prenda.idPrenda AND tvp6.idTipoVenta = 6
			ORDER BY prenda.`cantidadPrenda` desc";
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		return $arrResultado;
	
		//        if ($arrResultado){
	//        	$prendaList = new prenda();
	//			$prendas = $prendaList->ordenarTablaPrenda($arrResultado);
	//       		return $prendas;
	//        }
	}
	
	/*   	public function ordenarTablaPrenda($prendaList){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		foreach ($prendaList as $key => $row) {
             $aux[$key] = $row['cantidadPrenda'];
            }
        array_multisort($aux, SORT_ASC ,$prendaList);
        	return $prendaList;
		}*/
	
	public function agregarNuevoPrenda($arrPrenda) {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL ();
		foreach ( $arrPrenda as $nombreCampo => $valorCampo ) {
			$strValoresCampos .= $strValoresCampos == '' ? '' : ',';
			$strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
			if (is_null ( $valorCampo )) {
				$strValoresCampos .= 'null';
			} else {
				if (gettype ( $valorCampo ) == 'string') {
					$strValoresCampos .= "'$valorCampo'";
				} else {
					$strValoresCampos .= "$valorCampo";
				}
			}
		}
		
		$strSql = "INSERT INTO `prenda`($strNombresCampos) VALUES($strValoresCampos)";
		
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		return $arrResultado;
	}
	
	public function agregarNuevoPrecioPrenda($arrPrecioPrenda, $id) {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL ();
		$strSql = "SELECT idPrenda FROM prenda ORDER BY idPrenda DESC LIMIT 1;";
		$prendaId = null;
		$objManejoMySQL->consultar ( $strSql, $prendaId );
		
		foreach ( $prendaId as $nombreCampo1 => $valorCampo1 ) {
			$varPrenda = $valorCampo1;
		}
		
		$cont = 0;
		foreach ( $arrPrecioPrenda as $nombreCampo => $valorCampo ) {
			$cont ++;
			$strSql = "INSERT INTO `tipoventa_prenda`(`valor`, `idTipoVenta`, `idPrenda`) 
        			VALUES ('$valorCampo','$cont','$id')";
			
			$arrResultado = null;
			$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		}
		return $arrResultado;
	}
	
	/*	public function eliminarColor($objColor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdColor = $objColor['idColor'];
		$strSql = "DELETE FROM `color` WHERE `idColor`=$lngIdColor";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
*/
	public function modificarPrenda($arrPrenda) {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ( $arrPrenda as $nombreCampo => $valorCampo ) {
			if ($nombreCampo != 'idPrenda') {
				$strUpdate .= $strUpdate == '' ? '' : ',';
				if (is_null ( $valorCampo )) {
					$strUpdate .= "$nombreCampo='null'";
				} else {
					if (gettype ( $valorCampo ) == 'string') {
						$strUpdate .= "`$nombreCampo`='" . rtrim ( $valorCampo ) . "'";
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
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		return $arrResultado;
	}
	
	public function modificarPrecioPrenda($arrPrecioPrenda, $id) {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta1'] ) . " WHERE `idTipoVenta`=1 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta2'] ) . " WHERE `idTipoVenta`=2 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta3'] ) . " WHERE `idTipoVenta`=3 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta4'] ) . " WHERE `idTipoVenta`=4 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta5'] ) . " WHERE `idTipoVenta`=5 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		$strSql = "UPDATE `tipoventa_prenda` SET `valor`=" . floatval ( $arrPrecioPrenda ['tipoVenta6'] ) . " WHERE `idTipoVenta`=6 AND`idPrenda`=" . $id;
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		
		return $arrResultado;
	}
	
	public function preciosPrenda($idPrenda) {
		require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
		$strSql = "
		SELECT * FROM `tipoventa_prenda` `tvp`
		JOIN  `tipoVenta` as tv ON tv.idTipoVenta = tvp.idTipoVenta 
		WHERE `tvp`.`idPrenda`=$idPrenda
		ORDER BY tv.`idTipoVenta`";
		$objManejoMySQL = new manejoMySQL ();
		$arrResultado = null;
		$objManejoMySQL->consultar ( $strSql, $arrResultado );
		return $arrResultado;
	}

}


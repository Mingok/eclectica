<?php
Class prenda {
	public function prendasDisponibles(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT prenda.*, proveedor.nombreProveedor, color.detalleColor , estampado.detalleEstampado, tela.detalleTela,talle.detalleTalle, estacion.detalleEstacion, marca.detalleMarca
FROM prenda AS prenda 
LEFT JOIN proveedor AS proveedor ON prenda.idProveedorPrenda = proveedor.idProveedor
LEFT JOIN color AS color ON prenda.idColorPrenda = color.idColor
LEFT JOIN estampado AS estampado ON prenda.idEstampadoPrenda = estampado.idEstampado
LEFT JOIN tela AS tela ON prenda.idTelaPrenda = tela.idTela
LEFT JOIN talle AS talle ON prenda.idTallePrenda = talle.idTalle
LEFT JOIN estacion AS estacion ON prenda.idTallePrenda = estacion.idEstacion
LEFT JOIN marca AS marca ON prenda.idMarcaPrenda = marca.idMarca;";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado); var_dump($arrResultado);
        if ($arrResultado){
        $prendaList = new prenda();
				$prendas = $prendaList->ordenarTablaPrenda($arrResultado);
       	return $prendas;
        }
	}
    
    	public function ordenarTablaPrenda($prendaList){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		foreach ($prendaList as $key => $row) {
             $aux[$key] = $row['cantidadPrenda'];
            }
        array_multisort($aux, SORT_ASC ,$prendaList);
        	return $prendaList;
		}
		
	/*SELECT p.detallePrenda, p.cantidadPrenda, t.detalleTalle, c.detalleColor
FROM prenda AS p
LEFT JOIN talle AS t ON p.idTallePrenda = t.idTalle
LEFT JOIN color AS c ON p.idColorPrenda = c.idColor;*/
	public function agregarNuevoPrenda($arrPrenda){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrPrenda as $nombreCampo=>$valorCampo){
			$strValoresCampos .= $strValoresCampos == '' ? '' : ',';
			$strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
			if(is_null($valorCampo)){
				$strValoresCampos .= 'null';
			}else{
				if(gettype($valorCampo) == 'string'){
					$strValoresCampos .= "'$valorCampo'";
				}else{
					$strValoresCampos .= "$valorCampo";
				}
			}
		}
		
		$strSql = "INSERT INTO `prenda`($strNombresCampos) VALUES($strValoresCampos)";
        
        
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);

		return $arrResultado;
	}
    
    public function agregarNuevoPrecioPrenda($arrPrecioPrenda){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT idPrenda FROM prenda ORDER BY idPrenda DESC LIMIT 1;";
        $prendaId = null;
		$objManejoMySQL->consultar($strSql, $prendaId);
        
        
         foreach ($prendaId as $nombreCampo1=>$valorCampo1){
            $varPrenda=$valorCampo1;
            }
      
        $cont=0;
        foreach ($arrPrecioPrenda as $nombreCampo=>$valorCampo){
        $cont++;
		$strSql = "INSERT INTO `tipoventa_prenda`(`idTipoVenta_Prenda`, `detalleTipoVenta_Prenda`, `valor`, `idTipoVenta`, `idPrenda`) 
        VALUES ('','".$nombreCampo."','".$valorCampo."','".$cont."','".$varPrenda['idPrenda']."')";
  
        $arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);

		
        
        }
        return $arrResultado;
	}
    
    
    
    
    
	
	public function eliminarColor($objColor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdColor = $objColor['idColor'];
		$strSql = "DELETE FROM `color` WHERE `idColor`=$lngIdColor";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
	public function modificarColor($arrColor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrColor as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idColor'){
				$strUpdate .= $strUpdate == '' ? '' : ',';
				if(is_null($valorCampo)){
					$strUpdate .= "$nombreCampo='null'";
				}else{
					if(gettype($valorCampo) == 'string'){
						$strUpdate .= "`$nombreCampo`='" . rtrim($valorCampo) . "'";
					}else{
						$strUpdate .= "`$nombreCampo` = $valorCampo";
					}
				}
			}else{
				$lngIdColor = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `color` SET $strUpdate
					WHERE `idColor`=$lngIdColor";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
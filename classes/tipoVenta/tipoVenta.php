<?php
Class tipoVenta {
	public function tipoVentasDisponibles(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `tipoVenta`
					ORDER BY `detalleTipoVenta` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
	
	
	public function modificarTipoVenta($arrTipoVenta){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrTipoVenta as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idTipoVenta'){
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
				$lngIdTipoVenta = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `tipoVenta` SET $strUpdate
					WHERE `idTipoVenta` = $lngIdTipoVenta";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
?>
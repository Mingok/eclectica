<?php
Class tipoVenta {
	public function tipoVentasDisponibles(){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `tipoVenta`
					ORDER BY `idTipoVenta` ASC";
        $arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
	public function tipoVentasFiltro($filtro){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `tipoVenta` WHERE grupoTipoVenta=".$filtro." ORDER BY `idTipoVenta` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
	public function modificarTipoVenta($arrTipoVenta){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
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
<?php
Class talle {
	public function tallesDisponibles(){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `talle`
					ORDER BY length(detalleTalle),detalleTalle ASC";
                  
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}

    public function eligeTalle($id){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `talle` where idTalle=".$id;
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
	
	public function agregarNuevoTalle($arrTalle){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrTalle as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `talle`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/* public function eliminarTalle($objTalle){
		require_once (__DIR__.'/../../base/manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdTalle = $objTalle['idTalle'];
		$strSql = "DELETE FROM `talle` WHERE `idTalle`=$lngIdTalle";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}*/
	
	public function modificarTalle($arrTalle){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrTalle as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idTalle'){
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
				$lngIdTalle = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `talle` SET $strUpdate
					WHERE `idTalle`=$lngIdTalle";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
<?php
Class tela {
	public function telasDisponibles(){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `tela`
					ORDER BY `detalleTela` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}

    public function eligeTela($id){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `tela` where idTela=".$id;
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
	
	public function agregarNuevoTela($arrTela){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrTela as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `tela`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/* public function eliminarTela($objTela){
		require_once (__DIR__.'/../../base/manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdTela = $objTela['idTela'];
		$strSql = "DELETE FROM `tela` WHERE `idTela`=$lngIdTela";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}*/
	
	public function modificarTela($arrTela){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrTela as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idTela'){
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
				$lngIdTela = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `tela` SET $strUpdate
					WHERE `idTela`=$lngIdTela";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
?>
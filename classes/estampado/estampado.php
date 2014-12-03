<?php
Class estampado {
	public function estampadosDisponibles(){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `estampado`
					ORDER BY `detalleEstampado` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}

    public function eligeEstampado($id){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `estampado` where idEstampado=".$id;
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
	
	public function agregarNuevoEstampado($arrEstampado){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrEstampado as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `estampado`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/* public function eliminarEstampado($objEstampado){
		require_once (__DIR__.'/../../base/manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdEstampado = $objEstampado['idEstampado'];
		$strSql = "DELETE FROM `estampado` WHERE `idEstampado`=$lngIdEstampado";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}*/
	
	public function modificarEstampado($arrEstampado){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrEstampado as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idEstampado'){
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
				$lngIdEstampado = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `estampado` SET $strUpdate
					WHERE `idEstampado`=$lngIdEstampado";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
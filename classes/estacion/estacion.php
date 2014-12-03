<?php
Class estacion {
	public function estacionesDisponibles(){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `estacion`
					ORDER BY `detalleEstacion` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}

    public function eligeEstacion($id){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `estacion` where idEstacion=".$id;
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
	
	public function agregarNuevoEstacion($arrEstacion){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrEstacion as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `estacion`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/*	public function eliminarEstacion($objEstacion){
		require_once (__DIR__.'/../../base/manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdEstacion = $objEstacion['idEstacion'];
		$strSql = "DELETE FROM `Estacion` WHERE `idEstacion`=$lngIdEstacion";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
*/	
	public function modificarEstacion($arrEstacion){
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrEstacion as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idEstacion'){
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
				$lngIdEstacion = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `estacion` SET $strUpdate
					WHERE `idEstacion`=$lngIdEstacion";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
}
?>
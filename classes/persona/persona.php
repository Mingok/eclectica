<?php
Class persona {
	public function eligePersona($id){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT * FROM `persona` where idPersona=".$id;
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
                if (!empty($arrResultado)) {
                    $arrResultado = current($arrResultado);
                }
		return $arrResultado;
	}
        public function eligeUltimaPersona(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT * FROM `persona` order by idPersona desc limit 1 ";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
                if (!empty($arrResultado)) {
                    $arrResultado = current($arrResultado);
                }
		return $arrResultado;
                
	}
        public function eligeVendedor($codVendedor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT * FROM `persona` where codigoVendedor='$codVendedor'";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
                if (!empty($arrResultado)) {
                    $arrResultado = current($arrResultado);
                }
		return $arrResultado;
	}
	public function personasDisponibles(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT * FROM `persona`";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
        public function vendedoresDisponibles(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="SELECT * FROM `persona` WHERE codigoVendedor IS NOT NULL";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	public function agregarNuevaPersona($arrPersona){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrPersona as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `persona`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/*	public function eliminarcliente($objcliente){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdPersona = $objcliente['idPersona'];
		$strSql = "DELETE FROM `cliente` WHERE `idPersona`=$lngIdPersona";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
*/
/*public function camposModificarcliente($id){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$objManejoMySQL = new manejoMySQL();
		$strSql = "SELECT * FROM `cliente` WHERE `idPersona`=$id";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
		
		
	}*/	
	public function modificarPersona($arrPersona){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrPersona as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idPersona'){
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
				$lngIdPersona = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `persona` SET $strUpdate
					WHERE `idPersona` = $lngIdPersona";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}


}
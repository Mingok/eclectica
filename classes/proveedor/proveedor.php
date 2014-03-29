<?php
Class proveedor {
	public function proveedoresDisponibles(){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL= new manejoMySQL();
		$strSql="	SELECT * FROM `proveedor`
					ORDER BY `nombreProveedor` ASC";
		$arrResultado=null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
	public function agregarNuevoProveedor($arrProveedor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$objManejoMySQL = new manejoMySQL();
		foreach ($arrProveedor as $nombreCampo=>$valorCampo){
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
		
		$strSql = "INSERT INTO `proveedor`($strNombresCampos) VALUES($strValoresCampos)";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
	
/*	public function eliminarProveedor($objProveedor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
		$objManejoMySQL = new manejoMySQL();
		$lngIdProveedor = $objProveedor['idProveedor'];
		$strSql = "DELETE FROM `proveedor` WHERE `idProveedor`=$lngIdProveedor";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}
*/	
	public function modificarProveedor($arrProveedor){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$strValoresCampos = "";
		$strNombresCampos = "";
		$strUpdate = "";
		foreach ($arrProveedor as $nombreCampo=>$valorCampo){
			if($nombreCampo != 'idProveedor'){
				$strUpdate .= $strUpdate == '' ? '' : ',';
				if(is_null($valorProveedor)){
					$strUpdate .= "$nombreCampo='null'";
				}else{
					if(gettype($valorCampo) == 'string'){
						$strUpdate .= "`$nombreCampo`='" . rtrim($valorCampo) . "'";
					}else{
						$strUpdate .= "`$nombreCampo` = $valorCampo";
					}
				}
			}else{
				$lngIdProveedor = $valorCampo;
			}
		}
		
		$objManejoMySQL = new manejoMySQL();
		$strSql = "UPDATE `proveedor` SET $strUpdate
					WHERE `idProveedor`=$lngIdProveedor";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
	}

public function camposModificarProveedor($id){
		require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		$objManejoMySQL = new manejoMySQL();
		$strSql = "SELECT * FROM `proveedor` WHERE `idProveedor`=$id";
		$arrResultado = null;
		$objManejoMySQL->consultar($strSql, $arrResultado);
		return $arrResultado;
		
		
	}
}
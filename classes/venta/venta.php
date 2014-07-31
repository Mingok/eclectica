<?php

Class venta {

    public function ventasDisponibles() {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $strSql = "	SELECT * FROM `venta`
					ORDER BY `idVenta` ASC";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }
    public function movimientosCliente($lngIdCliente) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $strSql = " SELECT * FROM (
                        SELECT 	idVenta AS numero, 
                                fechaVenta AS fecha,
                                'Venta' AS tipo,
                                'N' AS Inicial,
                                precioVenta AS valor
                                FROM `venta` WHERE idCliente=$lngIdCliente
                        UNION ALL
                        SELECT 	idEntrega AS numero, 
                                fechaEntrega AS fecha, 
                                'Entrega' AS tipo,
                                inicial AS Inicial,
                                valorEntrega AS valor 
                                FROM `entrega` WHERE idCliente=$lngIdCliente
                    ) tmp ORDER BY fecha DESC";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function agregarNuevaVenta($arrVenta) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL();
        foreach ($arrVenta as $nombreCampo => $valorCampo) {
            $strValoresCampos .= $strValoresCampos == '' ? '' : ',';
            $strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
            if (is_null($valorCampo)) {
                $strValoresCampos .= 'null';
            } else {
                if (gettype($valorCampo) == 'string' || $nombreCampo == 'fechaVenta') {
                    $strValoresCampos .= "'$valorCampo'";
                } else {
                    $strValoresCampos .= "$valorCampo";
                }
            }
        }

        $strSql = "INSERT INTO `venta`($strNombresCampos) VALUES($strValoresCampos)";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }
    
    public function obtenerUltimaVenta() {
        require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `venta` ORDER BY `idVenta` DESC LIMIT 1";
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
    public function obtenerEstaVenta($idMiVenta){
        require_once (__DIR__.'\..\..\base\manejoMySQL.php');
		
        $objManejoMySQL= new manejoMySQL();
        $strSql="SELECT * FROM `venta` WHERE idVenta=".$idMiVenta;
        $arrResultado=null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        if (!empty($arrResultado)) {
            $arrResultado = current($arrResultado);
        }
        return $arrResultado;
    }
    public function eliminarVenta($objVenta) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $lngIdVenta = $objVenta['idVenta'];
        $strSql = "DELETE FROM `venta` WHERE `idVenta`=$lngIdVenta";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarVenta($arrVenta) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrVenta as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idVenta') {
                $strUpdate .= $strUpdate == '' ? '' : ',';
                if (is_null($valorCampo)) {
                    $strUpdate .= "$nombreCampo='null'";
                } else {
                    if (gettype($valorCampo) == 'string') {
                        $strUpdate .= "`$nombreCampo`='" . rtrim($valorCampo) . "'";
                    } else {
                        $strUpdate .= "`$nombreCampo` = $valorCampo";
                    }
                }
            } else {
                $lngIdVenta = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL();
        $strSql = "UPDATE `venta` SET $strUpdate
					WHERE `idVenta`=$lngIdVenta";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

?>
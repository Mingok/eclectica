<?php

Class gasto {

    public function gastoDisponibles() {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $hoy = date('d-m-Y');
        $fecha = strtotime('-30 day', strtotime($hoy));
        $fecha= date ( 'Ymd' , $fecha );

        $objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT gasto.*, proveedor.nombreProveedor, empresa.nombreEmpresa, formaPago.detalleFormaPago FROM gasto AS gasto
            LEFT JOIN proveedor AS proveedor ON gasto.idProveedorGasto = proveedor.idProveedor
            LEFT JOIN empresa AS empresa ON gasto.idEmpresaGasto = empresa.idEmpresa
            LEFT JOIN formaPago AS formaPago ON gasto.idFormaPagoGasto = formaPago.idFormaPago
					";
        $strSql.="WHERE gasto.fechaGasto >= ".$fecha . " ORDER BY `fechaGasto` DESC";
        
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function agregarNuevoGasto($arrGasto) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL();
        foreach ($arrGasto as $nombreCampo => $valorCampo) {
            $strValoresCampos .= $strValoresCampos == '' ? '' : ',';
            $strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
            if (is_null($valorCampo)) {
                $strValoresCampos .= 'null';
            } else {
                if (gettype($valorCampo) == 'string') {
                    $strValoresCampos .= "'$valorCampo'";
                } else {
                    $strValoresCampos .= "$valorCampo";
                }
            }
        }

        $strSql = "INSERT INTO `gasto`($strNombresCampos) VALUES($strValoresCampos)";
        $arrResultado = null;

        $objManejoMySQL->consultar($strSql, $arrResultado);

        return $arrResultado;
    }

    public function eliminarGasto($objGasto) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $lngIdGasto = $objGasto['idGasto'];
        $strSql = "DELETE FROM `gasto` WHERE `idGasto`=$lngIdGasto";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarGasto($arrGasto) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrGasto as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idGasto') {
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
                $lngIdGasto = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL();
        $strSql = "UPDATE `gasto` SET $strUpdate
					WHERE `idGasto`=$lngIdGasto";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

?>

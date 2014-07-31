<?php

Class ventaRenglon {

    public function ventaRenglonesDisponibles() {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT ventaRenglon.*,  prenda.detallePrenda, tipoVenta.detalleTipoVenta FROM `venta_renglon` as ventaRenglon
                   LEFT JOIN prenda AS prenda ON ventaRenglon.idPrenda = prenda.idPrenda
                   LEFT JOIN tipoVenta AS tipoVenta ON ventaRenglon.idTipoVenta = tipoVenta.idTipoVenta
					";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }
    public function ventaParticular($idVentaParticular) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $strSql = "SELECT ventaRenglon.*,  prenda.detallePrenda, tipoVenta.detalleTipoVenta FROM `venta_renglon` as ventaRenglon
                   LEFT JOIN prenda AS prenda ON ventaRenglon.idPrenda = prenda.idPrenda
                   LEFT JOIN tipoVenta AS tipoVenta ON ventaRenglon.idTipoVenta = tipoVenta.idTipoVenta
					WHERE ventaRenglon.idVenta=".$idVentaParticular;
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function agregarNuevaVentaRenglon($arrVentaRenglon) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL();
        foreach ($arrVentaRenglon as $nombreCampo => $valorCampo) {
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

        $strSql = "INSERT INTO `venta_renglon`($strNombresCampos) VALUES($strValoresCampos)";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function eliminarVentaRenglon($objVentaRenglon) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $lngIdVentaRenglon = $objVentaRenglon['idVentaRenglon'];
        $strSql = "DELETE FROM `venta_renglon` WHERE `idVentaRenglon`=$lngIdVentaRenglon";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarVentaRenglon($arrVentaRenglon) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrVentaRenglon as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idVentaRenglon') {
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
                $lngIdVentaRenglon = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL();
        $strSql = "UPDATE `venta_renglon` SET $strUpdate
					WHERE `idVentaRenglon`=$lngIdVentaRenglon";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

?>
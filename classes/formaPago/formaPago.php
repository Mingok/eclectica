<?php

Class formaPago {

    public function formaPagoDisponibles() {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $strSql = "	SELECT * FROM `formaPago`
					ORDER BY `detalleFormaPago` ASC";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function agregarNuevoFormaPago($arrFormaPago) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL();
        foreach ($arrFormaPago as $nombreCampo => $valorCampo) {
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

        $strSql = "INSERT INTO `formaPago`($strNombresCampos) VALUES($strValoresCampos)";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function eliminarFormaPago($objFormaPago) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');

        $objManejoMySQL = new manejoMySQL();
        $lngIdFormaPago = $objFormaPago['idFormaPago'];
        $strSql = "DELETE FROM `formaPago` WHERE `idFormaPago`=$lngIdFormaPago";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarFormaPago($arrFormaPago) {
        require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrFormaPago as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idFormaPago') {
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
                $lngIdFormaPago = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL();
        $strSql = "UPDATE `formaPago` SET $strUpdate
					WHERE `idFormaPago`=$lngIdFormaPago";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

?>
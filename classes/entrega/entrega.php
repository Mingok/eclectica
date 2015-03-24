<?php

Class entrega {

    public function entregasDisponibles() {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL();
        $strSql = "	SELECT * FROM `entrega`
					ORDER BY `detalleEntrega` ASC";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function entregasCliente($lngIdCliente) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL();
        $strSql = "	SELECT * FROM `entrega`
                            WHERE idCliente = {$lngIdCliente}
					ORDER BY `fechaEntrega` DESC";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function agregarNuevaEntrega($arrEntrega) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strValoresCampos = "";
        $strNombresCampos = "";
        $objManejoMySQL = new manejoMySQL();
        foreach ($arrEntrega as $nombreCampo => $valorCampo) {
            $strValoresCampos .= $strValoresCampos == '' ? '' : ',';
            $strNombresCampos .= ($strNombresCampos == '' ? '' : ',') . '`' . $nombreCampo . '`';
            if (is_null($valorCampo)) {
                $strValoresCampos .= 'null';
            } else {
                if (gettype($valorCampo) == 'string' || $nombreCampo == 'fechaEntrega') {
                    $strValoresCampos .= "'$valorCampo'";
                } else {
                    $strValoresCampos .= "$valorCampo";
                }
            }
        }

        $strSql = "INSERT INTO `entrega`($strNombresCampos) VALUES($strValoresCampos)";


        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function eliminarEntrega($objEntrega) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");

        $objManejoMySQL = new manejoMySQL();
        $lngIdEntrega = $objEntrega['idEntrega'];
        $strSql = "DELETE FROM `entrega` WHERE `idEntrega`=$lngIdEntrega";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

    public function modificarEntrega($arrEntrega) {
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ . "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
        $strValoresCampos = "";
        $strNombresCampos = "";
        $strUpdate = "";
        foreach ($arrEntrega as $nombreCampo => $valorCampo) {
            if ($nombreCampo != 'idEntrega') {
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
                $lngIdEntrega = $valorCampo;
            }
        }

        $objManejoMySQL = new manejoMySQL();
        $strSql = "UPDATE `entrega` SET $strUpdate
					WHERE `idEntrega`=$lngIdEntrega";
        $arrResultado = null;
        $objManejoMySQL->consultar($strSql, $arrResultado);
        return $arrResultado;
    }

}

?>
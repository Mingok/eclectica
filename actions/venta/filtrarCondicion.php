<?php

function getCondicion() {
    require_once (__DIR__ . '\..\..\base\manejoMySQL.php');
    $objManejoMySQL = new manejoMySQL();
    $strSql = "SELECT * FROM tipoventa WHERE grupoTipoVenta='" . $_POST["grupoTipoVenta"] . "'";

    $arrResultado = null;
    $objManejoMySQL->consultar($strSql, $arrResultado);
    $resp = '';
    if ($arrResultado) {
        if (count($arrResultado) > 0) {
            $resp.="<option value=''>- Elija Una -</option>";
            foreach ($arrResultado as $arrResultado1) {
                $resp.="<option value='" . $arrResultado1["idTipoVenta"] . "'>" . $arrResultado1["idTipoVenta"]."   ".$arrResultado1["detalleTipoVenta"] . "</option>";
            }
        } else
            $resp.="<option value=''>- Elija Una -</option>";
    } else
        $resp = "ERROR";
    echo $resp;
}

if ($_POST) {
    switch ($_POST["tarea"]) {
        case "filtraCondicion":getCondicion();
            break;
    }
}
?>
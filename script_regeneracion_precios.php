<?php
set_time_limit(0);
$ds = DIRECTORY_SEPARATOR;
require_once (__DIR__ . "{$ds}base{$ds}manejoMySQL.php");

$objManejoMySQL = new manejoMySQL ();
$sql_prendas = "SELECT * FROM `tipoventa_prenda` WHERE `idTipoVenta` = 2;";

$sql_precios = "SELECT * FROM `tipoventa` WHERE `idTipoVenta` NOT IN (1,2);";

$prendas = array();
$precios = array();
$objManejoMySQL->consultar($sql_prendas, $prendas);
$objManejoMySQL->consultar($sql_precios, $precios);

foreach ($prendas as $prenda) {
    $valor = $prenda['valor'];
    $idPrenda = $prenda['idPrenda'];
    foreach ($precios as $precio) {
        $porcentaje = $precio['porcentajeTipoVenta'];
        $operacion = $precio['operacionTipoVenta'];
        $tipoVenta = $precio['idTipoVenta'];
        $multiplicando = 1 - (floatval($porcentaje)/100);
        if ($operacion == 2) {
            $multiplicando = 1 + (floatval($porcentaje)/100);
        }
        $valor_calculado = ($valor * $multiplicando);
        $nuevo_registro = "INSERT INTO `tipoventa_prenda`(`valor`, `idTipoVenta`, `idPrenda`) VALUES ($valor_calculado, $tipoVenta, $idPrenda)";
        $resultado = array();
        $objManejoMySQL->consultar($nuevo_registro, $resultado);
    }
}
echo "<pre>";
var_dump('Terminó la migración de precios!!!');
echo "<pre>";
exit;

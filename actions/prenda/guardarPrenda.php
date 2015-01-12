<?php
require_once 'classes/prenda/prenda.php';
    
$tipoVenta1 = $_REQUEST['tipoVenta1'];
$tipoVenta2 = $_REQUEST['tipoVenta2'];
$tipoVenta3 = $_REQUEST['tipoVenta3'];
$tipoVenta4 = $_REQUEST['tipoVenta4'];
$tipoVenta5 = $_REQUEST['tipoVenta5'];
$tipoVenta6 = $_REQUEST['tipoVenta6'];
$tipoVenta7 = $_REQUEST['tipoVenta7'];
$tipoVenta8 = $_REQUEST['tipoVenta8'];
$tipoVenta9 = $_REQUEST['tipoVenta9'];
$tipoVenta10 = $_REQUEST['tipoVenta10'];
$tipoVenta11 = $_REQUEST['tipoVenta11'];

$idPrenda = $_REQUEST['idPrenda'];

$detallePrenda = $_REQUEST['detallePrenda'];
$cantidadPrenda =$_REQUEST['cantidadPrenda'];
$idColorPrenda = $_REQUEST['idColorPrenda'];
$idEstampadoPrenda =$_REQUEST['idEstampadoPrenda'];
$idTelaPrenda = $_REQUEST['idTelaPrenda'];
$idTallePrenda = $_REQUEST['idTallePrenda'];
$idEstacionPrenda = $_REQUEST['idEstacionPrenda'];
$idEmpresaPrenda = $_REQUEST['idEmpresaPrenda'];
$idProveedorPrenda = $_REQUEST['idProveedorPrenda'];
$idMarcaPrenda=$_REQUEST['idMarcaPrenda'];
if ($idPrenda){
 /*Modificar*/
      $codigoPrenda=  $_REQUEST['codigoPrenda'];

   
}else{
 /*Nuevo erpesa 1 prov 000 marca 000 prenda 00000*/
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$objManejoMySQL= new manejoMySQL();
$strSql = "SELECT idPrenda FROM prenda ORDER BY idPrenda DESC LIMIT 1;";
        $prendaId = null;   
		$objManejoMySQL->consultar($strSql, $prendaId);
        
        
        foreach ($prendaId as $nombreCampo1=>$valorCampo1){
            $varPrenda = $valorCampo1;
 }
   $codigoPrenda= str_pad($idEmpresaPrenda, 1, "0", STR_PAD_LEFT).str_pad($idProveedorPrenda, 3, "0", STR_PAD_LEFT).str_pad($idMarcaPrenda, 3, "0", STR_PAD_LEFT).str_pad($varPrenda['idPrenda']+1, 5, "0", STR_PAD_LEFT);
   }
   

$arrPrenda = array(
'idPrenda' => $idPrenda,
'codigoPrenda' => $codigoPrenda,
'detallePrenda'=> $detallePrenda,
'cantidadPrenda' => $cantidadPrenda,
'idColorPrenda' => $idColorPrenda,
'idEstampadoPrenda' => $idEstampadoPrenda,
'idTelaPrenda' => $idTelaPrenda,
'idTallePrenda' => $idTallePrenda,   
'idEstacionPrenda' => $idEstacionPrenda,    
'idEmpresaPrenda'=>$idEmpresaPrenda,
'idProveedorPrenda' => $idProveedorPrenda,	
'fechaPrenda'=>date('Y-m-d h:i:s', time()),
'idMarcaPrenda'=>$idMarcaPrenda

);
$arrPrecioPrenda = array(
    'tipoVenta1'=>$tipoVenta1,
    'tipoVenta2'=>$tipoVenta2,
    'tipoVenta3'=>$tipoVenta3,
    'tipoVenta4'=>$tipoVenta4,
    'tipoVenta5'=>$tipoVenta5,
    'tipoVenta6'=>$tipoVenta6,
    'tipoVenta7'=>$tipoVenta7,
    'tipoVenta8'=>$tipoVenta8,
    'tipoVenta9'=>$tipoVenta9,
    'tipoVenta10'=>$tipoVenta10,
    'tipoVenta11'=>$tipoVenta11
);


     


$prendaClass = new prenda();
if ($idPrenda) {
    	$prendas = $prendaClass->modificarPrecioPrenda($arrPrecioPrenda,$arrPrenda['idPrenda']);
	$prendas = $prendaClass->modificarPrenda($arrPrenda);
    
		
} else {
    $prendas = $prendaClass->agregarNuevoPrenda($arrPrenda);
        $ds = DIRECTORY_SEPARATOR;
        require_once (__DIR__ .  "{$ds}..{$ds}..{$ds}base{$ds}manejoMySQL.php");
		$objManejoMySQL= new manejoMySQL();
$strSql = "SELECT idPrenda FROM prenda ORDER BY idPrenda DESC LIMIT 1;";
        $prendaId = null;   
		$objManejoMySQL->consultar($strSql, $prendaId);
        
        
        foreach ($prendaId as $nombreCampo1=>$valorCampo1){
            $varPrenda = $valorCampo1;
        }
	
    $prendas = $prendaClass->agregarNuevoPrecioPrenda($arrPrecioPrenda,$varPrenda['idPrenda']);	
    $url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&prendaNueva=ok&NPrenda='.$codigoPrenda);
exit;
}

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
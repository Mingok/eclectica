<?php

require_once 'classes/empresa/empresa.php';
$nombreEmpresa = $_REQUEST['nombreEmpresa'];
$dirEmpresa = $_REQUEST['dirEmpresa'];
$cuitEmpresa = $_REQUEST['cuitEmpresa'];
$telEmpresa = $_REQUEST['telEmpresa'];
$emailEmpresa = $_REQUEST['emailEmpresa'];

    if (! isset( $_REQUEST['logoEmpresa'])){
    

$arrEmpresa = array(
	'nombreEmpresa' => $nombreEmpresa,
    'dirEmpresa' => $dirEmpresa,
    'cuitEmpresa' => $cuitEmpresa,
    'telEmpresa' => $telEmpresa,
    'emailEmpresa' => $emailEmpresa
);
}else{
                   
$logoEmpressa = $_REQUEST['logoEmpresa'];
  $arrEmpresa = array(
	'nombreEmpresa' => $nombreEmpresa,
    'dirEmpresa' => $dirEmpresa,
    'cuitEmpresa' => $cuitEmpresa,
    'telEmpresa' => $telEmpresa,
    'logoEmpresa' => $logoEmpressa,
'emailEmpresa' => $emailEmpresa
    
);  
}
$empresaClass = new empresa();
$empresas = $empresaClass->modificarEmpresa($arrEmpresa);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
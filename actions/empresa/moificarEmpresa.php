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
copy($_FILES['logoEmpresa']['tmp_name'],$_FILES['logoEmpresa']['name']);
                                $archivo_origen = $_FILES['logoEmpresa']['tmp_name']; 
                                $archivo_final = $logoEmpressa.".jpg"; 
                                move_uploaded_file($archivo_origen, $archivo_final);
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
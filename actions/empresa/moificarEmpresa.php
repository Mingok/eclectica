<?php

require_once 'classes/empresa/empresa.php';
$nombreEmpresa = $_REQUEST['nombreEmpresa'];
$dirEmpresa = $_REQUEST['dirEmpresa'];
$cuitEmpresa = $_REQUEST['cuitEmpresa'];
$telEmpresa = $_REQUEST['telEmpresa'];
$emailEmpresa = $_REQUEST['emailEmpresa'];
$empresaClass = new empresa();
if (empty( $_FILES['logoEmpresa']['size'])){
	$arrEmpresa = array(
		'nombreEmpresa' => $nombreEmpresa,
	    'dirEmpresa' => $dirEmpresa,
	    'cuitEmpresa' => $cuitEmpresa,
	    'telEmpresa' => $telEmpresa,
	    'emailEmpresa' => $emailEmpresa
	);
}else{
                   
	$logoEmpressa = $_FILES['logoEmpresa'];
  	$arrEmpresa = array(
		'nombreEmpresa' => $nombreEmpresa,
	    'dirEmpresa' => $dirEmpresa,
	    'cuitEmpresa' => $cuitEmpresa,
	    'telEmpresa' => $telEmpresa,
	    'logoEmpresa' => $logoEmpressa['name'],
		'emailEmpresa' => $emailEmpresa
		);  
	$empresaClass->guardarLogoEmpresa($logoEmpressa);
}

$empresas = $empresaClass->modificarEmpresa($arrEmpresa);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
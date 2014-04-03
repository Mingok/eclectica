<?php
require_once 'classes/tela/tela.php';
$detalleTela = $_REQUEST['detalleTela'];
$idTela = $_REQUEST['idTela'];
$arrTela = array(
	'detalleTela' => $detalleTela,
	'idTela' => $idTela
);


$telaClass = new tela();
if ($idTela) {
	$telas = $telaClass->modificarTela($arrTela);
} else {
	$telas = $telaClass->agregarNuevoTela($arrTela);	
}

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
?>
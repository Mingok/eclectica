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

$url=strtok($_SERVER["HTTP_REFERER"],'?');
header('Location: '.$url.'?pasar=1&guardaTela=ok');
exit;
?>
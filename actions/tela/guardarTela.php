<?php
require_once 'classes/tela/tela.php';
$detalleTela = $_REQUEST['detalleTela'];
$arrTela = array(
	'detalleTela' => $detalleTela
);

$telaClass = new tela();
$telas = $telaClass->agregarNuevoTela($arrTela);

header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
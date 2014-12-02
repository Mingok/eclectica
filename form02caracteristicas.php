<?php
    $ds = DIRECTORY_SEPARATOR;
	require_once "classes{$ds}empresa{$ds}empresa.php";
	$empresaList = new empresa(); 
	$empresas = $empresaList->datosEmpresa();
	$empresa = null;
	if (is_array($empresas)) {
		$empresa = array_shift($empresas);
	}
?>
<h1 style="text-align: left;">
	&nbsp;Caracteristicas&nbsp;
</h1>
<div class="row">
	<div class="col-md-4"><?php include_once "views{$ds}tela{$ds}abmTela.php"; ?></div>
	<div class="col-md-4"><?php include_once "views{$ds}color{$ds}abmColor.php"; ?></div>
	<div class="col-md-4"><?php include_once "views{$ds}marca{$ds}abmMarca.php"; ?></div>
</div>
<div class="row">
	<div class="col-md-4"><?php include_once "views{$ds}talle{$ds}abmTalle.php"; ?></div>
	<div class="col-md-4"><?php include_once "views{$ds}estampado{$ds}abmEstampado.php"; ?></div>
	<div class="col-md-4"><?php include_once "views{$ds}estacion{$ds}abmEstacion.php"; ?></div>
</div>
<div class="row">
	<div class="col-md-7"><?php include_once "views{$ds}tipoVenta{$ds}abmTipoVenta.php"; ?></div>
	<div class="col-md-5"><img src="./imagenes/logos/<?php echo $empresa["logoEmpresa"];?>"  style="border: 5px solid Darkred; height: 200px;"/></div>
</div>
<?php 
	require_once 'classes/empresa/empresa.php'; 
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
	<div class="col-md-4"><?php include_once 'views/tela/abmTela.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/color/abmColor.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/marca/abmMarca.php'; ?></div>
</div>
<div class="row">
	<div class="col-md-4"><?php include_once 'views/talle/abmTalle.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/estampado/abmEstampado.php'; ?></div>
	<div class="col-md-4"><?php include_once 'views/estacion/abmEstacion.php'; ?></div>
</div>
<div class="row">
	<div class="col-md-7"><?php include_once 'views/tipoVenta/abmTipoVenta.php'; ?></div>
	<div class="col-md-5"><img src="./imagenes/logos/<?php echo $empresa['logoEmpresa'];?>"  style="border: 5px solid Darkred; height: 200px;"/></div>
</div>
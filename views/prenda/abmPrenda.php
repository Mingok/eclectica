<?php
require_once 'classes/tela/tela.php';
$telaList = new tela ();
$telas = $telaList->telasDisponibles ();
require_once 'classes/estacion/estacion.php';
$estacionList = new estacion ();
$estaciones = $estacionList->estacionesDisponibles ();
require_once 'classes/color/color.php';
$colorList = new color ();
$colores = $colorList->coloresDisponibles ();
require_once 'classes/talle/talle.php';
$talleList = new talle ();
$talles = $talleList->tallesDisponibles ();
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles ();
require_once 'classes/marca/marca.php';
$marcaList = new marca ();
$marcas = $marcaList->marcasDisponibles ();
require_once 'classes/estampado/estampado.php';
$estampadoList = new estampado ();
$estampados = $estampadoList->estampadosDisponibles ();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles ();
?>
<div id="ver" style="display: none; padding-top: 10px;">



<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Datos de la prenda</h3>
</div>
<div class="panel-body">
<form action="actions/prenda/guardarPrenda.php" class="formPrendas"
	id="formPrendas">
<table class="tabla">
	<tr>
		<td>
		<table style="width: 98%;">
			<tr>
				<td style="text-align: right;"><label for="codigoPrenda" id="lp">
				Codigo&nbsp; </label> <input type="text" name="codigoPrenda"
					value="" readonly="yes" /> <input type="hidden" value=""
					name="idPrenda" /> <input type="hidden" name="idEmpresaPrenda"
					value="1" /></td>
				<td style="text-align: right;" colspan="2"><b> Nombre:&nbsp; </b> <input
					type="text" name="detallePrenda" id="detallePrenda"
					placeholder="ingrese" style="width: 450px" /></td>
				<td style="text-align: right;"><input type="submit" value="Agregar"
					style="width: 100px;" class="btn btn-sm btn-success" /> &nbsp; <input
					type="button" value="Limpiar" style="width: 100px;"
					class="btn btn-sm btn-danger no"
					onclick="javascript:document.getElementById('ver').style.display = 'none'" />
				</td>
			</tr>
			<tr style="height: 35px;">
				<td style="text-align: right;">Marca:&nbsp; <select size="1"
					name="idMarcaPrenda" id="idMarcaPrenda" style="width: 165px">
					<option></option>
										<?php
										foreach ( $marcas as $marca ) {
											if (isset ( $marca )) {
												echo "<option value=" . $marca ["idMarca"] . ">" . $marca ["detalleMarca"] . "</option>";
											}
										}
										?>
									</select></td>
				<td style="text-align: right;">Proveedor:&nbsp; <select size="1"
					title="Ingrese Proveedor" name="idProveedorPrenda"
					id="idProveedorPrenda" style="width: 165px">
					<option></option>
										<?php
										foreach ( $proveedores as $proveedor ) {
											if (isset ( $proveedor )) {
												echo "<option value=" . $proveedor ["idProveedor"] . ">" . $proveedor ["nombreProveedor"] . "</option>";
											}
										}
										?>
									</select></td>
				<td style="text-align: right;">Temporada:&nbsp; <select size="1"
					title="Ingrese Temporada" style="width: 150px"
					name="idEstacionPrenda" id="idEstacionPrenda">
					<option></option>
										<?php
										foreach ( $estaciones as $estacion ) {
											if (isset ( $estacion )) {
												echo "<option value=" . $estacion ["idEstacion"] . ">" . $estacion ["detalleEstacion"] . "</option>";
											}
										}
										?>
									</select></td>
				<td style="text-align: right;">Cantidad : <input type="number"
					title="Indresar Cantidad" style="width: 40px;"
					name="cantidadPrenda" min="0" max="20" value="0" /> <br />
				</td>
			</tr>
			<tr style="height: 35px;">
				<td style="text-align: right;">Tela:&nbsp; <select size="1"
					title="Ingrese Razon Social" name="idTelaPrenda" id="idTelaPrenda"
					style="width: 150px" />
				<option></option>
									<?php
									foreach ( $telas as $tela ) {
										if (isset ( $telas )) {
											echo "<option value=" . $tela ["idTela"] . ">" . $tela ["detalleTela"] . "</option>";
										}
									}
									?>
										</select></td>
				<td style="text-align: right;">Color:&nbsp; <select size="1"
					title="Ingrese Razon Social" name="idColorPrenda"
					id="idColorPrenda" style="width: 150px" />
				<option></option>
									<?php
									foreach ( $colores as $color ) {
										if (isset ( $color )) {
											echo "<option value=" . $color ["idColor"] . ">" . $color ["detalleColor"] . "</option>";
										}
									}
									?>
										</select></td>
				<td style="text-align: right;">Talle:&nbsp; <select size="1"
					title="Ingrese Razon Social" name="idTallePrenda"
					id="idTallePrenda" style="width: 150px" />
				<option></option>
									<?php
									foreach ( $talles as $talle ) {
										if (isset ( $talles )) {
											echo "<option value=" . $talle ["idTalle"] . ">" . $talle ["detalleTalle"] . "</option>";
										}
									}
									?>
										</select></td>
				<td style="text-align: right;">Estampado:&nbsp; <select size="1"
					name="idEstampadoPrenda" id="idEstampadoPrenda"
					style="width: 140px" />
				<option></option>
									<?php
									foreach ( $estampados as $estampado ) {
										if (isset ( $estampado )) {
											echo "<option value=" . $estampado ["idEstampado"] . ">" . $estampado ["detalleEstampado"] . "</option>";
										}
									}
									?>
										</select></td>
			</tr>
		</table>

		</td>
	</tr>

	<tr>
		<td colspan="2">


		<table style="width: 100%;">
			<tr>
				<td>
				<h4 style="text-align: left;">Precios</h4>
				</td>
			</tr>
			<tr>
								<?php
								foreach ( $tipoVentas as $tipoVenta ) {
									?>
									<td style="text-align: right;">
										<?php
									echo $tipoVenta ["detalleTipoVenta"];
									?>
											<input type="text" style="width: 80px"
					name="tipoVenta<?php
									echo $tipoVenta ["idTipoVenta"];
									?>" /></td>
									<?php
								}
								?>
							</tr>
		</table>
		</td>
	</tr>
</table>
</form>
</div>
</div>
</div>
</div>



</div>
<script type="text/javascript">
		//Boton Agregar o modificar

		$('.buttonCopiar').click(function() {
		$('#ver').show("slow");
		$('html,body').animate({
        scrollTop: $("#ver").offset().top
    }, 2000);
			$('.buttonPrendas').val('Agregar');
			$('input[name=idPrenda]').val('');
			$('input[name=cantidadPrenda]').val($(this).data('cantidadprenda'));
			$('input[name=codigoPrenda]').val($(this).data('codigoprenda'));
			$('input[name=detallePrenda]').val($(this).data('detalleprenda') + "[2]");
			$('select[name=idMarcaPrenda]').val($(this).data('idmarcaprenda'));
			$('select[name=idProveedorPrenda]').val($(this).data('idproveedorprenda'));
			$('select[name=idEstacionPrenda]').val($(this).data('idestacionprenda'));
			$('select[name=idColorPrenda]').val($(this).data('idcolorprenda'));
			$('select[name=idTelaPrenda]').val($(this).data('idtelaprenda'));
			$('select[name=idTallePrenda]').val($(this).data('idtalleprenda'));
			$('select[name=idEstampadoPrenda]').val($(this).data('idestampadoprenda'));
			$('input[name=tipoVenta1]').val($(this).data('valor1'));
			$('input[name=tipoVenta2]').val($(this).data('valor2'));
			$('input[name=tipoVenta3]').val($(this).data('valor3'));
			$('input[name=tipoVenta4]').val($(this).data('valor4'));
			$('input[name=tipoVenta5]').val($(this).data('valor5'));
			$('input[name=tipoVenta6]').val($(this).data('valor6'));
			$('input[name=codigoPrenda]').hide();
			$('label[for=codigoPrenda]').hide();

		});
		$('.editButtonPrenda').click(function() {
		$('#ver').show("slow");
		$('html,body').animate({
        scrollTop: $("#ver").offset().top
    }, 2000);
			$('input[name=idPrenda]').val($(this).data('idprenda'));
			$('input[name=cantidadPrenda]').val($(this).data('cantidadprenda'));
			$('input[name=codigoPrenda]').val($(this).data('codigoprenda'));
			$('input[name=detallePrenda]').val($(this).data('detalleprenda'));
			$('select[name=idMarcaPrenda]').val($(this).data('idmarcaprenda'));
			$('select[name=idProveedorPrenda]').val($(this).data('idproveedorprenda'));
			$('select[name=idEstacionPrenda]').val($(this).data('idestacionprenda'));
			$('select[name=idColorPrenda]').val($(this).data('idcolorprenda'));
			$('select[name=idTelaPrenda]').val($(this).data('idtelaprenda'));
			$('select[name=idTallePrenda]').val($(this).data('idtalleprenda'));
			$('select[name=idEstampadoPrenda]').val($(this).data('idestampadoprenda'));
			$('input[name=tipoVenta1]').val($(this).data('valor1'));
			$('input[name=tipoVenta2]').val($(this).data('valor2'));
			$('input[name=tipoVenta3]').val($(this).data('valor3'));
			$('input[name=tipoVenta4]').val($(this).data('valor4'));
			$('input[name=tipoVenta5]').val($(this).data('valor5'));
			$('input[name=tipoVenta6]').val($(this).data('valor6'));
			$('input[name=codigoPrenda]').show("slow");
			$('label[for=codigoPrenda]').show("slow");
			$('.btn-success').val('Modificar');
			$('.btn-danger').removeClass('no');

		});


		//Boton limpiar campos
		$('.btn-danger').click(function() {
			location.reload();
/*	$('.buttonPrendas').val('Agregar');
$('input[name=idPrenda]').val('');
$('input[name=cantidadPrenda]').val('');
$('input[name=codigoPrenda]').val('');
$('input[name=detallePrenda]').val('');
$('select[name=idMarcaPrenda]').val('0');
$('select[name=idProveedorPrenda]').val('0');
$('select[name=idEstacionPrenda]').val('');
$('select[name=idColorPrenda]').val('0');
$('select[name=idTelaPrenda]').val('0');
$('select[name=idTallePrenda]').val('0');
$('select[name=idEstampadoPrenda]').val('0');
$('.btn-danger').addClass('no');
$("#ver").hide();
$('input[name=idPrenda]').val(null);
*/
		});


		$('.buttonPrendasNueva').click(function() {
		$('#ver').show("slow");
		$('html,body').animate({
        scrollTop: $("#ver").offset().top
    }, 2000);
			$('.btn-success').val('Agregar');
			$('input[name=idPrenda]').val('');
			$('input[name=cantidadPrenda]').val('');
			$('input[name=codigoPrenda]').val('');
			$('input[name=detallePrenda]').val('');
			$('select[name=idMarcaPrenda]').val('0');
			$('select[name=idProveedorPrenda]').val('0');
			$('select[name=idEstacionPrenda]').val('');
			$('select[name=idColorPrenda]').val('0');
			$('select[name=idTelaPrenda]').val('0');
			$('select[name=idTallePrenda]').val('0');
			$('select[name=idEstampadoPrenda]').val('0');
			$('select[name=idEstacionPrenda]').val('0');
			$('.btn-danger').addClass('no');
			$('input[name=idPrenda]').val(null);
			$('input[name=codigoPrenda]').hide();
			$('label[for=codigoPrenda').hide();
		});
		$("#formPrendas ").validate({
			rules: {
				idEstacionPrenda: {
					required: true

				},
				idMarcaPrenda: {
					required: true

				},
				idProveedorPrenda: {
					required: true

				},
				idTemporadaPrenda: {
					required: true

				},

				idTelaPrenda: {
					required: true
				},
				idTallePrenda: {
					required: true
				},
				idColorPrenda: {
					required: true

				},
				cantidadPrenda: {
					required: true

				},
				idEstampadoPrenda: {
					required: true

				},

				detallePrenda: {
					required: true,
					minlength: 5
				},
				tipoVenta1: {
					required: true,

					number: true
				},
				tipoVenta2: {
					required: true,
					number: true
				},
				tipoVenta3: {
					required: true,
					number: true
				},
				tipoVenta4: {
					required: true,
					number: true
				},
				tipoVenta5: {
					required: true,
					number: true
				},
				tipoVenta6: {
					required: true,
					number: true
				},
			},
			messages: {

				idTemporadaPrenda: {
					required: "Ingrese Estacion",

				},
				idMarcaPrenda: {
					required: "Ingrese Marca",

				},

				idEstampadoPrenda: {
					required: "Ingrese Estampado",

				},
				idProveedorPrenda: {
					required: "Ingrese Proveedor",

				},
				idTemporadaPrenda: {
					required: "Ingrese Temporada",

				},

				idTelaPrenda: {
					required: "Ingrese Tela",

				},
				idTallePrenda: {
					required: "Ingrese Talle",

				},
				idColorPrenda: {
					required: "Ingrese Color",

				},
				cantidadPrenda: {
					required: "Ingrese Cantidad",

				},

				detallePrenda: {
					required: "Ingrese Nombre",
					minlength: "Debe mas de 5 caracteres"
				},
				tipoVenta1: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				},
				tipoVenta2: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				},
				tipoVenta3: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				},
				tipoVenta4: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				},
				tipoVenta5: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				},
				tipoVenta6: {
					required: "Ingrese Precio",
					number: "Debe ser un numero"
				}
			}
		});
	</script>
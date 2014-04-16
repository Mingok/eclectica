<?php 
				require_once 'classes/tela/tela.php';
				$telaList = new tela();
				$telas = $telaList->telasDisponibles();
				?>
                <?php 
				require_once 'classes/estacion/estacion.php';
				$estacionList = new estacion();
				$estaciones = $estacionList->estacionesDisponibles();
				?>
<?php 
				require_once 'classes/color/color.php';
				$colorList = new color();
				$colores = $colorList->coloresDisponibles();
				?>
<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<?php 
				require_once 'classes/proveedor/proveedor.php';
				$proveedorList = new proveedor();
				$proveedores = $proveedorList->proveedoresDisponibles();
				?>				
<?php 
				require_once 'classes/marca/marca.php';
				$marcaList = new marca();
				$marcas = $marcaList->marcasDisponibles();
				?>				
<?php 
				require_once 'classes/estampado/estampado.php';
				$estampadoList = new estampado();
				$estampados = $estampadoList->estampadosDisponibles();
				?>	
				
<?php 
				require_once 'classes/tipoVenta/tipoVenta.php';
				$tipoVentaList = new tipoVenta();
				$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
				?>								
<script>
/*	function mostrarOcultarTablas(id) {
		mostrado = 0;
		elem = document.getElementById(id);
		if (elem.style.display == 'block') mostrado = 1;
		elem.style.display = 'none';
		if (mostrado != 1) elem.style.display = 'block';
	}*/
</script>
<div id="ver" style="display: none; padding-top:10px; ">
	<table class="tablaPrendas">
		<tr>
			<td>
				<form action="actions/prenda/guardarPrenda.php" class="formPrenda">
					<table style="width:100%;">
						<tr>
							<td>
								<a id="prenda"/><h1 style="text-align: left;">
									Datos de la prenda
								</h1>
                                </a>
							</td>
							<td style="text-align: right;">
								Codigo&nbsp;
								<input type="text" class="textPrendas" name="codigoPrenda" value="" readonly="yes"  />
								<input type="hidden" value="" name="idPrenda"/>
                                	<input type="hidden"  name="idEmpresaPrenda" value="1"/>
                                
							</td>
							<td style="text-align: right;">
								Nombre:&nbsp;
								<input type="text" class="textPrendas" name="detallePrenda" placeholder="ingrese" style="width:200px" required/>
							</td>
							<td style="text-align: right;">
								<input type="submit" value="Agregar" class="buttonPrendas " />
								&nbsp;
								<input type="button" value="Limpiar Campos" class="buttonLimpiar no" onclick="javascript:document.getElementById('ver').style.display = 'none'"/>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								Marca:&nbsp;
								<select size="1" name="idMarcaPrenda" id="idMarcaPrenda" style="width: 120px" class="textPrendas" required>
									<option value=0>
									</option>
									<?php foreach ($marcas as $marca) { if ( isset($marca)) { echo "<option value=" . $marca[ "idMarca"]. ">" . $marca[ "detalleMarca"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Proveedor:&nbsp;
								<select size="1" name="idProveedorPrenda" id="idProveedorPrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Uno - -
									</option>
									<?php foreach ($proveedores as $proveedor) { if ( isset($proveedor)) { echo "<option value=" . $proveedor[ "idProveedor"]. ">" . $proveedor[ "nombreProveedor"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Temporada:&nbsp;
								<select size="1" style="width: 120px" class="textPrendas" name="idEstacionPrenda" id="idEstacionPrenda">
									<option value=0>
										- Elija Una -
									</option>
									<?php foreach ($estaciones as $estacion) { if ( isset($estacion)) { echo "<option value=" . $estacion[ "idEstacion"]. ">" . $estacion[ "detalleEstacion"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Cantidad :
								<input type="number" style="width: 30px;" name="cantidadPrenda" min="0" max="10" value="0" />
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								Tela:&nbsp;
								<select size="1" name="idTelaPrenda" id="idTelaPrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Una - -
									</option>
									<?php foreach ($telas as $tela) { if ( isset($telas)) { echo "<option value=" . $tela[ "idTela"]. ">" . $tela[ "detalleTela"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Color:&nbsp;
								<select size="1" name="idColorPrenda" id="idColorPrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Uno - -
									</option>
									<?php foreach ($colores as $color) { if ( isset($color)) { echo "<option value=" . $color[ "idColor"]. ">" . $color[ "detalleColor"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Talle:&nbsp;
								<select size="1" name="idTallePrenda" id="idTallePrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Uno - -
									</option>
									<?php foreach ($talles as $talle) { if ( isset($talles)) { echo "<option value=" . $talle[ "idTalle"]. ">" . $talle[ "detalleTalle"] . "</option>"; }} ?>
								</select>
							</td>
							<td style="text-align: right;">
								Estampado:&nbsp;
								<select size="1" name="idEstampadoPrenda" id="idEstampadoPrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Uno - -
									</option>
									<?php foreach ($estampados as $estampado) { if ( isset($estampado)) { echo "<option value=" . $estampado[ "idEstampado"]. ">" . $estampado[ "detalleEstampado"] . "</option>"; }} ?>
								</select>
							</td>
						</tr>
					</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h1 style="text-align: left;">
					Precios
				</h1>
				<table width="100%">
					<tr>
						<?php foreach ($tipoVentas as $tipoVenta) {?>
							<td style="text-align: right;">
								<?php echo $tipoVenta[ "detalleTipoVenta"];?>
									<input type="text" class="textPrendas" name="tipoVenta<?php echo $tipoVenta["idTipoVenta"];?>" value="00,00" size="10"/>
							</td>
							<?php } ?>
					</tr>
				</table>
			</td>
		</tr>
		</form>
	</table>

</div>

<script type="text/javascript">

//Boton Agregar o modificar

$('.buttonCopiar').click(function(){
    $('input[name=cantidadPrenda]').val($(this).data('cantidadprenda'));
    $('input[name=codigoPrenda]').val($(this).data('codigoprenda'));
	$('input[name=detallePrenda]').val($(this).data('detalleprenda')+"[2]");
    $('select[name=idMarcaPrenda]').val($(this).data('idmarcaprenda'));
    $('select[name=idProveedorPrenda]').val($(this).data('idproveedorprenda'));
    $('select[name=idEstacionPrenda]').val($(this).data('idestacionprenda'));
    $('select[name=idColorPrenda]').val($(this).data('idcolorprenda'));
    $('select[name=idTelaPrenda]').val($(this).data('idtelaprenda'));
    $('select[name=idTallePrenda]').val($(this).data('idtalleprenda'));
   	$('select[name=idEstampadoPrenda]').val($(this).data('idestampadoprenda'));
    $('input[name=codigoPrenda').hide();

});
$('.editButtonPrenda').click(function(){
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
    $('input[name=codigoPrenda').show( "slow" );
	$('.buttonPrendas').val('Modificar');
	$('.buttonLimpiar').removeClass('no');
});


//Boton limpiar campos
$('.buttonLimpiar').click(function(){
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
	$('.buttonLimpiar').addClass('no');
    $("#ver").hide();
    	$('input[name=idPrenda]').val(null);
  */    
});


$('.buttonPrendasNueva').click(function(){
    $('.buttonPrendas').val('Agregar');
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
	$('.buttonLimpiar').addClass('no');
    $('input[name=idPrenda]').val(null);
    $('input[name=codigoPrenda').hide();
});
$('.formPrenda').validate();
</script>

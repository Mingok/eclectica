<?php 
				require_once 'classes/tela/tela.php';
				$telaList = new tela();
				$telas = $telaList->telasDisponibles();
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
	function mostrarOcultarTablas(id) {
		mostrado = 0;
		elem = document.getElementById(id);
		if (elem.style.display == 'block') mostrado = 1;
		elem.style.display = 'none';
		if (mostrado != 1) elem.style.display = 'block';
	}
</script>
<div id="ver" style="display: none; padding-top:10px; ">
	<table class="tablaPrendas">
		<tr>
			<td>
				<form action="actions/prenda/guardarPrenda.php" class="formPrenda">
					<table style="width:100%;">
						<tr>
							<td>
								<h1 style="text-align: left;">
									Datos de la prenda
								</h1>
							</td>
							<td style="text-align: right;">
								Codigo&nbsp;
								<input type="text" class="textPrendas" name="codigoPrenda" placeholder="#369857"/>
								<input type="hidden" value="" name="idPrenda"/>
                                	<input type="hidden"  name="idEmpresaPrenda" value="1"/>
							</td>
							<td style="text-align: right;">
								Nombre:&nbsp;
								<input type="text" class="textPrendas" name="detallePrenda" placeholder="ingrese" style="width:200px"/>
							</td>
							<td style="text-align: right;">
								<input type="submit" value="Agregar" class="buttonPrendas "/>
								&nbsp;
								<input type="button" value="Limpiar Campos" class="buttonLimpiar no"/>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">
								Marca:&nbsp;
								<select size="1" name="idMarcaPrenda" id="idMarcaPrenda" style="width: 120px" class="textPrendas">
									<option value=0>
										- - Elija Una - -
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
									<option value=1>
										Verano
									</option>
									<option value=2>
										Otonio
									</option>
									<option value=3>
										Invierno
									</option>
									<option value=4>
										Primavera
									</option>
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
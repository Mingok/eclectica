<?php require_once 'classes/prenda/prenda.php'; $prendaList=new prenda(); $prendas=$prendaList->
	prendasDisponibles(); require_once 'classes/tipoVenta/tipoVenta.php'; $tipoVentaList = new tipoVenta(); $tipoVentas = $tipoVentaList->tipoVentasDisponibles(); ?>
	<script language="javascript" type="text/javascript">
		function pintafila(fila, color) {
			antes = document.getElementById('tblPrenda').rows[fila].style.backgroundColor;
			for (i = 1; i < document.getElementById('tblPrenda').rows.length; i++) {
				if (document.getElementById('tblPrenda').rows[i].id == fila) {
					document.getElementById('tblPrenda').rows[i].style.backgroundColor = color;
				} else {
					document.getElementById('tblPrenda').rows[i].style.backgroundColor = antes;
				}
			}
		}
	</script>
	<table class="tabla">
		<tr>
			<td>
				<h1 >
					Prendas
				</h1>
			</td>
			<td style="text-align: right; padding-right: 10px;">
				<label for="txtPrenda">
					Codigo:
				</label>
				<input type="search" id="txtPrenda" class="textPrendas" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width:300px">
			</td>
			<td >
				<a href="#prenda">	<input type="button" value="Nuevo"  class="buttonPrendasNueva btn btn-success" onclick="javascript:document.getElementById('ver').style.display = 'block'"/></a>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: right;">
				<center>
					<div class="scrol1">
						<table class="formu" id="tblPrenda" style="width: 98%; ">
							<thead>
								<tr style='text-align: center'>
									<td>
										Mod
									</td>
									<td>
										Cop
									</td>
									<td>
										Cod
									</td>
									<td style="height:30px; width:35%">
										Nombre
									</td>
									<td>
										Talle
									</td>
									<td>
										Color
									</td>
									<td>
										Estampado
									</td>
									<td>
										Tela
									</td>
									<td>
										Temporada
									</td>
									<td>
										Cantidad
									</td>
								</tr>
							</thead>
							<tbody>
								<?php $cont=0; if (isset($prendas)){ foreach ($prendas as $prenda) { $cont++; ?>
									<tr id="<?php echo $cont;?>" class="<?php echo $cont;?>" style="text-align: center">
										<td onclick=" pintafila(<?php echo $cont;?>,'#FF0000')">
											<a title="Modificar datos" href="#prenda" class="editButtonPrenda" name="editButtonPrenda" data-cantidadprenda="<?php echo $prenda['cantidadPrenda']?>" data-idprenda="<?php echo $prenda['idPrenda']?>"
											data-idestampadoprenda="<?php echo $prenda['idEstampadoPrenda']?>" data-idtelaprenda="<?php echo $prenda['idTelaPrenda']?>" data-idtalleprenda="<?php echo $prenda['idTallePrenda']?>" data-codigoprenda="<?php echo $prenda['codigoPrenda']?>"
											data-detalleprenda="<?php echo $prenda['detallePrenda']?>" data-idmarcaprenda="<?php echo $prenda['idMarcaPrenda']?>" data-idproveedorprenda="<?php echo $prenda['idProveedorPrenda']?>" data-idestacionprenda="<?php echo $prenda['idEstacionPrenda']?>"
											data-idcolorprenda="<?php echo $prenda['idColorPrenda']?>" data-valor1="<?php echo $prenda['valor1']?>" data-valor2="<?php echo $prenda['valor2']?>" data-valor3="<?php echo $prenda['valor3']?>" data-valor4="<?php echo $prenda['valor4']?>"
											data-valor5="<?php echo $prenda['valor5']?>" data-valor6="<?php echo $prenda['valor6']?>" onclick="javascript:document.getElementById('ver').style.display = 'block'" />
											<img src='./imagenes/iconos/layout_edit.png' width='14' height='14' />
											</a>
										</td>
										<td onclick=" pintafila(<?php echo $cont;?>,'#FFff00')">
											<a title='copiar' href="#prenda" class="buttonCopiar" name="buttonCopiar" data-cantidadprenda="<?php echo $prenda['cantidadPrenda']?>" data-idestampadoprenda="<?php echo $prenda['idEstampadoPrenda']?>"
											data-idtelaprenda="<?php echo $prenda['idTelaPrenda']?>" data-idtalleprenda="<?php echo $prenda['idTallePrenda']?>" data-codigoprenda="<?php echo  $prenda['codigoPrenda']?>" data-detalleprenda="<?php echo $prenda['detallePrenda']?>"
											data-idmarcaprenda="<?php echo $prenda['idMarcaPrenda']?>" data-idproveedorprenda="<?php echo $prenda['idProveedorPrenda']?>" data-idestacionprenda="<?php echo $prenda['idEstacionPrenda']?>" data-idcolorprenda="<?php echo $prenda['idColorPrenda']?>"
											data-valor1="<?php echo $prenda['valor1']?>" data-valor2="<?php echo $prenda['valor2']?>" data-valor3="<?php echo $prenda['valor3']?>" data-valor4="<?php echo $prenda['valor4']?>" data-valor5="<?php echo $prenda['valor5']?>"
											data-valor6="<?php echo $prenda['valor6']?>" onclick="javascript:document.getElementById('ver').style.display = 'block'" />
											<img src='./imagenes/iconos/copiar.png' width='14' height='14' />
											</a>
										</td>
										<td>
											<?php echo $prenda[ 'codigoPrenda']?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detallePrenda']));?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detalleTalle']));?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detalleColor']));?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detalleEstampado']));?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detalleTela']));?>
										</td>
										<td style="height:30px;  text-align: left; padding-left: 5px;">
											<?php echo ucfirst(strtolower($prenda[ 'detalleEstacion']));?>
										</td>
										<?php if ($prenda[ 'cantidadPrenda']=='0'){ echo "<td style='background-color: red; font-weight: bolder;'>";} else {echo "<td >"; } ?>
											<?php echo $prenda[ 'cantidadPrenda']?>
			</td>
			</tr>
			<?php }}?>
				</tbody>
				</table>
				</div>
				</td>
		</tr>
	</table>
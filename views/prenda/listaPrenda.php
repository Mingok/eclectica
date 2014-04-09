<?php 
				require_once 'classes/prenda/prenda.php';
				$prendaList = new prenda();
				$prendas = $prendaList->prendasDisponibles();
				?>
<h1 style="text-align: left;">
	Prendas
</h1>
<div class="prendas">

	<table class="tablaPrendas">
		<tr>
			<td style="text-align: left; height: 40px;">
				Codigo
				<input type="text" name="pcod" value="ingrese" class="textPrendas"/>
			</td>
			<td style="text-align: left; height: 40px;">
				Buscar
				<input type="text" name="pbusc" value="palabra Clave" size="90"class="textPrendas"/>
			</td>
			<td style="text-align: left; height: 40px;">
				<input type="button" value="Nuevo" class="buttonPrendasNueva" onclick="javascript:document.getElementById('ver').style.display = 'block'"/>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: right; height: 40px;">
				<strong>
					Ordenar: |Prioridad|Fecha|Empleado|Vehículo|Tipo|
				</strong>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: right;">
				<center>
					<table class="formuPrendas" style="width: 98%; ">
						<tr style='text-align: center'>
							<td>
								Mod
							</td>
                            <td >
								Cod
							</td>
							<td style="width:20%">
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
							<td>
								Marca
							</td>
							
							<td>
								Proveedor
							</td>
							<td>
								Elim
							</td>
						</tr>
						<?php 
				if (isset($prendas)){	foreach ($prendas as $prenda) {
					?>	
						<tr style='text-align: center'>
							<td>
								<a title='Modificar datos' class="editButtonPrenda" name="editButtonPrenda" data-cantidadprenda="<?php echo $prenda['cantidadPrenda']?>" data-idprenda="<?php echo $prenda['idPrenda']?>" data-idestampadoprenda="<?php echo $prenda['idEstampadoPrenda']?>" data-idtelaprenda="<?php echo $prenda['idTelaPrenda']?>" data-idtalleprenda="<?php echo $prenda['idTallePrenda']?>" data-codigoprenda="<?php echo $prenda['codigoPrenda']?>"  data-detalleprenda="<?php echo $prenda['detallePrenda']?>" data-idmarcaprenda="<?php echo $prenda['idMarcaPrenda']?>" data-idproveedorprenda="<?php echo $prenda['idProveedorPrenda']?>" data-idestacionprenda="<?php echo $prenda['idEstacionPrenda']?>" data-idcolorprenda="<?php echo $prenda['idColorPrenda']?>" onclick="javascript:document.getElementById('ver').style.display = 'block'"/>
                                
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
							</td>
                            <td>
								<?php echo $prenda['codigoPrenda']?>
							</td>
							<td>
								<?php echo $prenda['detallePrenda']?>
							</td>
							<td>
								<?php echo $prenda['detalleTalle']?>								
							</td>
							<td>
								<?php echo $prenda['detalleColor']?>								
							</td>
							<td>
								<?php echo $prenda['detalleEstampado']?>								
							</td>
							<td>
								<?php echo $prenda['detalleTela']?>								
							</td>
							<td>
								<?php echo $prenda['detalleEstacion']?>	
                                							
							</td>
                            	<?php if ($prenda['cantidadPrenda']== '0'){ echo "<td style='background-color: red; font-weight: bolder;'>";}
                                else  {echo "<td >";
                                }
                                ?>			
							
								<?php echo $prenda['cantidadPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['detalleMarca']?>								
							</td>
							<td>
								<?php echo $prenda['nombreProveedor']?>								
							</td>
							<td>
								<a title='Borrar'><img src='./imagenes/iconos/eliminar.png' width='14' height='14' /></a>
							</td>
						</tr>
											<?php }}?>
					</table>
				</center>
			</td>
		</tr>
	</table>
</div>

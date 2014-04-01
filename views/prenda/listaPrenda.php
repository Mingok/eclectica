<?php 
				require_once 'classes/prenda/prenda.php';
				$prendaList = new prenda();
				$prendas = $prendaList->prendasDisponibles();
				?>
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
				<input type="button" name="pNuevo" value="Nuevo" class="buttonPrendas" onclick="javascript:mostrarOcultarTablas('ver')"/>
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
							<td style="width:20%">
								Nombre
							</td>
							<td>
								Proveedor
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
								Talle
							</td>
							<td>
								Temporada
							</td>
							<td>
								Marca
							</td>
							<td>
								Estacion
							</td>
							<td>
								Cantidad
							</td>
							<td>
								Elim
							</td>
						</tr>
						<?php 
					foreach ($prendas as $prenda) {
					?>	
						<tr style='text-align: center'>
							<td>
								<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
							</td>
							<td>
								<?php echo $prenda['detallePrenda']?>
							</td>
							<td>
								<?php echo $prenda['idProveedorPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idTallePrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idColorPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idEstampadoPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idTelaPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idTallePrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idMarcaPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['idEstacionPrenda']?>								
							</td>
							<td>
								<?php echo $prenda['cantidadPrenda']?>								
							</td>

							<td>
								<a title='Borrar'><img src='./imagenes/iconos/eliminar.png' width='14' height='14' /></a>
							</td>
						</tr>
											<?php }?>
					</table>
				</center>
			</td>
		</tr>
	</table>
</div>

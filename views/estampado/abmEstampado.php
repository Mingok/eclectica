	<?php 
				require_once 'classes/estampado/estampado.php';
				$estampadoList = new estampado();
				$estampados = $estampadoList->estampadosDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/estampado/guardarEstampado.php">
				<h2>Estampado</h2>
				Nombre: &nbsp;<input type="text" name="detalleEstampado" placeholder="ingresar" class="textCaracteristicas"/>
				<input  type="submit" value="Agregar" class="buttonCaracteristicas"/>
			</form>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<div class="scrolCaracteristicas"> 
				<table class="formuCaracteristicas" style="width: 100%;">
					<tr style="text-align: center;">
						<td>
							Mod
						</td>
						<td>
							Nombre
						</td>

					</tr>
					<?php 
					foreach ($estampados as $estampado) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a  title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
						</td>
						<td>
							<?php echo $estampado['detalleEstampado']?>
						</td>

					</tr>
					<?php }?>
				</table>
			</div>
		</td>
	</tr>
</table>
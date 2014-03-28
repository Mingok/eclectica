<?php 
				require_once 'classes/marca/marca.php';
				$marcaList = new marca();
				$marcas = $marcaList->marcasDisponibles();
				?>
<table >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/marca/guardarMarca.php">
				<h2>Marca</h2>
				Nombre Marca: &nbsp;<input type="text" name="detalleMarca" placeholder="ingresar" style="width: 120px;"class="textCaracteristicas"/>
				<input type="submit" value="Agregar" class="buttonCaracteristicas"/>
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
					foreach ($marcas as $marca) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a  title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
						</td>
						<td>
							<?php echo $marca['detalleMarca']?>
						</td>

					</tr>
					<?php }?>
				</table>
			</div>
		</td>
	</tr>
</table>
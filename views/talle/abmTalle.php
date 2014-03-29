<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/talle/guardarTalle.php">
				<h2>Talle</h2>
				Nombre: &nbsp;<input type="text" name="detalleTalle" placeholder="ingresar" style="width: 120px;"class="textCaracteristicas"/>
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
					foreach ($talles as $talle) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a  title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
						</td>
						<td>
							<?php echo $talle['detalleTalle']?>
						</td>

					</tr>
					<?php }?>
				</table>
			</div>
		</td>
	</tr>
</table>
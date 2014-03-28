<?php
?>
<table style="width:560px">
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/color/guardarColor.php">
				<h2>Color</h2>
				Nombre Color: &nbsp;<input type="text" name="detalleColor" placeholder="ingresar" style="width: 120px;"class="textCaracteristicas"/>
				<input type="submit" text="Agregar" class="buttonCaracteristicas"/>
			</form>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<div class="scrolCaracteristicas"> 
				<table class="formuCaracteristicas" style="width: 100%;">
				<?php 
				require_once 'classes/color/color.php';
				$colorList = new color();
				$colores = $colorList->coloresDisponibles();
				?>
					<tr style="text-align: center;">
						<td>
							Mod
						</td>
						<td>
							Nombre
						</td>

					</tr>
					<?php 
					foreach ($colores as $color) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a  title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
						</td>
						<td>
							<?php echo $color['detalleColor']?>
						</td>
<!--						<td>-->
<!--							<a title='Borrar' href="actions/color/eliminarColor.php?idColor=<?php //echo $color['idColor'];?>"><img src='./imagenes/iconos/eliminar.png' width='14' height='14' /></a>-->
<!--						</td>-->
					</tr>
					<?php }?>
				</table>
			</div>
		</td>
	</tr>
</table>
	<?php 
				require_once 'classes/color/color.php';
				$colorList = new color();
				$colores = $colorList->coloresDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/color/guardarColor.php">
				<h2>Color</h2>
				Nombre: &nbsp;<input type="text" name="detalleColor" placeholder="ingresar" style="width: 290px;"class="textCaracteristicas"/>
				<input type="hidden" value="" name="idColor"/>
				<input type="submit" value="Agregar" class="buttonCaracteristicas"/>
				<input type="button" value="Limpiar Campos" class="buttonLimpiar no"/>
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
					foreach ($colores as $color) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a title='Modificar datos' class="editButton" name="editColor" data-idcolor="<?php echo $color['idColor']?>" data-detallecolor="<?php echo $color['detalleColor']?>">
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
						</td>
						<td>
							<?php echo $color['detalleColor']?>
						</td>

					</tr>
					<?php }?>		
				</table>
			</div>
		</td>
	</tr>
</table>
<script type="text/javascript">
$('.editButton').click(function(){
	$('input[name=idColor]').val($(this).data('idcolor'));
	$('input[name=detalleColor]').val($(this).data('detallecolor'));
	$('.buttonCaracteristicas').val('Modificar');
	$('.buttonLimpiar').removeClass('no');
});
$('.buttonLimpiar').click(function(){
	$('.buttonCaracteristicas').val('Agregar');
	$('input[name=idColor]').val('');
	$('input[name=detalleColor]').val('');
	$('.buttonLimpiar').addClass('no');
});

</script>

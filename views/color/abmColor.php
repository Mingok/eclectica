	<?php 
				require_once 'classes/color/color.php';
				$colorList = new color();
				$colores = $colorList->coloresDisponibles();
				?>

<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/color/guardarColor.php" class="formColor">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Color</h2>
				
                </td>
                <td style="text-align: right;">
                <input type="submit" value="Agregar" class="buttonCaracteristicas Color"/>
				</td>
                <td style="text-align: right;">
                <input type="button" value="Limpiar Campos" class="buttonLimpiar Color no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleColor" placeholder="ingresar" class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idColor"/>
			</td></tr>
               	
			</table>
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
							<a title='Modificar datos' class="editButtonColor" name="editColor" data-idcolor="<?php echo $color['idColor']?>" data-detallecolor="<?php echo $color['detalleColor']?>">
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

//Boton Agregar o modificar
$('.editButtonColor').click(function(){
	$('input[name=idColor]').val($(this).data('idcolor'));
	$('input[name=detalleColor]').val($(this).data('detallecolor'));
	$('.buttonCaracteristicas.Color').val('Modificar');
	$('.buttonLimpiar.Color').removeClass('no');
});

//Boton limpiar campos
$('.buttonLimpiar.Color').click(function(){
	$('.buttonCaracteristicas.Color').val('Agregar');
	$('input[name=idColor]').val('');
	$('input[name=detalleColor]').val('');
	$('.buttonLimpiar.Color').addClass('no');
});

//Validacion de formulario
$('.formColor').validate();
</script>

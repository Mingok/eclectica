<?php 
    require_once 'classes/color/color.php';
    $colorList = new color();
    $colores = $colorList->coloresDisponibles();
?>

<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/color/guardarColor.php" id="formColor">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Color</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Color"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Color no"/></td>
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
		<td style="height:30px; text-align: right;">
			<div class="scrol"> 
				<table class="formu" style="width: 100%;">
			<thead>
					<tr style="text-align: center;">
						<td>
							Mod
						</td>
						<td>
							Nombre
						</td>

					</tr>
                    </thead>
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
	$('.btn-success.Color').val('Modificar');
	$('.btn-danger.Color').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Color').click(function(){
	$('.btn-success.Color').val('Agregar');
	$('input[name=idColor]').val('');
	$('input[name=detalleColor]').val('');
	$('.btn-danger.Color').addClass('no');
});

//Validacion de formulario
$('#formColor').validate();
</script>

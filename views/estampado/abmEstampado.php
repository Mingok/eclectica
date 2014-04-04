	<?php 
				require_once 'classes/estampado/estampado.php';
				$estampadoList = new estampado();
				$estampados = $estampadoList->estampadosDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/estampado/guardarEstampado.php" class="formEstampado">
				<table style="width: 100%;">
                <tr>
                <td style="padding:0">
                <h2>Estampado</h2>
				
                </td>
                <td style="text-align: right;">
                <input type="submit" value="Agregar" class="buttonCaracteristicas Estampado"/>
				</td>
                <td style="text-align: right;">
                <input type="button" value="Limpiar Campos" class="buttonLimpiar Estampado no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleEstampado" placeholder="ingresar" class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idEstampado"/>
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
					foreach ($estampados as $estampado) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a title='Modificar datos' class="editButtonEstampado" name="editEstampado" data-idestampado="<?php echo $estampado['idEstampado']?>" data-detalleestampado="<?php echo $estampado['detalleEstampado']?>">
<img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
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
<script type="text/javascript">

//Boton Agregar o modificar
$('.editButtonEstampado').click(function(){
	$('input[name=idEstampado]').val($(this).data('idestampado'));
	$('input[name=detalleEstampado]').val($(this).data('detalleestampado'));
	$('.buttonCaracteristicas.Estampado').val('Modificar');
	$('.buttonLimpiar.Estampado').removeClass('no');
});

//Boton limpiar campos
$('.buttonLimpiar.Estampado').click(function(){
	$('.buttonCaracteristicas.Estampado').val('Agregar');
	$('input[name=idEstampado]').val('');
	$('input[name=detalleEstampado]').val('');
	$('.buttonLimpiar.Estampado').addClass('no');
});

//Validacion de formulario
$('.formEstampado').validate();
</script>

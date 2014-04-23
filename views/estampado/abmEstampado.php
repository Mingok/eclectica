<?php 
require_once 'classes/estampado/estampado.php';
$estampadoList = new estampado();
$estampados = $estampadoList->estampadosDisponibles();
?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/estampado/guardarEstampado.php" id="formEstampado">
				<table style="width: 100%;">
                <tr>
                <td style="height:30px; padding:0">
                <h2>Estampado</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Estampado"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Estampado no"/></td>
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
	$('.btn-success.Estampado').val('Modificar');
	$('.btn-danger.Estampado').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Estampado').click(function(){
	$('.btn-success.Estampado').val('Agregar');
	$('input[name=idEstampado]').val('');
	$('input[name=detalleEstampado]').val('');
	$('.btn-danger.Estampado').addClass('no');
});

//Validacion de formulario
$('#formEstampado').validate();
</script>

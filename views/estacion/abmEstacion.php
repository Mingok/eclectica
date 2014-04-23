	<?php 
				require_once 'classes/estacion/estacion.php';
				$estacionList = new estacion();
				$estaciones = $estacionList->estacionesDisponibles();
				?>

<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/Estacion/guardarEstacion.php" id="formEstacion">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Estacion</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Estacion"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Estacion no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleEstacion" placeholder="ingresar" class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idEstacion"/>
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
					foreach ($estaciones as $estacion) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a title='Modificar datos' class="editButtonEstacion" name="editEstacion" data-idestacion="<?php echo $estacion['idEstacion']?>" data-detalleestacion="<?php echo $estacion['detalleEstacion']?>">
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
						</td>
						<td>
							<?php echo $estacion['detalleEstacion']?>
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
$('.editButtonEstacion').click(function(){
	$('input[name=idEstacion]').val($(this).data('idestacion'));
	$('input[name=detalleEstacion]').val($(this).data('detalleestacion'));
	$('.btn-success.Estacion').val('Modificar');
	$('.btn-danger.Estacion').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Estacion').click(function(){
	$('.btn-success.Estacion').val('Agregar');
	$('input[name=idEstacion]').val('');
	$('input[name=detalleEstacion]').val('');
	$('.btn-danger.Estacion').addClass('no');
});

//Validacion de formulario
$('#formEstacion').validate();
</script>

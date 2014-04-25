	<?php 
				require_once 'classes/estacion/estacion.php';
				$estacionList = new estacion();
				$estaciones = $estacionList->estacionesDisponibles();
				?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Estacion</h3>
	</div>
	<div class="panel-body">
		<form action="actions/Estacion/guardarEstacion.php" id="formEstacion">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleEstacion" placeholder="ingresar"  class="textCaracteristicas" required/>
					<input type="hidden" value="" name="idEstacion"/>
				</div>
				<div class="col-md-4">
					<input type="submit" value="Agregar" class="btn btn-sm btn-success Estacion"/>
					<input type="button" value="Limpiar Campos" class="btn btn-sm btn-danger Estacion no"/>
				</div>
			</div>
		</form>
		<div class="row scrol"> 
			<table class="table table-condensed">
				<thead>
					<tr style="text-align: center;">
						<td>Mod</td>
						<td>Nombre</td>
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
	</div>
</div>
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

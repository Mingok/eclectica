<?php 
require_once 'classes/estampado/estampado.php';
$estampadoList = new estampado();
$estampados = $estampadoList->estampadosDisponibles();
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Estampado</h3>
	</div>
	<div class="panel-body">
		<form action="actions/estampado/guardarEstampado.php" id="formEstampado">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleEstampado" placeholder="ingresar"  class="textCaracteristicas" required/>
					<input type="hidden" value="" name="idEstampado"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Estampado"/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Estampado no"/>
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
				foreach ($estampados as $estampado) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonEstampado" name="editEstampado" data-idestampado="<?php echo $estampado['idEstampado']?>" data-detalleestampado="<?php echo $estampado['detalleEstampado']?>">
							<img src='./imagenes/iconos/edit.png' width='14' height='14' />
						</a>
					</td>
					<td>
						<?php echo $estampado['detalleEstampado']?>
					</td>
				</tr>
				<?php }?>			
			</table>
		</div>
	</div>
</div>
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

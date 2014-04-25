<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Talle</h3>
	</div>
	<div class="panel-body">
		<form action="actions/talle/guardarTalle.php" id="formTalle">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleTalle" placeholder="ingresar"  class="textCaracteristicas" required/>
					<input type="hidden" value="" name="idTalle"/>
				</div>
				<div class="col-md-4">
					<input type="submit" value="Agregar" class="btn btn-sm btn-success Talle"/>
					<input type="button" value="Limpiar Campos" class="btn btn-sm btn-danger Talle no"/>
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
				foreach ($talles as $talle) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonTalle" name="editTalle" data-idtalle="<?php echo $talle['idTalle']?>" data-detalletalle="<?php echo $talle['detalleTalle']?>">
							<img src='./imagenes/iconos/edit.png' width='14' height='14' />
						</a>
					</td>
					<td>
						<?php echo $talle['detalleTalle']?>
					</td>

				</tr>
				<?php }?>	
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">

//Boton Agregar o modificar
$('.editButtonTalle').click(function(){
	$('input[name=idTalle]').val($(this).data('idtalle'));
	$('input[name=detalleTalle]').val($(this).data('detalletalle'));
	$('.btn-success.Talle').val('Modificar');
	$('.btn-danger.Talle').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Talle').click(function(){
	$('.btn-success.Talle').val('Agregar');
	$('input[name=idTalle]').val('');
	$('input[name=detalleTalle]').val('');
	$('.btn-danger.Talle').addClass('no');
});
//Validacion de formulario
$('#formTalle').validate();
</script>

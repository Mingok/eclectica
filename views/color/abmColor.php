<?php 
    require_once 'classes/color/color.php';
    $colorList = new color();
    $colores = $colorList->coloresDisponibles();
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Color</h3>
	</div>
	<div class="panel-body">
		<form action="actions/color/guardarColor.php" id="formColor">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleColor" placeholder="ingresar" class="textCaracteristicas" required/>
					<input type="hidden" value="" name="idColor"/>
				</div>
				<div class="col-md-4">
					<input type="submit" value="Agregar" class="btn btn-sm btn-success Color "/>
					<input type="button" value="Limpiar Campos" class="btn btn-sm btn-danger Color no"/>
				</div>
			</div>
		</form>
		<div class="row scrol"> 
			<table class="table table-condensed">
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
	</div>
</div>
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

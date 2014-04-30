<?php 
				require_once 'classes/marca/marca.php';
				$marcaList = new marca();
				$marcas = $marcaList->marcasDisponibles();
				?>
				
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Marca</h3>
	</div>
	<div class="panel-body">
		<form action="actions/Marca/guardarMarca.php" id="formMarca">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleMarca" placeholder="ingresar"  class="textCaracteristicas" required/>
					<input type="hidden" value="" name="idMarca"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Marca"/>
				<br /><br />	<input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Marca no"/>
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
				foreach ($marcas as $marca) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonMarca" name="editMarca" data-idmarca="<?php echo $marca['idMarca']?>" data-detallemarca="<?php echo $marca['detalleMarca']?>">
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
                            </td>
						<td>
							<?php echo $marca['detalleMarca']?>
					</td>

				</tr>
				<?php }?>		
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">

//Boton Agregar o modificarr
$('.editButtonMarca').click(function(){
	$('input[name=idMarca]').val($(this).data('idmarca'));
	$('input[name=detalleMarca]').val($(this).data('detallemarca'));
	$('.btn-success.Marca').val('Modificar');
	$('.btn-danger.Marca').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Marca').click(function(){
	$('.btn-success.Marca').val('Agregar');
	$('input[name=idMarca]').val('');
	$('input[name=detalleMarca]').val('');
	$('.btn-danger.Marca').addClass('no');
});
//Validacion de formulario
$('#formMarca').validate();

</script>
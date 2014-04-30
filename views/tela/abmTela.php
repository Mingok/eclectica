<?php 
    require_once 'classes/tela/tela.php';
    $telaList = new tela();
    $telas = $telaList->telasDisponibles();
?>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Tela</h3>
	</div>
	<div class="panel-body">
			<form action="actions/tela/guardarTela.php" id="formTela">
				<div class="row">
					<div class="col-md-8">
						 Nombre:<input type="text" name="detalleTela" placeholder="ingresar"  class="textCaracteristicas" required/>
						<input type="hidden" value="" name="idTela"/>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success Tela"/><br /><br />
						<input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger Tela no"/>
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
					foreach ($telas as $tela) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a title='Modificar datos' class="editButtonTela" name="editTela" data-idtela="<?php echo $tela['idTela']?>" data-detalletela="<?php echo $tela['detalleTela']?>">
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
						</td>
						<td>
							<?php echo $tela['detalleTela']?>
						</td>

					</tr>
					<?php }?>		
				</table>
			</div>
	</div>
</div>
<script type="text/javascript">

//Boton Agregar o modificar
$('.editButtonTela').click(function(){
	$('input[name=idTela]').val($(this).data('idtela'));
	$('input[name=detalleTela]').val($(this).data('detalletela'));
	$('.btn-success.Tela').val('Modificar');
	$('.btn-danger.Tela').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Tela').click(function(){
	$('.btn-success.Tela').val('Agregar');
	$('input[name=idTela]').val('');
	$('input[name=detalleTela]').val('');
	$('.btn-danger.Tela').addClass('no');
});

//Validacion de formulario
$('#formTela').validate();
</script>
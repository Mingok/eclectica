<?php 
    require_once 'classes/tela/tela.php';
    $telaList = new tela();
    $telas = $telaList->telasDisponibles();
?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/tela/guardarTela.php" id="formTela">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Tela</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Tela"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Tela no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleTela" placeholder="ingresar"  class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idTela"/>
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
		</td>
	</tr>
</table>
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
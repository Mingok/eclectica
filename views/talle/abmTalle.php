<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/talle/guardarTalle.php" id="formTalle">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Talle</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Talle"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Talle no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleTalle" placeholder="ingresar" class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idTalle"/>
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
		</td>
	</tr>
</table>
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

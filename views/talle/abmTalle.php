<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/talle/guardarTalle.php">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Talle</h2>
				
                </td>
                <td style="text-align: right;">
                <input type="submit" value="Agregar" class="buttonCaracteristicas Talle"/>
				</td>
                <td style="text-align: right;">
                <input type="button" value="Limpiar Campos" class="buttonLimpiar Talle no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleTalle" placeholder="ingresar" class="textCaracteristicas"/>
				<input type="hidden" value="" name="idTalle"/>
			</td></tr>
               	
			</table>
            </form>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<div class="scrolCaracteristicas"> 
				<table class="formuCaracteristicas" style="width: 100%;">
				
					<tr style="text-align: center;">
						<td>
							Mod
						</td>
						<td>
							Nombre
						</td>

					</tr>
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
$('.editButtonTalle').click(function(){
	$('input[name=idTalle]').val($(this).data('idtalle'));
	$('input[name=detalleTalle]').val($(this).data('detalletalle'));
	$('.buttonCaracteristicas.Talle').val('Modificar');
	$('.buttonLimpiar.Talle').removeClass('no');
});
$('.buttonLimpiar.Talle').click(function(){
	$('.buttonCaracteristicas.Talle').val('Agregar');
	$('input[name=idTalle]').val('');
	$('input[name=detalleTalle]').val('');
	$('.buttonLimpiar.Talle').addClass('no');
});

</script>

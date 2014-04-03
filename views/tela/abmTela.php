	<?php 
				require_once 'classes/tela/tela.php';
				$telaList = new tela();
				$telas = $telaList->telasDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/tela/guardarTela.php">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Tela</h2>
				
                </td>
                <td style="text-align: right;">
                <input type="submit" value="Agregar" class="buttonCaracteristicas Tela"/>
				</td>
                <td style="text-align: right;">
                <input type="button" value="Limpiar Campos" class="buttonLimpiar Tela no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleTela" placeholder="ingresar"  class="textCaracteristicas"/>
				<input type="hidden" value="" name="idTela"/>
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
$('.editButtonTela').click(function(){
	$('input[name=idTela]').val($(this).data('idtela'));
	$('input[name=detalleTela]').val($(this).data('detalletela'));
	$('.buttonCaracteristicas.Tela').val('Modificar');
	$('.buttonLimpiar.Tela').removeClass('no');
});
$('.buttonLimpiar.Tela').click(function(){
	$('.buttonCaracteristicas.Tela').val('Agregar');
	$('input[name=idTela]').val('');
	$('input[name=detalleTela]').val('');
	$('.buttonLimpiar.Tela').addClass('no');
});

</script>
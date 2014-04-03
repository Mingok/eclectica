<?php 
				require_once 'classes/marca/marca.php';
				$marcaList = new marca();
				$marcas = $marcaList->marcasDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/Marca/guardarMarca.php">
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Marca</h2>
				
                </td>
                <td style="text-align: right;">
                <input type="submit" value="Agregar" class="buttonCaracteristicas Marca"/>
				</td>
                <td style="text-align: right;">
                <input type="button" value="Limpiar Campos" class="buttonLimpiar Marca no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleMarca" placeholder="ingresar" class="textCaracteristicas"/>
				<input type="hidden" value="" name="idMarca"/>
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
		</td>
	</tr>
</table>


<script type="text/javascript">
$('.editButtonMarca').click(function(){
	$('input[name=idMarca]').val($(this).data('idmarca'));
	$('input[name=detalleMarca]').val($(this).data('detallemarca'));
	$('.buttonCaracteristicas.Marca').val('Modificar');
	$('.buttonLimpiar.Marca').removeClass('no');
});
$('.buttonLimpiar.Marca').click(function(){
	$('.buttonCaracteristicas.Marca').val('Agregar');
	$('input[name=idMarca]').val('');
	$('input[name=detalleMarca]').val('');
	$('.buttonLimpiar.Marca').addClass('no');
});

</script>
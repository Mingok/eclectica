<?php 
				require_once 'classes/marca/marca.php';
				$marcaList = new marca();
				$marcas = $marcaList->marcasDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="height:30px; text-align: left; " >
			<form action="actions/Marca/guardarMarca.php" id="formMarca" >
				<table style="width: 100%;">
                <tr>
                <td>
                <h2>Marca</h2>
				
                </td>
                <td style="height:30px; text-align: right;">
                <input type="submit" value="Agregar" class="btn-success Marca"/>
				</td>
                <td style="height:30px; text-align: left; padding-left: 15px;">
                <input type="button" value="Limpiar Campos" class="btn-danger Marca no"/></td>
                </tr>
                <tr>
                <td colspan="3"> Nombre: &nbsp;<input type="text" name="detalleMarca" placeholder="ingresar" class="textCaracteristicas" required/>
				<input type="hidden" value="" name="idMarca"/>
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
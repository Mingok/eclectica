	<?php 
				require_once 'classes/tipoVenta/tipoVenta.php';
				$tipoVentaList = new tipoVenta();
				$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
				?>
<table style="vertical-align: middle; width: 100%;" >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/tipoVenta/guardarTipoVenta.php" class="formTipoVenta">
				<table style="width: 100%;">
                <tr>
                <td style="width:45%">
                <h2>Pregios y Grupos</h2>
				
                </td>
                <td style="text-align: right;width:55%">    
			<input type="submit" value="Modificar" class="buttonCaracteristicas TipoVenta no"/>
           <input type="button" value="Limpiar Campos" class="buttonLimpiar TipoVenta no"/></td>
		</td>  
                </tr>
                <tr> 
                	<td style="text-align: left; ">
			Nombre: &nbsp;
			<input type="text" class="textCaracteristicas" name="detalleTipoVenta" placeholder="ingrese" style="width: 130px;" required/>
            </td>
            <td align="Left">Grupo: &nbsp;
            <input type="text" class="textCaracteristicas" name="grupoTipoVenta" placeholder="1-2-3" style="width: 30px;" required />
            <input type="hidden" value="" name="idTipoVenta"/>
		</td>
        </tr>
        <tr>
		     
        </tr>
        
               	
			</table>
            </form>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: right;">
			<table class="formuCaracteristicas" style="width: 100%;">
				<tr style="text-align: center;">
					<td>
						Mod
					</td>
					<td>
						Nombre
					</td>
					<td>
						Grupo
					</td>
				</tr>
				<?php 
					foreach ($tipoVentas as $tipoVenta) {
					?>					
					<tr style='text-align: center'>
						<td style="width: 10%;">
							<a title='Modificar datos' class="editButtonTipoVenta" name="editTipoVenta" data-idtipoventa="<?php echo $tipoVenta['idTipoVenta']?>" data-grupotipoventa="<?php echo $tipoVenta['grupoTipoVenta']?>" data-detalletipoventa="<?php echo $tipoVenta['detalleTipoVenta']?>">
								<img src='./imagenes/iconos/edit.png' width='14' height='14' />
							</a>
						</td>
						<td style="width: 70%;">
							<?php echo $tipoVenta['detalleTipoVenta']?>
						</td>
                        <td style="width: 20%;">
							<?php echo $tipoVenta['grupoTipoVenta']?>
						</td>

					</tr>
					<?php }?>		
			</table>
		</td>

	</tr>
</table>
<script type="text/javascript">

//Boton Agregar o modificar
$('.editButtonTipoVenta').click(function(){
    $('input[name=idTipoVenta]').val($(this).data('idtipoventa'));
	$('input[name=detalleTipoVenta]').val($(this).data('detalletipoventa'));
    $('input[name=grupoTipoVenta]').val($(this).data('grupotipoventa'));
	$('.buttonCaracteristicas.TipoVenta').val('Modificar');
	$('.buttonLimpiar.TipoVenta').removeClass('no');
    $('.buttonCaracteristicas.TipoVenta').removeClass('no');
	
});

//Boton limpiar campos
$('.buttonLimpiar.TipoVenta').click(function(){
	$('.buttonCaracteristicas.TipoVenta').val('Agregar');
	$('input[name=idTipoVenta]').val('');
	$('input[name=detalleTipoVenta]').val('');
    $('input[name=grupoTipoVenta]').val('');
	$('.buttonLimpiar.TipoVenta').addClass('no');
    $('.buttonCaracteristicas.TipoVenta').addClass('no');
	
});

//Validacion de formulario
$('.formTipoVenta').validate();
</script>
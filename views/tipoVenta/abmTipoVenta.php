<?php 
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Precios y Grupos</h3>
	</div>
	<div class="panel-body">
		<form action="actions/tipoVenta/guardarTipoVenta.php" id="formTipoVenta">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-6">
							Nombre:<input type="text" class="textCaracteristicas" name="detalleTipoVenta" placeholder="ingrese" style="width: 130px;" required/>
						</div>
						<div class="col-md-4">
							Grupo:<input type="text" class="textCaracteristicas" name="grupoTipoVenta" placeholder="1-2-3" style="width: 30px;" required />
						</div>
					</div>
					<input type="hidden" value="" name="idTipoVenta"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Modificar" class="btn btn-sm btn-success TipoVenta no"/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger TipoVenta no"/>
				</div>
			</div>
		</form>
		<div class="row scrol"> 
			<table class="table table-condensed">
				<thead>
	                <tr style="text-align: center;">
						<td>Mod</td>
						<td>Nombre</td>
						<td>Grupo</td>
					</tr>
                </thead>
				<?php 
				foreach ($tipoVentas as $tipoVenta) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonTipoVenta" name="editTipoVenta" data-idtipoventa="<?php echo $tipoVenta['idTipoVenta']?>" data-grupotipoventa="<?php echo $tipoVenta['grupoTipoVenta']?>" data-detalletipoventa="<?php echo $tipoVenta['detalleTipoVenta']?>">
							<img src='./imagenes/iconos/edit.png' width='14' height='14' />
						</a>
					</td>
					<td>
						<?php echo $tipoVenta['detalleTipoVenta']?>
					</td>
                    <td>
						<?php echo $tipoVenta['grupoTipoVenta']?>
					</td>

				</tr>
				<?php }?>	
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">

//Boton Agregar o modificar
$('.editButtonTipoVenta').click(function(){
    $('input[name=idTipoVenta]').val($(this).data('idtipoventa'));
	$('input[name=detalleTipoVenta]').val($(this).data('detalletipoventa'));
    $('input[name=grupoTipoVenta]').val($(this).data('grupotipoventa'));
	$('.btn-success.TipoVenta').val('Modificar');
	$('.btn-danger.TipoVenta').removeClass('no');
    $('.btn-success.TipoVenta').removeClass('no');
	
});

//Boton limpiar campos
$('.btn-danger.TipoVenta').click(function(){
	$('.btn-success.TipoVenta').val('Agregar');
	$('input[name=idTipoVenta]').val('');
	$('input[name=detalleTipoVenta]').val('');
    $('input[name=grupoTipoVenta]').val('');
	$('.btn-danger.TipoVenta').addClass('no');
    $('.btn-success.TipoVenta').addClass('no');
	
});

//Validacion de formulario
$('#formTipoVenta').validate();
</script>
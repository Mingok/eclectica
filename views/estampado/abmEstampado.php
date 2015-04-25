<?php 
require_once 'classes/estampado/estampado.php';
$estampadoList = new estampado();
$estampados = $estampadoList->estampadosDisponibles();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title" style="font-weight: bold; ">Estampado</h3>
	</div>
	<div class="panel-body">
		<form action="actions/estampado/guardarEstampado.php" id="formEstampado">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleEstampado" title="Ingresar Estampado" placeholder="ingresar" style="width: 160px" class="form-control" required/>
					<input type="hidden" value="" name="idEstampado"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Estampado"/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Estampado no"/>
				</div>
			</div>
		</form>
         <div  id="exitoEstampado" >
        <p class="alert-success" style="text-align: center">
            <b>Se Creo/Modifico Estampado</b></p>
        </div>
		<div class="row scrol"> 
			<table class="table table-condensed">
				<thead>
					<tr style="text-align: center;">
						<td><strong>Mod</strong></td>
						<td><strong>Nombre</strong></td>
					</tr>
                </thead>
				<?php 
				foreach ($estampados as $estampado) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonEstampado" name="editEstampado" data-idestampado="<?php echo $estampado['idEstampado']?>" data-detalleestampado="<?php echo $estampado['detalleEstampado']?>">
							<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
						</a>
					</td>
					<td>
						<?php echo $estampado['detalleEstampado']?>
					</td>
				</tr>
				<?php }?>			
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function(){
    
    $("#exitoEstampado").hide();
    mostrar = getParameterByName('guardaEstampado');
    if (mostrar=='ok'){    
         $("#exitoEstampado").show("slow");
        $("#exitoEstampado").delay(5000).hide(1000);
     } 
     
 });
//Boton Agregar o modificar
$('.editButtonEstampado').click(function(){
	$('input[name=idEstampado]').val($(this).data('idestampado'));
	$('input[name=detalleEstampado]').val($(this).data('detalleestampado'));
	$('.btn-success.Estampado').val('Modificar');
	$('.btn-danger.Estampado').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Estampado').click(function(){
	$('.btn-success.Estampado').val('Agregar');
	$('input[name=idEstampado]').val('');
	$('input[name=detalleEstampado]').val('');
	$('.btn-danger.Estampado').addClass('no');
});

//Validacion de formulario
$('#formEstampado').validate();
</script>

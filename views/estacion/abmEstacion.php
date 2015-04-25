	<?php 
				require_once 'classes/estacion/estacion.php';
				$estacionList = new estacion();
				$estaciones = $estacionList->estacionesDisponibles();
				?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title" style="font-weight: bold; ">Estacion</h3>
	</div>
	<div class="panel-body">
		<form action="actions/Estacion/guardarEstacion.php" id="formEstacion">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleEstacion" title="Ingresar Estacion" placeholder="ingresar"  style="width: 160px" class="form-control" required/>
					<input type="hidden" value="" name="idEstacion"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Estacion"/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Estacion no"/>
				</div>
			</div>
		</form>
        <div  id="exitoEstacion" >
        <p class="alert-success" style="text-align: center">
            <b>Se Creo/Modifico Estacion</b></p>
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
				foreach ($estaciones as $estacion) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonEstacion" name="editEstacion" data-idestacion="<?php echo $estacion['idEstacion']?>" data-detalleestacion="<?php echo $estacion['detalleEstacion']?>">
							<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
						</a>
					</td>
					<td>
						<?php echo $estacion['detalleEstacion']?>
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
    
    $("#exitoEstacion").hide();
    mostrar = getParameterByName('guardaEstacion');
    if (mostrar=='ok'){    
         $("#exitoEstacion").show("slow");
        $("#exitoEstacion").delay(5000).hide(1000);
     } 
     
 });
//Boton Agregar o modificar
$('.editButtonEstacion').click(function(){
	$('input[name=idEstacion]').val($(this).data('idestacion'));
	$('input[name=detalleEstacion]').val($(this).data('detalleestacion'));
	$('.btn-success.Estacion').val('Modificar');
	$('.btn-danger.Estacion').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Estacion').click(function(){
	$('.btn-success.Estacion').val('Agregar');
	$('input[name=idEstacion]').val('');
	$('input[name=detalleEstacion]').val('');
	$('.btn-danger.Estacion').addClass('no');
});

//Validacion de formulario
$('#formEstacion').validate();
</script>

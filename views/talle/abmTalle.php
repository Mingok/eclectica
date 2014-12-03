<?php 
				require_once 'classes/talle/talle.php';
				$talleList = new talle();
				$talles = $talleList->tallesDisponibles();
				?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Talle</h3>
	</div>
	<div class="panel-body">
		<form action="actions/talle/guardarTalle.php" id="formTalle">
			<div class="row">
				<div class="col-md-8">
					 Nombre:<input type="text" name="detalleTalle" placeholder="ingresar"  style="width: 160px" class="form-control" title="Ingresar Talle" required/>
					<input type="hidden" value="" name="idTalle"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Talle"/>
				<br /><br />	<input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Talle no"/>
				</div>
			</div>
		</form>
         <div id="exitoTalle" >
        <p class="alert-success" style="text-align: center">
            <b>Se Creo/Modifico Talle</b></p>
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
				foreach ($talles as $talle) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonTalle" name="editTalle" data-idtalle="<?php echo $talle['idTalle']?>" data-detalletalle="<?php echo $talle['detalleTalle']?>">
							<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
						</a>
					</td>
					<td>
						<?php echo $talle['detalleTalle']?>
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
    
    $("#exitoTalle").hide();
    mostrar = getParameterByName('guardaTalle');
    if (mostrar=='ok'){    
         $("#exitoTalle").show("slow");
        $("#exitoTalle").delay(5000).hide(1000);
     } 
     
 });
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

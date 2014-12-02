<?php
    require_once 'classes/tela/tela.php';
    $telaList = new tela();
    $telas = $telaList->telasDisponibles();
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Tela</h3>
	</div>
	<div class="panel-body">
			<form action="actions/tela/guardarTela.php" id="formTela">
				<div class="row">
					<div class="col-md-8">
						 Nombre:<input type="text" style="width: 160px" class="form-control" name="detalleTela" placeholder="ingresar"  class="textCaracteristicas" title="Ingresar Tela" required/>
						<input type="hidden" value="" name="idTela"/>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success Tela"/><br /><br />
						<input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger Tela no"/>
					</div>
				</div>
			</form>
            <div  id="exitoTela" >
            <p class="alert-error">
            Se Creo/Modifico Tela</p>
            </div>
			<div class="row scrol"> 
				<table class="table table-condensed">
					<thead>
						<tr style="text-align: center;">
							<td>
								<strong>Mod</strong>
							</td>
							<td>
								<strong>Nombre</strong>
							</td>
						</tr>
                    </thead>
					<?php 
					foreach ($telas as $tela) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a title='Modificar datos' class="editButtonTela" name="editTela" data-idtela="<?php echo $tela['idTela']?>" data-detalletela="<?php echo $tela['detalleTela']?>">
								<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
							</a>
						</td>
						<td>
							<?php echo $tela['detalleTela']?>
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
    
    $("#exitoTela").hide();
    mostrar = getParameterByName('guardaTela');
    if (mostrar=='ok'){    
         $("#exitoTela").show("slow");
        $("#exitoTela").delay(5000).hide(1000);
     } 
     
 });
//Boton Agregar o modificar
$('.editButtonTela').click(function(){
	$('input[name=idTela]').val($(this).data('idtela'));
	$('input[name=detalleTela]').val($(this).data('detalletela'));
	$('.btn-success.Tela').val('Modificar');
	$('.btn-danger.Tela').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Tela').click(function(){
	$('.btn-success.Tela').val('Agregar');
	$('input[name=idTela]').val('');
	$('input[name=detalleTela]').val('');
	$('.btn-danger.Tela').addClass('no');
});

//Validacion de formulario
$('#formTela').validate();
</script>
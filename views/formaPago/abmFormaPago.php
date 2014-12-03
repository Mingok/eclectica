<?php 
    require_once 'classes/formaPago/formaPago.php';
    $formaPagoList = new formaPago();
    $formaPago = $formaPagoList->formaPagoDisponibles();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Forma de Pago</h3>
	</div>
	<div class="panel-body">
            <form action="actions/formaPago/guardarFormaPago.php" id="formFormaPago">
			<div class="row">
				<div class="col-md-8">
                                    Nombre:<input type="text" name="detalleFormaPago" style="width: 160px" class="form-control" title="Ingresar FormaPago" placeholder="ingresar" required/>
					<input type="hidden" value="" name="idFormaPago"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success formaPago "/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger formaPago no"/>
				</div>
			</div>
		</form>
        <div  id="exitoFormaPago" >
        <p class="alert-success" style="text-align: center">
                <b>Se Creo/Modifico FormaPago</b></p>
        </div>
		<div class="row scrol"> 
			<table class="table table-condensed">
			<thead >
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
				foreach ($formaPago as $formaPago) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonFormaPago" name="editFormaPago" data-idformaPago="<?php echo $formaPago['idFormaPago']?>" data-detalleFormaPago="<?php echo $formaPago['detalleFormaPago']?>">
							<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
						</a>
					</td>
					<td>
						<?php echo $formaPago['detalleFormaPago']?>
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
    
    $("#exitoFormaPago").hide();
    mostrar = getParameterByName('guardaFormaPago');
    if (mostrar=='ok'){    
         $("#exitoFormaPago").show("slow");
        $("#exitoFormaPago").delay(5000).hide(1000);
     } 
     
 });
//Boton Agregar o modificar
$('.editButtonFormaPago').click(function(){
	$('input[name=idFormaPago]').val($(this).data('idformapago'));
	$('input[name=detalleFormaPago]').val($(this).data('detalleformapago'));
	$('.btn-success.formaPago').val('Modificar');
	$('.btn-danger.formaPago').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.formaPago').click(function(){
	$('.btn-success.formaPago').val('Agregar');
	$('input[name=idFormaPago]').val('');
	$('input[name=detalleFormaPago]').val('');
	$('.btn-danger.formaPago').addClass('no');
});

//Validacion de formulario
$('#formFormaPago').validate();


</script>

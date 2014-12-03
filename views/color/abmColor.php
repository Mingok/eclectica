<?php 
    require_once 'classes/color/color.php';
    $colorList = new color();
    $colores = $colorList->coloresDisponibles();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Color</h3>
	</div>
	<div class="panel-body">
		<form action="actions/color/guardarColor.php" id="formColor">
			<div class="row">
				<div class="col-md-8">
                                    Nombre:<input type="text" name="detalleColor" style="width: 160px" class="form-control" title="Ingresar Color" placeholder="ingresar" required/>
					<input type="hidden" value="" name="idColor"/>
				</div>
				<div class="col-md-4">
					<input type="submit" style="width: 100px;" value="Agregar" class="btn btn-sm btn-success Color "/>
					<br /><br /><input type="button" style="width: 100px;" value="Limpiar Campos" class="btn btn-sm btn-danger Color no"/>
				</div>
			</div>
		</form>
        <div  id="exitoColor" >
        <p class="alert-success" style="text-align: center">
                <b>Se Creo/Modifico Color</b></p>
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
				foreach ($colores as $color) {
				?>					
				<tr style='text-align: center'>
					<td>
						<a title='Modificar datos' class="editButtonColor" name="editColor" data-idcolor="<?php echo $color['idColor']?>" data-detallecolor="<?php echo $color['detalleColor']?>">
							<img src='./imagenes/iconos/edit.png' width='18px' height='18px' />
						</a>
					</td>
					<td>
						<?php echo $color['detalleColor']?>
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
    
    $("#exitoColor").hide();
    mostrar = getParameterByName('guardaColor');
    if (mostrar=='ok'){    
         $("#exitoColor").show("slow");
        $("#exitoColor").delay(5000).hide(1000);
     } 
     
 });
//Boton Agregar o modificar
$('.editButtonColor').click(function(){
	$('input[name=idColor]').val($(this).data('idcolor'));
	$('input[name=detalleColor]').val($(this).data('detallecolor'));
	$('.btn-success.Color').val('Modificar');
	$('.btn-danger.Color').removeClass('no');
});

//Boton limpiar campos
$('.btn-danger.Color').click(function(){
	$('.btn-success.Color').val('Agregar');
	$('input[name=idColor]').val('');
	$('input[name=detalleColor]').val('');
	$('.btn-danger.Color').addClass('no');
});

//Validacion de formulario
$('#formColor').validate();


</script>

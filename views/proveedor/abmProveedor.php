<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles ();
?>
<h1>Proveedores</h1>
<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-body ">
<div style="padding-bottom: 10px; text-align: right;"><label
	for="txtProveedor"> Buscar: </label> <input type="search"
	style="width: 375px" id="txtProveedor" class="textPrendas"
	placeholder="Escriba el Nombre que desea encontrar y presione la ENTER"
	autofocus /> &nbsp;&nbsp;&nbsp; <input type="button" value="Nuevo"
	style="width: 100px;" class="buttonProvNuevo btn btn-sm btn-success"/>
</div>
<div class="scrol1">
<table class="table table-striped" id="tblProveedor">
	<thead class="btn-success">
		<tr style="text-align: center;">
			<td style="height: 30px; width: 8%;"><strong> Mod </strong></td>
			<td style="width: 40%"><strong> Nombre </strong></td>
			<td style="width: 25%"><strong> Contacto </strong></td>
			<td style="width: 27%"><strong> Telefono </strong></td>
		</tr>
	</thead>
	<tbody>
								<?php
								foreach ( $proveedores as $proveedor ) {
									?>
									<tr style='text-align: center'>
			<td><a tite='Modificar datos del empleado'
				class="editButtonProveedor" name="editProveedor"
				data-emailProveedor="<?php
									echo $proveedor ['emailProveedor']?>"
				data-idProveedor="<?php
									echo $proveedor ['idProveedor']?>"
				data-nombreProveedor="<?php
									echo $proveedor ['nombreProveedor']?>"
				data-cuitProveedor="<?php
									echo $proveedor ['cuitProveedor']?>"
				data-condIvaProveedor="<?php
									echo $proveedor ['condIvaProveedor']?>"
				data-direccionProveedor="<?php
									echo $proveedor ['direccionProveedor']?>"
				data-localidadproveedor="<?php
									echo $proveedor ['localidadProveedor']?>"
				data-telefonoProveedor="<?php
									echo $proveedor ['telefonoProveedor']?>"
				data-contactoProveedor="<?php
									echo $proveedor ['contactoProveedor']?>"
				data-bancoProveedor="<?php
									echo $proveedor ['bancoProveedor']?>"
				data-cbuProveedor="<?php
									echo $proveedor ['cbuProveedor']?>"> <img
				src='./imagenes/iconos/edit.png' width='18px' height='18px' /> </a>
			</td>
			<td>
											<?php
									echo $proveedor ['nombreProveedor']?>
										</td>
			<td>
											<?php
									echo $proveedor ['contactoProveedor']?>
										</td>
			<td>
											<?php
									echo $proveedor ['telefonoProveedor']?>
										</td>
		</tr>
									<?php
								}
								?>
							</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div id="divProv" style="display: none;">
<form action="actions/proveedor/guardarProveedor.php"
	class="formProveedor" id="formProveedor">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Datos del Proveedor</h3>
</div>
<div class="panel-body">
<div class="row" style="height: 35px;">
<div class="col-md-4" style="text-align: right;"><label
	for="nombreProveedor" style="width: 100px;"> Raz&oacute;n Soc.: </label>
<input type="text" id="nombreProveedor" name="nombreProveedor"
	title="Ingrese Razon Social" style="width: 100px;" maxlength="50px"
	placeholder="Ingrese" required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="cuitProveedor" style="width: 100px;"> CUIT: </label> <input
	type="text" id="cuitProveedor" name="cuitProveedor"
	style="width: 100px;" title="Ingrese CUIT" maxlength="50px"
	placeholder="xx-xxxxxxxxx-xx " required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="condIvaProveedor" style="width: 100px;"> Cond. IVA: </label> <input
	type="text" id="condIvaProveedor" name="condIvaProveedor"
	style="width: 100px;" maxlength="50px" title="Ingrese CONDICION"
	placeholder="Ingrese" required /></div>
</div>
<div class="row" style="height: 35px;">
<div class="col-md-4" style="text-align: right;"><label
	for="direccionProveedor" style="width: 100px;"> Domicilio: </label> <input
	type="text" id="direccionProveedor" name="direccionProveedor"
	style="width: 120px;" title="Ingrese DOMICILIO" placeholder="Ingrese"
	required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="localidadProveedor" style="width: 100px;"> Localidad: </label> <input
	type="text" id="localidadProveedor" name="localidadProveedor"
	style="width: 100px;" maxlength="50px" title="Ingrese LOCALIDAD"
	placeholder="Ingrese" required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="bancoProveedor" style="width: 100px;"> Banco: </label> <input
	type="text" id="bancoProveedor" name="bancoProveedor"
	style="width: 100px;" title="Ingrese BANCO" placeholder="Ingrese"
	required required /></div>
</div>
<div class="row" style="height: 35px;">
<div class="col-md-4" style="text-align: right;"><label
	for="contactoProveedor" style="width: 100px;"> Contacto: </label> <input
	type="text" id="contactoProveedor" name="contactoProveedor"
	style="width: 100px;" maxlength="50px" title="Ingrese CONTACTO"
	placeholder="ingrese" required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="telefonoProveedor" style="width: 100px;"> Telefono: </label> <input
	type="text" id="telefonoProveedor" name="telefonoProveedor"
	style="width: 120px;" maxlength="50px " title="Ingrese TELEFONO "
	placeholder="ingrese" required /></div>
<div class="col-md-4" style="text-align: right;"><label
	for="cbuProveedor" style="width: 100px;"> CBU </label> <input
	type="text" id="cbuProveedor" name="cbuProveedor" style="width: 100px;"
	maxlength="50px " placeholder="Ingrese" title="Ingrese CBU" required />
</div>
</div>
<div class="row">
<div class="col-md-4" style="text-align: right;"><label
	for="emailProveedor" style="width: 100px;"> Email </label> <input
	type="email" title="Ingrese Email Correcto" id="emailProveedor"
	name="emailProveedor" placeholder="Ingrese" style="width: 200px;"
	required /></div>
<div class="col-md-4" style="text-align: right;"></div>
<div class="col-md-4" style="text-align: right;"><input type="hidden"
	value="" name="idProveedor" /> <input type="submit" value="Agregar"
	style="width: 100px;" class="btn btn-sm btn-success Prov " /> <input
	type="button" value="Limpiar" style="width: 100px;"
	class="btn btn-sm btn-danger no" /></div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

<script type="text/javascript">
		
			
			$('.editButtonProveedor').click(function() {
				$('input[name=idProveedor]').val($(this).data('idproveedor'));
				$('input[name=nombreProveedor]').val($(this).data('nombreproveedor'));
				$('input[name=cuitProveedor]').val($(this).data('cuitproveedor'));
				$('input[name=condIvaProveedor]').val($(this).data('condivaproveedor'));
				$('input[name=direccionProveedor]').val($(this).data('direccionproveedor'));
				$('input[name=localidadProveedor]').val($(this).data('localidadproveedor'));
				$('input[name=telefonoProveedor]').val($(this).data('telefonoproveedor'));
				$('input[name=contactoProveedor]').val($(this).data('contactoproveedor'));
                $('input[name=emailProveedor]').val($(this).data('emailproveedor'));			
				$('input[name=bancoProveedor]').val($(this).data('bancoproveedor'));
				$('input[name=cbuProveedor]').val($(this).data('cbuproveedor'));
                $('#divProv').show("slow");
                $('html,body').animate({scrollTop: $("#divProv").offset().top}, 2000);
				$('.btn-success.Prov').val('Modificar');
				$('.btn-danger').removeClass('no');
			});

			//Boton limpiar campos
			$('.btn-danger').click(function() {
			location.reload();
			});
			$('.buttonProvNuevo').click(function() {
			 
				$('input[name=idProveedor]').val('');
                $('input[name=emailProveedor]').val('');
				$('input[name=nombreProveedor]').val('');
				$('input[name=cuitProveedor]').val('');
				$('input[name=condIvaProveedor]').val('');
				$('input[name=direccionProveedor]').val('');
				$('input[name=localidadProveedor]').val('');
				$('input[name=telefonoProveedor]').val('');
				$('input[name=contactoProveedor]').val('');
				$('input[name=bancoProveedor]').val('');
				$('input[name=cbuProveedor]').val('');
				    
			$('.btn-success').val('Agregar');
			$('#divProv').show("slow");
            $('html,body').animate({
        scrollTop: $("#divProv").offset().top
    }, 2000);
			$('.btn-danger').removeClass('no');

		});

			//Validacion de formulario

			$("#formProveedor").validate();
		
		
		</script>
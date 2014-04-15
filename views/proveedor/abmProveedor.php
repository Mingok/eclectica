<?php 
require_once 'classes/proveedor/proveedor.php'; 
$proveedorList = new proveedor(); 
$proveedores = $proveedorList->proveedoresDisponibles(); 
?>
	<h1 style="text-align: left;">
		&nbsp;Proveedores &nbsp;
	</h1>
	<hr />
	<table class="tablaProv">
		<tr>
			<td>
				<table style="width:500px">
					<tr style="vertical-align: middle;">
						<td>
							<table style="width: 100%;">
								<tr>
									<td style="text-align: Left; ">
										<h2>
											Proveedores
										</h2>
									</td>
									<td style="text-align: Right; ">
										Buscar: &nbsp;
										<select name="select" class="textProv" style="width:250px">
											<option selected="selected">
												ESSENCE
											</option>
										</select>
									</td>
								</tr>
							</table>
							<div class="scrolProv">
								<table class="formuProv" style="width: 100%;">
									<tr style="text-align: center;">
										<td style="width: 8%;">
											Mod
										</td>
										<td width="40">
											Nombre
										</td>
										<td width="25%">
											Contacto
										</td>
										<td width="27%">
											Telefono
										</td>
                                      
									</tr>
									<?php foreach ($proveedores as $proveedor) { ?>
										<tr style='text-align: center'>
											<td>
												<a  tite='Modificar datos del empleado' class="editButtonProveedor" name="editProveedor"
												data-idProveedor="<?php echo $proveedor['idProveedor']?>" 
												data-nombreProveedor="<?php echo $proveedor['nombreProveedor']?>"
												data-cuitProveedor="<?php echo $proveedor['cuitProveedor']?>"
												data-condIvaProveedor="<?php echo $proveedor['condIvaProveedor']?>"
												data-direccionProveedor="<?php echo $proveedor['direccionProveedor']?>"
												data-localidadProveedor="<?php echo $proveedor['localidadProveedor']?>"
												data-telefonoProveedor="<?php echo $proveedor['telefonoProveedor']?>"
												data-contactoProveedor="<?php echo $proveedor['contactoProveedor']?>"
												data-bancoProveedor="<?php echo $proveedor['bancoProveedor']?>"
												data-cbuProveedor="<?php echo $proveedor['cbuProveedor']?>"
												>
													<img src='./imagenes/iconos/edit.png' width='14' height='14' />
												</a>
											</td>
											<td>
												<?php echo $proveedor[ 'nombreProveedor']?>
											</td>
											<td>
												<?php echo $proveedor[ 'contactoProveedor']?>
											</td>
											<td>
												<?php echo $proveedor[ 'telefonoProveedor']?>
											</td>
                                         
										</tr>
										<?php }?>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</td>
			<td>
				<table style="width:635px;">
					<tr style="vertical-align: middle;">
						<td style="text-align: center;">
							<form action="actions/proveedor/guardarProveedor.php" class="formProveedor">
								<table style="width:630px; ">
									<tr style="vertical-align: middle;">
										<td style="text-align: center;" colspan="4 ">
											<h2>
												Datos del Proveedor
											</h2>
										</td>
									</tr>
									<tr>
										<td style=" text-align:Right; ">
											Raz&oacute;n Soc.:&nbsp;
											<input type="text " style="width: 100px; " maxlength="50px " name="nombreProveedor" placeholder="ingrese " required />
										</td>
										<td style=" text-align:Right; ">
											CUIT:&nbsp;
											<input type="text " style="width: 120px; " maxlength="50px " name="cuitProveedor" placeholder="ingrese "  required />
										</td>
										<td style=" text-align:Right; ">
											Cond. IVA:
											<input type="text " style="width: 100px; " maxlength="50px " name="condIvaProveedor" placeholder="ingrese "  required />
										</td>
									</tr>
									<tr>
										<td style=" text-align:Right; ">
											Domicilio:&nbsp;
											<input type="text " style="width: 150px; " name="direccionProveedor" placeholder="ingrese "  required />
										</td>
										<td style=" text-align:Right; ">
											Localidad:&nbsp;&nbsp;
											<input type="text " style="width: 100px; " maxlength="50px " name="localidadProveedor" placeholder="ingrese "  required />
										</td>
										<td style=" text-align:Right; ">
											Banco:&nbsp;
											<input type="text " style="width: 100px; " name="bancoProveedor" placeholder="ingrese "  required  required/>
										</td>
									</tr>
									<tr>
										<td style=" text-align:Right; ">
											Contacto:&nbsp;
											<input type="text " style="width: 100px; " maxlength="50px " name="contactoProveedor" placeholder="ingrese "  required />
										</td>
										<td style=" text-align:Right; ">
											Telefono:&nbsp;
											<input type="text " style="width: 120px; " maxlength="50px " name="telefonoProveedor" placeholder="ingrese "  required />
										</td>
										<td style=" text-align:Right; ">
											CBU&nbsp;
											<input type="text " style="width: 100px; " maxlength="50px " name="cbuProveedor" placeholder="ingrese "  required />
										</td>
									</tr>
									<tr>
										<td style="text-align: right;">
											<input type="hidden" value="" name="idProveedor"/>
											<input type="submit" value="Agregar" class="buttonProv" />
										</td>
										<td style="text-align: right;">
						                	<input type="button" value="Limpiar Campos" class="buttonLimpiar Proveedor no"/></td>
						                </tr>
									</tr>
								</table>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<script type="text/javascript">
$('.editButtonProveedor').click(function(){
	console.log($(this).data('idProveedor'))
	$('input[name=idProveedor]').val($(this).data('idproveedor'));
	$('input[name=nombreProveedor]').val($(this).data('nombreproveedor'));
	$('input[name=cuitProveedor]').val($(this).data('cuitproveedor'));
	$('input[name=condIvaProveedor]').val($(this).data('condivaproveedor'));
	$('input[name=direccionProveedor]').val($(this).data('direccionproveedor'));
	$('input[name=localidadProveedor]').val($(this).data('localidadproveedor'));
	$('input[name=telefonoProveedor]').val($(this).data('telefonoproveedor'));
	$('input[name=contactoProveedor]').val($(this).data('contactoproveedor'));
	$('input[name=bancoProveedor]').val($(this).data('bancoproveedor'));
	$('input[name=cbuProveedor]').val($(this).data('cbuproveedor'));
	
	$('.buttonProv').val('Modificar');
	$('.buttonLimpiar.Proveedor').removeClass('no');
});

//Boton limpiar campos
$('.buttonLimpiar.Proveedor').click(function(){
	$('.buttonProv').val('Agregar');
	$('input[name=idProveedor]').val('');
	$('input[name=nombreProveedor]').val('');
	$('input[name=cuitProveedor]').val('');
	$('input[name=condIvaProveedor]').val('');
	$('input[name=direccionProveedor]').val('');
	$('input[name=localidadProveedor]').val('');
	$('input[name=telefonoProveedor]').val('');
	$('input[name=contactoProveedor]').val('');
	$('input[name=bancoProveedor]').val('');
	$('input[name=cbuProveedor]').val('');
	$('.buttonLimpiar.Proveedor').addClass('no');
});

//Validacion de formulario
$('.formColor').validate();
$('.formProveedor').validate();
</script>
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
												<a  tite='Modificar datos del empleado' href='./actions/proveedor/camposProveedor.php?id="<?php echo $proveedor[ "idProveedor"]?>"'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
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
											Raz�n Soc.:&nbsp;
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
										<td style="text-align: right;" colspan="3">
											<input type="submit" value="Agregar" class="buttonProv" />
										</td>
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

$('.formProveedor').validate();
</script>
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
									<select name="select" class="textProv" style="width:300px">
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
									<td style="width: 6%;">
										Mod
									</td>
									<td width="45">
										Nombre
									</td>
									<td width="25%">
										Contacto
									</td>
									<td width="24%">
										Telefono
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										ESSENCE
									</td>
									<td>
										KIM KYUNG MI
									</td>
									<td>
										011-46127245
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
									<td>
										&nbsp;
									</td>
								</tr>
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
									Razón Soc.:&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " name="razon_social_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									CUIT:&nbsp;
									<input type="text " style="width: 120px; " maxlength="50px " name="cuit_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									Cond. IVA:
									<input type="text " style="width: 100px; " maxlength="50px " name="telefono_empresa " value="ingrese " disabled="yes " />
								</td>
							</tr>
							<tr>
								<td style=" text-align:Right; ">
									Domicilio:&nbsp;
									<input type="text " style="width: 150px; " name="email_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									Localidad:&nbsp;&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " name="domicilio_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									Banco:&nbsp;
									<input type="text " style="width: 100px; " name="fax_empresa " value="ingrese " disabled="yes "/>
								</td>
							</tr>
							<tr>
								<td style=" text-align:Right; ">
									Contacto:&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " name="razon_social_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									Telefono:&nbsp;
									<input type="text " style="width: 120px; " maxlength="50px " name="cuit_empresa " value="ingrese " disabled="yes " />
								</td>
								<td style=" text-align:Right; ">
									CBU&nbsp;
									<input type="text " style="width: 100px; " maxlength="50px " name="telefono_empresa " value="ingrese " disabled="yes " />
								</td>
							</tr>
							<tr>
								<td style="text-align: right;" colspan="3">
									<input type="button" name="pNuevo" value="Agregar" class="buttonProv" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

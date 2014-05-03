	<table class="tablaClientes">
		<tr>
			<td colspan="7">
				<h1 style="text-align: left;">
					Historial de Compras - Cuenta Corriente - Carolina
				</h1>
			</td>
		</tr>
		<tr style="vertical-align: middle;">
			<td style="height:30px; text-align: right;">
				Tipo de venta:&nbsp;
				<select name="select" class="textClientes">
					<option selected="selected">
						---
					</option>
					<option value="volvo">
						Contado
					</option>
					<option value="saab">
						Contado 10%
					</option>
					<option value="mercedes">
						Tarjeta
					</option>
					<option value="audi">
						CC
					</option>
				</select>
			</td>
			<td style="height:30px; text-align: right;">
				Desde: &nbsp;
				<input type="date" value="<?php
				echo date('Y-m-d');
				?>" class="textClientes"/>
			</td>
			<td style="height:30px; text-align: right;">
				Hasta:&nbsp;
				<input type="date" value="<?php
				echo date('Y-m-d');
				?>" class="textClientes" />
			</td>
			<td style="height:30px; text-align: right;">
				Min: &nbsp;
				<input type="text" maxlength="6" name="pNuevo" value="100,00" class="textClientes" size="8" />
			</td>
			<td style="height:30px; text-align: right;">
				Max: &nbsp;
				<input type="text" maxlength="6" name="pNuevo" value="100,00" class="textClientes" size="8" />
			</td>
			<td style="height:30px; text-align: Center; height: 40px;" rowspan="2">
				<input type="button" name="pNuevo" value="Buscar" class="buttonClientes" />
			</td>
		</tr>
	</table>
	<br />
	<table class="tablaClientes">
		<tr>
			<td>
				<table class="formuClientes" style="width:800px">
					<tr style="text-align: center;">
						<td>
							Fecha
						</td>
						<td>
							Dev
						</td>
						<td>
							Camb
						</td>
						<td>
							Prenda / Entrega
						</td>
						<td>
							Cant.
						</td>
						<td>
							Precio
						</td>
						<td>
							Entrega
						</td>
						<td>
							Saldo
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							200
						</td>
					</tr>
					<tr style="text-align: center;" bgcolor="#00FFFF">
						<td style="height:30px; text-align: left;" colspan="6">
							23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA
						</td>
						<td>
							100,00
						</td>
						<td>
							100,00
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							300,00
						</td>
					</tr>
					<tr style="text-align: center;" bgcolor="#00FFFF">
						<td style="height:30px; text-align: left;" colspan="6">
							23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA
						</td>
						<td>
							100,00
						</td>
						<td>
							200,00
						</td>
					</tr>
					<tr style="text-align: center;" bgcolor="#00FFFF">
						<td style="height:30px; text-align: left;" colspan="6">
							23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA
						</td>
						<td>
							100,00
						</td>
						<td>
							100,00
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							300,00
						</td>
					</tr>
					<tr style="text-align: center;" bgcolor="#00FFFF">
						<td style="height:30px; text-align: left;" colspan="6">
							23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA
						</td>
						<td>
							100,00
						</td>
						<td>
							200,00
						</td>
					</tr>
					<tr style="text-align: center;" bgcolor="#00FFFF">
						<td style="height:30px; text-align: left;" colspan="6">
							23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA
						</td>
						<td>
							100,00
						</td>
						<td>
							200,00
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							400,00
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							600,00
						</td>
					</tr>
					<tr style="text-align: center;">
						<td>
							21-03-2014
						</td>
						<td>
							<a title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='18px' height='18px' /></a>
						</td>
						<td>
							<a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='18px' height='18px' /></a>
						</td>
						<td>
							Comba 3/4
						</td>
						<td>
							1
						</td>
						<td>
							200,00
						</td>
						<td>
							---
						</td>
						<td>
							800,00
						</td>
					</tr>
					<tr style="text-align: center;padding-bottom: 15px;" bgcolor="#ffff00 ">
						<td style="height:30px; text-align: right;" colspan="7">
							<div style=" font-weight:bolder">
								Saldo
							</div>
						</td>
						<td>
							<div style=" font-weight:bolder">
								800,00
							</div>
						</td>
					</tr>
				</table>
			</td>

</tr>
</table>
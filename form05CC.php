<?php
 define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');

?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Emmanuel" />
	<title>
		Nombre del programa
	</title>
	<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>cssCC.css" type="text/css" />
</head>
<body>
			<h1 style="text-align: left;">
				&nbsp;Cuentas Corrientes&nbsp;
			</h1>
			<hr />   
			<table style="width:800px">
				<tr style="vertical-align: middle;">
					<td>
						<table style="width: 100%;">
							<tr>
								<td style="text-align: left;width: 170px; ">
									<h2>
										Cliente
									</h2>
								</td>
								<td style="text-align: left; ">
									Buscar:&nbsp;
									<select size="1" style="width: 400px"class="textCC">
										<option value=0>
											- Elija Una -
										</option>
									</select>
								</td>
								<td style="text-align: right;">
									<input type="button" name="pNuevo" value="Agregar" class="buttonCC" />
								</td>
							</tr>
						</table>
						<br />
						<div class="scrolCC">
							<table class="formuCC" style="width: 755px;">
								<tr style="text-align: center;">
									<td width="53%">
										Nombre
									</td>
									<td width="30%">
										Telefono
									</td>
									<td width="17%">
										C. Corriente
									</td>
								</tr>
								<tr style="text-align: center;">
									<td>
										Carolina
									</td>
									<td>
										0342 - 154426346
									</td>
									<td>
										800
									</td>
								</tr>
								<tr style="text-align: center;">
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
			<table class="tablaCC1" >
                        							<tr style="vertical-align: middle;">
								<td style="width:450px">
                                	<h1 style="text-align: center;">
										Datos del cliete
									</h1>
                                </td>
                                <td style="text-align: center;width:300px">
									<br />
									<h1>
										Actualizar CC
									</h1>
									<br />
									Entrega: &nbsp;
									<input type="text" name="pbusc" value="ingresar" style="width: 120px;" class="textCaracteristicas"/>
									<br />
									<br />
									<input type="button" name="pNuevo" value="Buscar" class="buttonClientes" />
									<br />
									<br />
								</td>
							</tr>
						</table>
                        <br /><hr />
			</body>

</html>
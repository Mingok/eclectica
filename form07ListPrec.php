<?php define( 'EMPLEADOS_STYLE_PATH', 'http://localhost/ecleptica/css/'); ?>
	<!DOCTYPE HTML>
	<head>
		<meta http-equiv="content-type" content="text/html" />
		<meta name="author" content="Emmanuel" />
		<title>
			Nombre del programa
		</title>
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
	</head>
	<body>
		<h1 style="text-align: left;">
			&nbsp;Tabla de precios&nbsp;
		</h1>
		<hr />
		<table class="tablaListPrec">
			<tr>
				<td>
					<table style="width:100%;">
						<tr style="vertical-align: middle;">
							<td style="text-align: left; ">
								<h2>
									Pregios y Grupos
								</h2>
							</td>
							<td style="text-align: left; ">
								Nombre: &nbsp;
								<input type="text" class="textListPrec" name="pcod" disabled="yes" value="elija uno"/>
							</td>
							<td style="text-align: right; height: 40px;">
								Grupo: &nbsp;
                                <select style="width: 150px"class="textListPrec" disabled="yes" >
                                        <option value=0>
											- Elija Una -
										</option>
                                </select>
							</td>
                            <td style="text-align: right; height: 40px;">
								<input type="button" name="pNuevo" value="Modificar" class="buttonListPrec"disabled="yes" />
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: right;">
									<table class="formuListPrec" style="width: 100%;">
										<tr style="text-align: center;">
											<td>
												Mod
											</td>
											<td>
												Nombre
											</td>
											<td>
												Grupo
											</td>
										</tr>
										<tr style='text-align: center'>
											<td style="width: 70px;">
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 1
											</td>
											<td style="width: 70px;">
												1
                                            </td>
										</tr>
                                        <tr style='text-align: center'>
											<td>
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 2
											</td>
											<td>
												1
                                            </td>
										</tr>
                                        <tr style='text-align: center'>
											<td>
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 3
											</td>
											<td>
												1
                                            </td>
										</tr>
                                        <tr style='text-align: center'>
											<td>
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 4
											</td>
											<td>
												1
                                            </td>
										</tr>
                                        <tr style='text-align: center'>
											<td>
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 5
											</td>
											<td>
												1
                                            </td>
										</tr>
                                        <tr style='text-align: center'>
											<td>
												<a title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
											</td>
											<td>
												Precio 6
											</td>
											<td>
												1
                                            </td>
										</tr>
                                        
									</table>
							
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br />
		<hr />
	</body>
	
	</html>
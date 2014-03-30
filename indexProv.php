<?php
 define('EMPLEADOS_STYLE_PATH', 'http://localhost/ecleptica/css/');

?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Emmanuel" />
	<title>
		Nombre del programa
	</title>
	<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>cssProv.css" type="text/css" />
</head>
<body>
	<center>
		<table class="tablaGral">
			<tr>
				<td>
					<?php include_once './encabezado.php'; ?>
				</td>
			</tr>
			<tr>
				<td>
					<hr />
					<?php include_once './views/proveedor/abmProveedor.php'?>
						<hr />
				</td>
			</tr>
            <tr>
				<td>
					<hr />
					<?php include_once './views/empresa/abmEmpresa.php'?>
						<hr />
				</td>
			</tr>
		</table>
	</center>
</body>

</html>
<?php define( 'EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/'); define( 'EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/'); ?>
	<!DOCTYPE HTML>
	<html>
		<head>
			<meta http-equiv="content-type" content="text/html" />
			<meta name="author" content="Emmanuel" />
			<title>
				Nombre del programa
			</title>
			<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap.min.css" type="text/css" />
			<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap-theme.min.css" type="text/css" />
			<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/lib/jquery.js">
			</script>
			<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/dist/jquery.validate.js">
			</script>
			<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>bootstrap/bootstrap.min.js">
			</script>
			<script type="text/javascript" src="js/buscar-en-tabla.js">
			</script>
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
							<?php include_once './form03Empleados.php'?>
						</td>
					</tr>
				</table>
			</center>
		</body>
	</html>
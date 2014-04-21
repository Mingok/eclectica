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
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>cssProv.css" type="text/css" />
    <link rel="stylesheet" media="screen" href="<?php echo EMPLEADOS_STYLE_PATH;?>screen.css" />    
    <script src="jquery-1.11.0.min.js"></script>
    <script src="jquery.validate.js"></script>
    <script type="text/javascript" src="js/ext/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/buscar-en-tabla.js"></script>
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
<?php define( 'EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/'); define( 'EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/'); ?>
	<!DOCTYPE HTML>
	<head>
		<meta http-equiv="content-type" content="text/html" />
		<meta name="author" content="Emmanuel" />
		<title>
			Nombre del programa
		</title>
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>css.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>bootstrap/bootstrap-theme.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    	<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/lib/jquery.js"></script>
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/dist/jquery.validate.js"></script> 
		<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>bootstrap/bootstrap.min.js"></script>
		<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>fancybox/jquery.fancybox.js"></script>
		<script src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>fancybox/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="js/buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        
	</head>
	<body>
		<center>
			<table class="tablaGral">
				<tr>
					<td>
						<?php include_once './encabezado.php'; ?>
					</td>
				</tr>
				<tr><br /><br /><br /><br /></tr>
                <tr>
					<td>
						<?php include_once './form06Proveedores.php'?>
					</td>
				</tr>
			</table>
		</center>
	</body>
	
	</html>
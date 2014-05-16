<?php define( 'EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/'); define( 'EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php 
require_once 'classes/tipoVenta/tipoVenta.php'; 
$tipoVentaList = new tipoVenta(); 
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();

$idPrenda = $_REQUEST['idPrenda'];
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$precios = $prendaList->preciosPrenda($idPrenda);
?>
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
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH;?>select2/bootstrap.min.css" type="text/css" />
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>validacion/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>select2/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH;?>fancybox/jquery.fancybox.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo EMPLEADOS_STYLE_PATH;?>fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
			<script>
				$(function() {
    				$('#selecCliente').select2().on("change", function(e) {
						$('input[name=idPersona]').val(e.val);
				
					})
				});
			</script>
		</head>
		<body>
			<center>
        		<table class="table table-condensed" id="tblPrecios" >
        			<thead class="btn-success" style="font-weight: bolder; text-align: center;">
        				<tr>
        					<?php foreach ($tipoVentas as $tipoVenta) {?>
        						<td style="text-align: right;">
        							<?php echo $tipoVenta["detalleTipoVenta"];?>
        						</td>
        					<?php } ?>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<?php foreach ($precios as $precio) {?>
        						<td style="text-align: right;">
        							<?php echo $precio["valor"];?>
        						</td>
        					<?php } ?>
        				</tr>
        			</tbody>
        		</table>
        	</center>
        </body>
	</html>
<?php
define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');
define('EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/');
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();

$idPrenda = $_REQUEST['idPrenda'];
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$precios = $prendaList->preciosPrenda($idPrenda);
$arrayTipoVenta = array();
$arrayPrecio = array();

foreach ($tipoVentas as $tipoVenta) {
    $arrayTipoVenta[] = $tipoVenta["detalleTipoVenta"];
}
foreach ($precios as $precio) {
    $arrayPrecio[] = $precio["valor"];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>select2/select2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/select2.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
    </head>
    <body class="">
    <center>
        <table class="table table-condensed" id="tblPrecios" >
            <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                <tr>
                    <td style="width: 70%; padding-right: 15px;">
                        Detalle
                    </td>
                    <td style="width: 30%; padding-right: 15px;">
                        Importe
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($arrayTipoVenta); $i++) { ?>
                    <tr>
                        <td style="text-align: left;">
                            <?php echo $arrayTipoVenta[$i]; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $arrayPrecio[$i]; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="text-align: left;">
                        &nbsp;
                    </td>
                    <td style="text-align: left;">
                        &nbsp;
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>
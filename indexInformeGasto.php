<?php
session_start();
define('INFORME_STYLE_PATH', 'http://localhost/eclectica/css/');
define('INFORME_SCRIPTS_PATH', 'http://localhost/eclectica/js/');
?>

<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="Emanuel" />
    <title>
        Informe Costos y Gastos
    </title>

    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>css.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>select2/select2.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo INFORME_STYLE_PATH; ?>jqueryui/jquery-ui.min.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>select2/select2.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>jqueryui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo INFORME_SCRIPTS_PATH; ?>ajaxTable/js.js"></script>
</head>
<body class="image-back-body">
    <?php if (isset($_GET['pasar'])) { ?>
    <center>
        <?php if ($_GET['pasar'] == "0") {
            include_once './indexRol.php';
        } else {
            $_SESSION['pasar'] = "1"; ?>
            <table class="tablaGral">
                <tr>
                    <td>
        <?php include_once './encabezado.php'; ?>
                    </td>
                </tr>
                <tr><td><br /><br /><br /><br /></td></tr>
                <tr>
                    <td>
        <?php include_once './form12InformeGasto.php';
    } ?>
                </td>
            </tr>
        </table>
    </center>
<?php } else { ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title' style="font-weight: bold;">
                        No Tiene Permisos Para Ingresar a esta P&aacute;gina
                        <input type="button" name="home" class="btn btn-sm btn-primary" value="Volver" onclick="window.history.back();"/>
                    </h3>
                </div>
            </div>
        </div>
    </div>


<?php } ?>
</body>
</html>

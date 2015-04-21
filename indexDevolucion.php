<?php
session_start();
define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');
define('EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/');
$_SESSION['pasar']= "0";
?>
<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="Emmanuel" />
    <title>
        Eclectica
    </title>
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>css.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>select2/select2.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>datatableUI/dataTables.bootstrap.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>datatableUI/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>datatableUI/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>buscar-en-tabla.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>select2/select2.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>tablaItemVenta/controlItemVenta.js"></script>
</head>
<body class="image-back-body bodyDevoluciones">
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
            <?php include_once './form08Devolucion.php';?>
            </td>
        </tr>
    </table>
</center>
</body>
</html>

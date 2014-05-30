<?php session_start();
define('EMPLEADOS_STYLE_PATH', 'http://localhost/eclectica/css/');
define('EMPLEADOS_SCRIPTS_PATH', 'http://localhost/eclectica/js/');

$_SESSION['pasar']= "0";

if(!isset($_SESSION['backuped'])) {
    include_once (__DIR__.'\\base\\backup_db.php');
    $_SESSION['backuped'] = TRUE;
}
//session_destroy();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" />
        <meta name="author" content="Emmanuel" />
        <title>
            Nombre del programa
        </title>
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>bootstrap/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo EMPLEADOS_STYLE_PATH; ?>fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/lib/jquery.js"></script>
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>validacion/dist/jquery.validate.js"></script> 
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.js"></script>
        <script src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="js/buscar-en-tabla.js"></script>
        <script type="text/javascript" src="<?php echo EMPLEADOS_SCRIPTS_PATH; ?>fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

    </head>
    <body class="image-back-body">
     <table class="tablaGral">
        <tr>
            <td>
                <?php include_once './encabezado.php'; ?>
            </td>
        </tr>
        <tr><td><br /><br /><br /><br /></td></tr>
        <tr>
            <td>
             
                <?php include_once './home.php' ?>
            </td>
        </tr>
    </table>
   
</body>

</html>
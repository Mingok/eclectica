<?php extract($_GET,EXTR_SKIP) ; extract($_POST,EXTR_SKIP) ; include ( "conectar.php"); session_start(); ?>
<!DOCTYPE HTML>
        
        <head>
                <meta http-equiv="content-type" content="text/html" />
                <meta name="author" content="Emmanuel" />
                <title>
                        Nombre del programa		
                </title>
                <link rel="stylesheet" href="./css/estilo.css" type="text/css" />
        </head>
        
        <body>
                <center>
                        <table border="1" cellpadding="10px" cellspacing="1px" width="1200px">
                                <tr>
                                        <td>
                                                <?php include 'encabezado.php'; ?>
                                        </td>
                                </tr>
                                <tr>
                                        <td>
                                                <?php include 'menuGral.php' ?>
                                        </td>
                                </tr>
                                 <tr>
                                        <td>
                                                <a href="indexPrendas.php"> prendas</a>
                                        </td>
                                </tr>
                        </table>
                </center>
        </body>
        
        </html>
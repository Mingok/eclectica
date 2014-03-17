<?php
$host_db = "localhost";
$usuario_db = "ema";
$password_db = "123";
$conectar = @mysql_connect ($host_db, $usuario_db, $password_db);
if (!$conectar) {

header ("Location: ".$_SERVER['PHP_SELF']); 

    die('Cargando...');
}
mysql_select_db ("ecleptica", $conectar);?>

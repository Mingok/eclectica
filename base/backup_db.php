<?php
$ds = DIRECTORY_SEPARATOR;
require_once (__DIR__. $ds . 'manejoMySQL.php');
$objManejoMySQL = new manejoMySQL();
$dbhost = $objManejoMySQL->host;
$dbuser = $objManejoMySQL->username;
$dbpass = $objManejoMySQL->password;
$dbname = $objManejoMySQL->database;

$backup_file = 'db_' . $dbname . '_' . date("l") . '.sql';
if (file_exists($backup_file)) {
    unlink($backup_file);
} 
$command = "C:/wamp/bin/mysql/mysql5.6.17/bin/mysqldump.exe --opt --host=$dbhost --user=$dbuser --password= $dbname > $backup_file";
exec($command);

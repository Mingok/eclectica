<?php
set_time_limit(0);
$ds = DIRECTORY_SEPARATOR;
require_once (__DIR__. $ds . 'manejoMySQL.php');
require_once (dirname(__DIR__) . $ds . 'vendors'  . $ds . 'swiftmailer' . $ds . 'lib' . $ds . 'swift_required.php');
$objManejoMySQL = new manejoMySQL();
$dbhost = $objManejoMySQL->host;
$dbuser = $objManejoMySQL->username;
$dbpass = $objManejoMySQL->password;
$dbname = $objManejoMySQL->database;

$backup_file = 'db_' . $dbname . '_' . date("l") . '.sql';
if (file_exists($backup_file)) {
    unlink($backup_file);
} 
$command = "C:/wamp/bin/mysql/mysql5.6.12/bin/mysqldump.exe --opt --host=$dbhost --user=$dbuser --password= $dbname > $backup_file";
exec($command);

//Si es viernes se manda por correo el archivo
if (date("l") == 'Saturday') {
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
      ->setUsername('eclectica.esperanza@gmail.com')
      ->setPassword('3807iYj77J')
    ;
    $texto = 'Respaldo del dia '.date('d/m/Y');
    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance('Wonderful Subject')
      ->setFrom(array('eclectica.esperanza@gmail.com' => 'Sistema de respaldo'))
      ->setTo(array('eclectica.esperanza@gmail.com'=> 'Respaldo'))
      ->setSubject($texto)
      ->setBody($texto)
      ->attach(Swift_Attachment::fromPath($backup_file))
    ;
    $result = $mailer->send($message);
}
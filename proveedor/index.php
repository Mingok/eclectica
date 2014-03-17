<?php $query = $_SERVER['PHP_SELF'];
$path = pathinfo( $query );
$what_you_want = $path['basename'];
var_dump($path);exit;?>
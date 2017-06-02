<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'tiger';
$mysql_db = 'outreachportal_new';
$error_message = '<br><br><center><h2>Can not connect to Database!!!</h2></center><br><br>';

$db = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

if(!$db)
	die($error_message);

?>
<?php


	$db_user  = 'madikadi';
	$db_password = 'salamsalam';
	$db_name   =  'coolbook';
	
	$db = new PDO("pgsql:host=localhost;dbname=$db_name", $db_user, $db_password);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	define('APP_NAME', 'PHP REST API TUTORIAL');



?>

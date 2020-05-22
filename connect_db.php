<?php

	$user = 'root';
	$pass = '';
	$db = 'legal_counselling';
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
	/*if($db_connect){
		echo "string";
	}*/
?>
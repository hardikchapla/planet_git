<?php
    session_start();
	$ip = $_SERVER['REMOTE_ADDR'];
	$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
	$ipInfo = json_decode($ipInfo);
	if(isset($ipInfo->timezone)){
		$timezone = $ipInfo->timezone;
		date_default_timezone_set($timezone);
	} else {
		date_default_timezone_set('Asia/Kolkata');
	}
	
	if($_SERVER['HTTP_HOST'] == "localhost"){
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$databaseName = 'planet';
	} else {
		$servername = 'localhost';
		$username = 'u269128924_planethopper';
		$password = '3IfEmL;n';
		$databaseName = 'u269128924_planethopper';
	}
	// Create connection
	$db = new PDO( 'mysql:host='.$servername.';dbname='.$databaseName, $username, $password );
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query("SET NAMES utf8");
?>
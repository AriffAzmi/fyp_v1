<?php 
	//Sending sms alert after complete booking
	$isms_username = ''; 
	$isms_password = ''; 
	$isms_receiver = '';

	$servername = "localhost";
	$username	= "";
	$password	= "";
	$dbname 	= "";

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	session_start();
?>

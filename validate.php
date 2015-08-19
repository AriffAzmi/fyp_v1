<?php

include("config.php");

{

	$kelas  = $_POST['klas'];
	$d_book = $_POST['d_book'];
	$s_book = $_POST['start_time'];
	$e_book = $_POST['end_time'];

	$q ="SELECT * FROM book 
		WHERE book_room = '".$kelas."' && d_book = '".$d_book."' && (start_time < '".$e_book."' && end_time > '".$s_book."')";
	$r = $mysqli->query($q);
	
	if ($r->num_rows > 0) 
	{
		echo 1;
	} 
	else
	{
		echo 0;
	}
 } 

?>
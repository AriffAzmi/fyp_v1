<?php

include("config.php");

{

	// $kelas_id	= $_POST['kelas_id'];
	$kelas  = $_POST['klas'];
	$d_book = date('Y-m-d', strtotime($_POST['d_book']));
	$s_book = $_POST['start_time'];
	$e_book = $_POST['end_time'];

	$q ="SELECT * FROM book 
		WHERE book_room = '".$kelas."' && d_book = '".$d_book."' && start_time = '".$s_book."' && end_time = '".$e_book."'";

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
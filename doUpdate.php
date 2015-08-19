<?php 

	include 'config.php';

	if (isset($_POST['update'])) {

		$kelas_id	= $_GET['id'];
		$kelas_new  = $_POST['n_classroom'];
		$d_book_new = $_POST['n_classdate'];
		$s_book_new = $_POST['new_start_time'];
		$e_book_new = $_POST['new_end_time'];

		
		$check = "SELECT * FROM book 
			WHERE book_room = '".$kelas_new."' && d_book = '".$d_book_new."' && (start_time < '".$e_book_new."' && end_time > '".$s_book_new."')";
		$res_check = $mysqli->query($q);
		
		if ($res_check->num_rows > 0) 
		{
			echo "<script>" . "alert('Not available!');" . "</script>";
			die("Not Available");
		}

		else {

			$Q_update = "UPDATE book SET book_room = '$kelas_new', d_book = '$d_book_new', 
			start_time = '$s_book_new', end_time = '$e_book_new' WHERE id= '" . $kelas_id . "'";
			$R_update = $mysqli->query($Q_update);

			if ($R_update === TRUE) {
				header("Location: home.php");
			}
			else{
				echo "<script>" . "alert('Something wrong!');" . "</script>";
			}
		} 
	}

?>
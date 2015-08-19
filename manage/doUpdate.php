<?php 

	include 'config.php';

	if ($_SERVER['REQUEST_METHOD']== 'POST') {

		$kelas_id	= $_POST['kelas_id'];
		$kelas_new  = $_POST['n_classroom'];
		$d_book_new = $_POST['n_classdate'];
		$s_book_new = $_POST['new_start_time'];
		$e_book_new = $_POST['new_end_time'];


		$Q = "UPDATE book SET book_room = '$kelas_new', d_book = '$d_book_new', start_time = '$s_book_new', end_time = '$e_book_new'  WHERE id= '" . $kelas_id . "'";
		$R = $mysqli->query($Q);
		// echo $Q;

		if ($R) {
			header("Location: home.php");
		}
		else{
			header("Location: error.php");
		}
	}

?>
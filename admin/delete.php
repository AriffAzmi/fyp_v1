<?php 

	include 'config.php';

	$class_id = $mysqli->real_escape_string($_GET['id']);

	$Q = "DELETE FROM book WHERE id= '" . $class_id . "'";
	$R = $mysqli->query($Q);

	if ($R) {
		
		echo '<script>' . 'alert("Booking deleted");' . '</script>';
		echo '<script>' . 'window.location.href="home.php";' . '</script>';
	}

	else {
		echo '<script>' . 'alert("Something error");' . '</script>';
		echo '<script>' . 'window.location.href="home.php";' . '</script>';
	}
?>
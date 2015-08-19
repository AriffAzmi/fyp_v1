<?php
include("config.php");

if (!isset($_SESSION['user'])) {
	
	header("Location: signin.php");
}


if ($_SERVER['REQUEST_METHOD']== 'POST') {

	$variable = $_POST['klas'];
	$d_book   = $_POST['d_book'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$sbject   = $_POST['subject'];
	$cur_date = date("yyyy-mm-dd");

	$isms_messages ='Hi, Good day' . '&nbsp;' . $_SESSION['user'] . 'You have booking class' . $klas .
	'on:' . $d_book . '&nbsp;' . 'at' . $start_time . 'until' . $end_time;

			
	$Q = "INSERT INTO book(username, book_room, d_book, subject, start_time, end_time, status) VALUES ('" . $_SESSION['user'] . "', '" . $variable . "', '" . $d_book . "', '" . $sbject . "', '" . $start_time . "',  '" . $end_time . "', 0)";
	$R = $mysqli->query($Q);

	if ($R === TRUE) {
		header("Location: home.php");
	}
	else {
		die("Something Error");
	}
}


	function send_sms($isms_username, $isms_password, $isms_receiver, $isms_messages)
	{
		$url = 'https://www.isms.com.my/isms_send.php?un=' . urlencode($isms_username) . '&pwd=' . urlencode($isms_password) . '&dstno=' . urlencode($isms_receiver) . '&msg=' . urlencode($isms_messages) . '&type=1';


		// Prepare to send SMS

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));


		// SEND SMS!

		$resp = curl_exec($curl);

		curl_close($curl);

		return $resp;
	}

?>
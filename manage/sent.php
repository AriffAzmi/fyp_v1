<?php

$server="localhost";
$username="sentuhan";
$password="pAl8e7Q6j9";
$dbname="sentuhan_system";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
	
	die("Could not connect to database" . $conn->connect_error);

}

$day=strtotime($_POST['day']);

$sql = "INSERT INTO customers(name, b_date, s_time, e_time, status, contact) VALUES ('" . $_POST['name'] . "', '" . $_POST['d_book'] . "', '" . $_POST['start_time'] . "', '" . $_POST['end_time'] . "', 0, '" . $_POST['contact'] . "')";

if ($conn->query($sql) === TRUE) {
	
	header("Refresh: 3;url=http://sentuhanshikin.com/index.php");
}

?>


<html>
	<head>Successfully booked</head>

	<body>
	<script type="text/javascript">

		alert("Thankyou, your booking has been added !")

	</script>

		<img src="img/thankyou.GIF">
	</body>
</html>
<?php 

include 'config.php';

	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	
	$Q = "SELECT * FROM book";
	$R = $mysqli->query($Q);

	function user_get_name($user_id){


	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Booking | CFGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/jquery-ui-1.10.1.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="system/css/system.css" rel="stylesheet"> 
    <link href="system/css/animation.css" rel="stylesheet"> -->
</head>
<body>
	
	<div class="container">
		<table class=" table table-hover">
			<tr>
				<th>Id</th>
				<th>Booking By</th>
				<th>Classroom</th>
				<th>Subjects</th>
				<th>Date</th>
				<th>Start time</th>
				<th>End time</th>
			</tr>
		 	<?php

	      		if ($R->num_rows > 0) {

	      			while ($row = $R->fetch_assoc()) {

			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['book_room']; ?></td>
				<td><?php echo $row['subject']; ?></td>
				<td><?php echo $row['d_book']; ?></td>
				<td><?php echo $row['start_time']; ?></td>
				<td><?php echo $row['end_time']; ?></td>
			</tr>
					<!-- <div id="book_button">
						<a href="doUpdate.php?id=" class="btn btn-success" name="update">Update</a>
					</div> -->
			<?php
	  			}
	      		}
	    	?>
		</table>
		<img src="img/AjaxLoader.gif" id="ajax">
	</div>
	<br />
	<br />
	<br />

</body>
</html>
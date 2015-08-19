<?php 

include 'config.php';

$class_id = $mysqli->real_escape_string($_GET['id']);

$Q = "SELECT * FROM book WHERE id= '" . $class_id . "'";
$R = $mysqli->query($Q);

?>

<!DOCTYPE html>
<html>
<head>
	<title>View | Admin</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>

	<table class="table table-bordered">
		<tr>
			<th>Classroom</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php 

				if ($R->num_rows > 0) {
					
					while ($row = $R->fetch_assoc()) {
						
			?>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['book_room']; ?></td>
			<td><?php echo $row['d_book']; ?></td>
			<td><?php echo $row['start_time']; ?></td>
			<td><?php echo $row['end_time']; ?></td>
			<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</td>	
		</tr>
			<?php 
				}
			}
			?>
	</table>
	<a href="home.php" class="btn btn-primary">Back to Home</a>

</body>
</html>


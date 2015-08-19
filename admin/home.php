<?php 

	include 'config.php';

	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}

	if (isset($_POST['search'])) {
		
		$class_name = $mysqli->real_escape_string($_POST['class_name']);
		$date = $mysqli->real_escape_string($_POST['date']);

		$Q = "SELECT * FROM book WHERE book_room LIKE '%" . $class_name . "%' OR d_book LIKE '%" . $date  ."%'";
		$R = $mysqli->query($Q);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | Admin</title>
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
	<div class="container">
		<div class="row">
			<h1>Search</h1>
			<form class="form-horizontal" action="" method="post">
			
				<div class="form-group">
					<label for="class">Classroom:</label>
					<input type="text" id="class" name="class_name" class="form-control">
				</div>
				<div class="form-group">
					<label for="date">Date:</label>
					<input type="text" id="date" name="date" class="form-control">
				</div>
				<br />
				<div class="form-group">
					<input type="submit" name="search" class="btn btn-primary">
				</div>
			</form>

			<table class="table table-bordered">
				<?php 

					if ($R->num_rows > 0) {

					echo '<tr>';
					echo '<th>' . 'Classroom' . '</th>';
					echo '<th>' . 'Date' . '</th>';
					echo '<th>' . 'Action' . '</th>';
					echo '</tr>';

				?>
				<tr>
					<?php 

						while ($row = $R->fetch_assoc()) {
								
					?>
					<td><?php echo $row['book_room']; ?></td>
					<td><?php echo $row['d_book']; ?></td>
					<td><a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</td>
				</tr>
					<?php 
						}
					}
					?>
			</table>
			<a href="table.php" class="btn btn-info">View All Booking</a>	
			<button onclick="DoLogout()" class="btn btn-danger">Logout</button>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>
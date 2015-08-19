<?php 

include 'config.php';

$kelas = $mysqli->real_escape_string($_GET['id']);
$classroom = $_GET['book_room'];
$classdate = $_GET['d_book'];
$start_time = $_GET['start_time'];
$end_time = $_GET['end_time'];

	
	$Q = "SELECT * FROM book 
	WHERE username ='" . $_SESSION['user'] . "' && id = '" . $kelas . "'";
	$R = $mysqli->query($Q);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Booking | CFGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui-1.10.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="system/css/system.css" rel="stylesheet"> 
    <link href="system/css/animation.css" rel="stylesheet">
</head>
<body>
	
	<div class="container">
		<div class="alert alert-danger alert-dismissible" role="alert" id="book_error">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="error_alert"><span aria-hidden="true">&times;</span></button>
		  <p id="error_msg"></p>
		</div>

		<div class="alert alert-success" id="success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close" id="success_button"><span aria-hidden="true">&times;</span></button>
        	<p id="success_msg"></p>
		</div>
		<form action="doUpdate.php" method="post">
		 	<?php

	      		if ($R->num_rows > 0) {

	      			while ($row = $R->fetch_assoc()) {

			?>
			<div class="form-group">
				<label for="kelas_id">Booking Id</label>
				<input type="text" class="active form-control" id="kelas_id" name="kelas_id" value="<?php echo $row['id']; ?>">
			</div>
			<div class="form-group">
				<label for="kelas">Classroom</label>
				<select class=" form-control" id="kelas" name="n_classroom" placeholder="Enter classroom name" required>
                    <option value="<?php echo $row['book_room']; ?>" selected><?php echo $row['book_room']; ?></option>
                    <option value="TA-2-212">TA-2-212</option>
                    <option value="TA-2-213">TA-2-213</option>
                    <option value="TA-2-214">TA-2-214</option>
                    <option value="TA-2-215">TA-2-215</option>
                    <option value="TA-2-216">TA-2-216</option>
                    <option value="TA-2-217">TA-2-217</option>
                </select>
            </div>
            <div class="form-group">
            	<label for="tarikh">Date</label>
				<input type="text" class=" active form-control" id="tarikh" name="n_classdate" value="<?php echo $row['d_book']; ?>"></td>
			</div>
			<div class="form-group">
				<label for="stime">Start time</label>
				<select class="form-control" name="new_start_time" id="stime" placeholder="Start time" required>
                    <option value="<?php echo $row['start_time']; ?>" selected><?php echo $row['start_time']; ?></option>
                    <option value="08:00:00">08:00:00</option>
                    <option value="09:00:00">09:00:00</option>
                    <option value="10:00:00">10:00:00</option>
                    <option value="11:00:00">11:00:00</option>
                    <option value="12:00:00">12:00:00</option>
                    <option value="13:00:00">13:00:00</option>
                    <option value="14:00:00">14:00:00</option>
                    <option value="15:00:00">15:00:00</option>
                    <option value="16:00:00">16:00:00</option>
                    <option value="17:00:00">17:00:00</option>
                    <option value="18:00:00">18:00:00</option>
                    <option value="19:00:00">19:00:00</option>
                    <option value="20:00:00">20:00:00</option>
                </select>
           	</div>
           	<div class="form-group">
           		<label for="etime">End time</label>
				<select class="form-control" name="new_end_time" id="etime" placeholder="End time" required>
                    <option value="<?php echo $row['end_time']; ?>" selected><?php echo $row['end_time']; ?></option>
                    <option value="08:00:00">08:00:00</option>
                    <option value="09:00:00">09:00:00</option>
                    <option value="10:00:00">10:00:00</option>
                    <option value="11:00:00">11:00:00</option>
                    <option value="12:00:00">12:00:00</option>
                    <option value="13:00:00">13:00:00</option>
                    <option value="14:00:00">14:00:00</option>
                    <option value="15:00:00">15:00:00</option>
                    <option value="16:00:00">16:00:00</option>
                    <option value="17:00:00">17:00:00</option>
                    <option value="18:00:00">18:00:00</option>
                    <option value="19:00:00">19:00:00</option>
                    <option value="20:00:00">20:00:00</option>
                </select>
			</div>
					<!-- <div id="book_button">
						<a href="doUpdate.php?id=" class="btn btn-success" name="update">Update</a>
					</div> -->
			<input type="submit" name="update" class="btn btn-success" id="book_button" value="Update">
			<br />
			<?php
	  			}
	      		}
	    	?>
		</form>
		<img src="img/AjaxLoader.gif" id="ajax">
		<input type='button' onclick="check_availability()" id='check_availability' class="btn btn-success" value='Check Availability'>
		<input type='button' onclick="cancel_update()" id='cancel' class="btn btn-primary" value='Cancel'>
	</div>
	<br />
	<br />
	<br />


<!-- JQUERY -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.1.min.js"></script>
<script src="js/calendar_func.js"></script>
<script src="js/jquery.easing.1.3.min.js"></script>
<script src="js/jquery.superslides.min.js"></script>
<script  type="text/javascript">
  $('#slides').superslides({
	  play: 6000,
	  pagination:false,
	  animation_speed: 800,
      animation: 'fade'
    });
</script>

<!-- OTHER JS --> 
<script src="js/jquery.zweatherfeed.min.js"></script> 
<script src="js/retina.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script  src="js/functions.js"></script>
<script  src="script.js"></script>
<script src="assets/validate.js"></script>

<!-- CAROUSEL -->  
<script src="js/owl.carousel.min.js"></script>
<script>
//Carousel
    $(document).ready(function(){
	"use strict";
	//Carousel
		$(".carousel").owlCarousel({
		items : 1,
		singleItem:true,
		responsive:true,
		autoHeight : true,
		transitionStyle:"fade"
	});
});
</script>

<!-- GOOGLE MAP -->
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/mapmarker.jquery.js"></script>
</body>
</html>
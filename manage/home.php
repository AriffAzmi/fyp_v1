<?php 
	
	include 'config.php';

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}

	$Q = "SELECT username FROM users WHERE username = '" . $_SESSION['user'] . "'";
	$R = $mysqli->query($Q);
	$F = $R->fetch_object();
	$current_user = $F->username;

	$query_book = "SELECT * FROM book WHERE username ='" . $_SESSION['user'] . "'";
	$res_book = $mysqli->query($query_book);

?>
<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
    <title>CFGS class booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/uniten.png" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui-1.10.1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="system/css/system.css" rel="stylesheet"> 
    <link href="system/css/animation.css" rel="stylesheet"> 
    
    <!-- Owl Carousel Assets -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>
    	book{
			
			display: none;
    	}	
    </style>

  </head>
  <body>
  <!-- Preloader -->
    <div id="preloader">
        <div id="status"><img src="img/uniten.png" height="90" width="150" alt=""></div>
    </div>
   <!--  end Preloader -->
  
<div id="wrapper">
	<div id="main">
		<div class="container bottom">
			<div id="logo"><img src="img/uniten.png" height="90" width="150" alt=""></div>
            <div id="lang">
            	<ul>
                <li><font color="black">Welcome, <?php echo $current_user."'s"; ?></font></li>
                </ul>
            </div>
            <br />
			<div class=" row">
				<table class="table table-bordered" style="margin-bottom:100px">
		            <thead>
		                <tr>
		                    <th>ID.</th>
		                    <th>Lecturer Names</th>
		                    <th>Booking class</th>
		                    <th>Date of Booking</th>
		                    <th>Start Time</th>
		                    <th>End Time</th>
		                    <th>Action</th>
		                </tr>
		            </thead>
        			<tbody>
			            <?php

			              if ($res_book->num_rows > 0) {
			    
			              while ($row = $res_book->fetch_assoc()) {

			                $originalDate = $row['b_date'];
			                $newDate = date("d-m-Y", strtotime($originalDate));
			            ?>

			            <tr>
			              <td><?php echo $row['id']; ?></td>
			              <td><?php echo $current_user ?></td>
			              <td><?php echo $row['book_room']; ?></td>
			              <td><?php echo $row['d_book']; ?></td>
			              <td><?php echo $row['start_time']; ?></td>
			              <td><?php echo $row['end_time']; ?></td>
			              <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
			              </td>
			            </tr>
			            <?php
			                  }
			                  }
			            ?>
        			</tbody>
   				</table>
			</div>
		</div><!-- End container -->
        
		<nav class="bottom">
		<ul class="menu">
			<li><a href="#" id="modal-rooms-open">Class</a></li>
			<li><a href="#" id="modal-about-open">About</a></li>
			<li><a href="#" id="modal-contacts-open">Contacts</a></li>
			<li><a href="#" onclick="doLogout()">Signout</a></li>
		</ul>
		<ul id="contact_follow">
			<li><a href="#"><span class="icon-facebook"></span></a></li>
			<li><a href="#"><span class="icon-twitter"></span></a></li>
			<li><a href="#"><span class=" icon-googleplus"></span></a></li>
		</ul>
		</nav>
        
	</div><!-- End main -->
    
	<!-- Modal Latest ROOMS -->
	<div id="modal-offers">
		<a href="#" class="modal-close"><i class=" icon-cancel-circled-outline"></i></a>
		<div class="container">
        
			<div class="row">
            
				<div class="col-md-12 ">
					<h3>Classroom &amp; Lab</h3>
						<!-- End row -->
                         <hr>
                         <!--<div class="row">
						<div class="col-md-6">
                        
							<div class="photo_polaroid">
                            <div class="carousel">
                            	<div class="item"><img src="img/room_4.jpg"  alt="" class="img-responsive"></div>
                                <div class="item"><img src="img/room_4.jpg"  alt="" class="img-responsive"></div>
                                <div class="item"><img src="img/room_4.jpg"  alt="" class="img-responsive"></div> 
                            </div>
                            </div>
						</div> -->
                        
					
				</div><!-- End col-md-12 -->
                
			</div><!-- End row -->
		</div><!-- End conainer -->
	</div><!-- End modal -->
    
	<!-- Modal Notified -->
	<div id="modal-about">
		<a href="#" class="modal-close"><i class=" icon-cancel-circled-outline"></i></a>
		<div class="container">
        
			<div class="row">
            
				<div class="col-md-12 text-center">
					<h3>CFGS &amp; facilities</h3>
					<p class="lead">
						 
					</p>
                 </div>
                </div><!-- End row -->    
                
                <!-- End row -->
                       
                 <hr>     
                     
                <!-- End row -->
                   
				</div>
			
		</div><!-- End conainer -->
	</div><!-- End modal -->
    
    <!-- Modal  Weather -->
	<!-- End modal -->

	<!-- Modal  Contacts -->
	<div id="modal-contacts">
		<a href="#" class="modal-close"><i class=" icon-cancel-circled-outline"></i></a>
		<div class="container">
        
			<div class="row">
            
				<div class="col-md-12">
					<h3>Contacts</h3>
					<!-- end map-->
					<hr>
				</div>
			</div><!-- End row -->
            
			<div class="row">
            	<form>
            		<label>Name <font color="red">*</font></label>
            		<fieldset><input type="text" name="cname" placeholder="Enter name..." required></fieldset> 
            		<br />
            		<label>Email <font color="red">*</font></label>
            		<fieldset><input type="email" name="cemail" placeholder="Please enter your valid email.." required></fieldset>
            		<br />
            		<label>Contact Number <font color="red">*</font></label>
            		<fieldset><input type="number" placeholder="Enter your phone number.." required></fieldset>
            		<br />
            		<label>Enquiries</label>
            		<fieldset><textarea></textarea></fieldset>
            		<br />
            		<quo>The field with * sign are required to fill in.</quo>
            		<br /> <br />
            		<input type="submit" value="Send!">
            	</form>
			</div>
            
		</div><!-- End conainer -->
	</div><!-- End modal -->
</div><!-- End wrapper -->

<!-- <div id="slides">
	<ul class="slides-container">
		<li><img src="img/p1.png" alt=""></li>
		<li><img src="img/p1.png" alt=""></li>
		<li><img src="img/p1.png" alt=""></li>
		<li><img src="img/p1.png" alt=""></li>
	</ul>
</div> End background slider -->

<script type="text/javascript">
	function book() {
		var retValue = confirm("Confirm this booking?").css("background-color: blue");

		if (retValue== true) {
			alert("Your booking will be process soon.");
			window.location.href="sent.php";
		}
		else {
			window.location.href="#";
		}
	}
</script>
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
<script  src="js/script.js"></script>
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
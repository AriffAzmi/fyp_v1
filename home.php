<?php 
	
	include 'config.php';

	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	}

	$Q = "SELECT username FROM users WHERE username = '" . $_SESSION['user'] . "'";
	$R = $mysqli->query($Q);
	$F = $R->fetch_object();
	$current_user = $F->username;

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
		<div class="container">
			<div class="alert alert-success" role="alert">
            		Welcome, <?php echo $current_user."'s"; ?>
    		</div>
			<div id="logo"><img src="img/uniten.png" height="90" width="150" alt=""></div>
			<div class="row">
            	<div class="col-md-12">
                    <h1><br /><br /><br /></h1>
                </div>
			</div>
              
			<div class="alert alert-danger alert-dismissible" role="alert" id="book_error">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="error_alert"><span aria-hidden="true">&times;</span></button>
			  <p id="error_msg"></p>
			</div>

			<div class="alert alert-success" id="success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" id="success_button"><span aria-hidden="true">&times;</span></button>
            	<p id="success_msg"></p>
    		</div>
                        
			<div id="book" >
				<form role="form" method="post" action="select.php" autocomplete="off">
					<div class=" row">
						<div class="col-md-2 col-sm-2 first-nogutter dates" id="jrange">
							<input type="text" class=" form-control datepicker" id="tarikh" name="d_book" placeholder="Your dates">
							<span class="input-icon"><i class=" icon-calendar"></i></span>
						</div>
						<div class="col-md-2 col-sm-2 first-nogutter">
							<input type="text" class=" form-control" name="subject" placeholder="Class Subject">
							<span class="input-icon"><i class=" icon-book"></i></span>
						</div>
						<div class="col-md-2 col-sm-2 first-nogutter">
							<div class="styled-select">
								<select class="form-control" id="masamula" name="start_time" id="stime" placeholder="Start time" required>
									<option value="" selected>Start time</option>
									<option>08:00:00</option>
									<option>09:00:00</option>
									<option>10:00:00</option>
									<option>11:00:00</option>
									<option>12:00:00</option>
									<option>13:00:00</option>
									<option>14:00:00</option>
									<option>15:00:00</option>
									<option>16:00:00</option>
									<option>17:00:00</option>
									<option>18:00:00</option>
									<option>19:00:00</option>
									<option>20:00:00</option>
								</select>
							</div>
							<span class="input-icon"><i class="icon-clock-3"></i></span>
						</div>
						
						<div class="col-md-2 col-sm-2 nogutter">
							<div class="styled-select">
								<select class=" form-control" id="masahabis" name="end_time" placeholder="End time" required>
									<option value="" selected>End time</option>
									<option>08:00:00</option>
									<option>09:00:00</option>
									<option>10:00:00</option>
									<option>11:00:00</option>
									<option>12:00:00</option>
									<option>13:00:00</option>
									<option>14:00:00</option>
									<option>15:00:00</option>
									<option>16:00:00</option>
									<option>17:00:00</option>
									<option>18:00:00</option>
									<option>19:00:00</option>
									<option>20:00:00</option>
								</select>
							</div>
							<span class="input-icon"><i class="icon-clock-3"></i></span>
						</div>
                        
                        <div class="col-md-2 col-sm-2 nogutter">
                        	<div class="styled-select">
								<select class="form-control" id="kelas" name="klas" required>
									<option value="" selected>Class type</option>
									<option>TA-2-210</option>
									<option>TA-2-211</option>
									<option>TA-2-212</option>
									<option>TA-2-213</option>
									<option>TA-2-214</option>
									<option>TA-2-215</option>
									<option>AV1</option>
									<option>AV2</option>
									<option>Lab 1 - TA-4-214</option>
									<option>Lab 2 - TA-4-213</option>
									<option>bilik - BMU, level 6</option>
									<option>Meeting Room, level 5</option>
								</select>
							</div>
							<span class="input-icon"><i class="icon-building"></i></span>
						</div>
						<button onclick="book()" type="submit" class="btn-check book" id="book_button">BOOK NOW</button>
					</div>
				</form>
				<img src="img/AjaxLoader.gif" id="ajax">
				<button onclick="check_availability()" id="avai_button" class="btn btn-primary">Check Availability</button>
			</div><!-- End book -->
            
		</div><!-- End container -->
        
		<nav>
		<ul class="menu">
			<li><a href="#" id="modal-rooms-open">Class</a></li>
			<li><a href="#" id="modal-about-open">About</a></li>
			<li><a href="#" id="modal-contacts-open">Contacts</a></li>
			<li><a href="btable.php">Booking Table</a></li>
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
</div> --><!-- End background slider -->

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
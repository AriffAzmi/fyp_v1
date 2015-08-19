<?php
include("config.php");
if (!isset($_SESSION['user'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='cal/fullcalendar.css' rel='stylesheet' />
<link href='cal/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='cal/lib/moment.min.js'></script>
<script src='cal/lib/jquery.min.js'></script>
<script src='cal/fullcalendar.min.js'></script>
<!-- <script src="scrapper.js"></script> -->
<script>
	$(document).ready(function() {
		$.get( "cal.php", function( data ) {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: '2015-04-19',
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: data
			});
		}, "json" );
    });
</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>
	<button onclick="bckHome()">Back to Home</button>
	<div id='calendar'></div>

	<script>
		function bckHome(){
			window.location.href='home.php';
		}
	</script>
</body>
</html>

<?php

$link = mysqli_connect('localhost', 'root', 'acv2077', 'cfgs');

$query = "SELECT * FROM book";
$result = mysqli_query($link,$query);

 while ($row = mysqli_fetch_row($result)) {
 	//print_r($row);
 	//echo "<br/>";
        $title  = $row['3'];
		$s_date = $row['4'];
		$s_time = $row['5'];
		$e_time = $row['6'];
		$url 	= $row['0'];
		$s_datetime = $s_date.'T'.$s_time;
		$e_datetime = $s_date.'T'.$e_time;

		$events[] = array(
			"title" => $title, 
			"start" => $s_datetime,
			"end"   => $e_datetime,
			"url"	=> "view.php?id=" . $url . ""
			);
    }
   
 
header('Content-Type: application/json');
echo json_encode($events);
?>

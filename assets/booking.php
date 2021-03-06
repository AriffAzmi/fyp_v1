<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email ) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$check_in     = $_POST['check_in'];
$room_type     = $_POST['room_type'];
$email    = $_POST['email'];
$quantity = $_POST['quantity'];
$child = $_POST['child'];

if(trim($check_in) == '') {
	echo '<div class="error_message">Please enter your Check in date.</div>';
	exit();
} else if(trim($room_type ) == '') {
	echo '<div class="error_message">Please select Room type.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Invalid e-mail address, try again.</div>';
	exit();
} else if(trim($quantity ) == '') {
	echo '<div class="error_message">Please enter number of Guest.</div>';
	exit();
} else if(trim($child ) == '') {
	echo '<div class="error_message">Please enter number of Child.</div>';
	exit();
}


//$address = "HERE your email address";
$address = "info@ansonika.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $email . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by \nEmail: $email" . PHP_EOL . PHP_EOL;
$e_content = "Check in and check out date: $check_in\nRoom Type: $room_type\nNumber of guests: $quantity\nNumber of child: $child" . PHP_EOL . PHP_EOL;

$msg = wordwrap( $e_body . $e_content , 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email";
$usersubject = "Magnolia Availability request";
$userheaders = "From: info@magnolia.com\n";
$usermessage = "Thank you for contact MAGNOLIA. We will reply shortly with more details. Here a summary of your request: \n $e_content.  \n\n Call 0034 434324  for further information.";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='color:#fff; padding:10px'>";
	echo "<strong >Email Sent.</strong>Thank you <strong>$name</strong>, your request has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
<html>
	<head>
		<title>Signin | CFGS</title>
		<link rel="stylesheet" type="text/css" href="css/signin.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      	<a href="../" class="btn btn-primary btn-lg manage">Back to booking</a>
	</body>
</html>

<?php 

	include 'config.php';

	if (isset($_POST['user']) && isset($_POST['pass'])) {


	$user = $mysqli->real_escape_string($_POST['user']);
	$pass = $mysqli->real_escape_string($_POST['pass']);

	$Q = "SELECT * FROM users WHERE username = '" . $user . "' and password = '" . $pass .  "'";
	$R = $mysqli->query($Q);

	if ($R->num_rows == 1) {
	
		$F = $R->fetch_object();

		$_SESSION['user'] = $F->username;
		header("Location: home.php");
	}


	
	else  {
		
		header("Location: signin.php");
	
	}

}

?>
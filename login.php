<?php
session_start();


#phpinfo();
if(isset($_SESSION['usr_id'])!="") {
	# Check the referer to see if we need to go to english or russian
	if (preg_match('/lang=ru/', $_REQUEST['ref'])) {
	## Russian
	header("Location: assess-ru.php");
	} else {
	## English
	header("Location: assess.php");
	}
}

//check if form is submitted
if (isset($_POST['login'])) {


include 'dbconnect.php';
connectDB();

	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
#	if (preg_match('/lang=ru/', $_SERVER['HTTP_REFERER'])) {
	if (preg_match('/lang=ru/', $_REQUEST['ref'])) {
	## Russian
	header("Location: assess-ru.php");
	} else {
	## English
	header("Location: assess.php");
	}
	} else {
		$errormsg = "Incorrect Username or Password!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Open Organization Capability Model</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="assess.php"><img src="images/innovate.png">  Open Organization Capability Model</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php">Login</a></li>

			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					
					<div class="form-group">
						<label for="name">Username</label>
						<input type="text" name="email" placeholder="Your Username" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			<input type="hidden" id="ref" name="ref" value=<?php echo $_SERVER['HTTP_REFERER'];?>>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">

	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

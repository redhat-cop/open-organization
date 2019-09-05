<?php
session_start();
    if(isset($_REQUEST['lang'])) {
        $_SESSION['lang'] = $_REQUEST['lang'];
    }
    $language = (isset($_SESSION['lang']) ? $_SESSION['lang'] : "en");

if (($language != "ru") && ($language != "en")) {
	$language = "en";
	$_SESSION['lang'] = "en";
}

include 'print-index.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Open Org Capbility Model</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css"/>
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="css/style.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
   
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
    <script>
  $( function() {
    $( "input" ).checkboxradio();
  } );
  </script>
     
</head>
<body>
<?php # include_once("analyticstracking.php") ?>  
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="images/innovate.png">  Open Organization Capability Model</a>
			</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
			<li><a href=index.php?lang=en>English</a></li>
			<li><a href=index.php?lang=ru>Pусский</a></li>
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="assess.php">Run Assessment</a></li>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="register.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
				<?php } ?>

			</ul>
		</div>
	</div>
</nav>

<?php
if(isset($_SESSION['usr_id'])) {
include 'dbconnect.php';
$userId = $_SESSION['usr_id'];

?>


      </div>


    </div> <!-- /container -->
<?php    }
####  End of Logged on bit ######
?>

<?php
switch ($language) {
	case "en":
		printenindex();
		break;
	case "ru":
		printruindex();
		break;
   default:
		printenindex();

}
?>

<center><a href="login.php"><button type="button">Login</button></a></center>
<br />

<footer class="footer">
<center>
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
</center>
</footer>
</body>
</html>


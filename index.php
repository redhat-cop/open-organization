<?php
session_start();
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
<div class="container">

<h3>Welcome to the Open Organization Capability Model</h3>

<p class="mainText">
The Open Organization Capability Model is a tool for assessing your organization's current culture.
</p>

<p class="mainText">
In particular, the tool measures your organization's relative degree of openness, with particular attention to five open principles outlined in the <a href="https://github.com/open-organization-ambassadors/open-org-definition/blob/master/open_org_definition.md" target=_blank><b>Open Organization Definition</b></a>:
</p>

<ul>
        <li class="mainText">Transparency</li>
        <li class="mainText">Inclusivity</li>
        <li class="mainText">Adaptability</li>
        <li class="mainText">Collaboration</li>
        <li class="mainText">Community</li>
</ul>

<p class="mainText">
As part of the assessment process, you'll learn how individuals, teams, and organizations can critically examine their organizational practices and chart their progress toward becoming a more open organization.
</p>
<p class="mainText">
This tool is based on the Open Organization Maturity Model, which the open organization community maintains. For more information about that model, please visit <a target=_ href="http://www.opensource.com/open-organization/resources/open-org-maturity-model"><b>Opensource.com</b></a>.
</p>

<p class="mainText">Before beginning this assessment, remember: All organizations are different, so they adopt open principles and practices to different degrees. This model's three-level design therefore aims both to assist organizations determining the relative degree to which they act openly and to help them explore possibilities for becoming more so.
</p>

</div>

<center><a href="login.php"><button type="button">Login</button></a></center>

<footer class="footer">
<center>
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
</center>
</footer>
</body>
</html>


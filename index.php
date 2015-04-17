<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="icon" href="../../favicon.ico">

	<title>The CURSOR Site</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="styles/starter-template.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="img/logo.png" alt="The CURSOR site" width="100" />
				</a>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<!-- <span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> -->
					</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="events.php">Events</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<?php
						if(login_check($mysqli) == true){
							echo '
								<ul class="nav navbar-nav navbar-right list-inline">
									<p class="navbar-text"><font color="#fff"><span class="glyphicon glyphicon-user"></span> Welcome, ';
							if($_SESSION['nick'] == NULL) echo 'User';
							else echo $_SESSION['nick'];
							echo'!</font></p>
									<li><a href="eportal.php"><font color="#fff"><span class="glyphicon glyphicon-modal-window"></span> Member Portal</font></a></li>
									<li><a href="includes/logout.php"><font color="#fff"><span class="glyphicon glyphicon-log-out"></span> Log-out</font></a></li>
								</ul>
							';
						}
						else{
							echo '
								<form action="includes/process_login.php" method="post" name="login_form" class="navbar-form form-inline pull-right">
								 	<font color="#fff">Member Login:</font> 
									<input type="text" name="snum" class="span1" placeholder="Student Number" onkeydown="pressedEnter(event, this.form, this.form.password)"/>
									<input type="password" name="password" class="span1" placeholder="Password" onkeydown="pressedEnter(event, this.form, this.form.password)"/>
									<input type="button" value="Login" class="btn" onclick="formhash(this.form, this.form.password)"/>
								</form>
							';
						}
					?>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">

		<div class="starter-template">
			<h1>Home page!</h1>
			<p class="lead">Initial landing page</p>
		</div>

	</div>

	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
	</body>
</html>

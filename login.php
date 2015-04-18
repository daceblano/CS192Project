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
	<link href="styles/external-style.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="nav-img-brand" href="index.php">
					<img src="img/logo.png" alt="The CURSOR site" width="100" />
				</a>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="about.php"><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
						<li><a href="events.php"><span class="glyphicon glyphicon-list"></span> Events</a></li>
						<li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">

		<br><br><br>
		<font color="#fff">Member Login:</font> <br>
		<form action="includes/process_login.php" method="post" name="login_form"  >
		<?php
			if (isset($_GET['error'])) echo '<div class="log-in-error"><font color="#a94442">Error: Invalid Log-in!</font></div>';
		?>
		<div class="form-group">
			<label for="snum">Student number:</label>
			<input type="text" class="form-control" id="pwd" name="snum" placeholder="20XXXXXXX" onkeydown="pressedEnter(event, this.form, this.form.password)">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" name="password" placeholder="Password" onkeydown="pressedEnter(event, this.form, this.form.password)">
		</div>
		<!-- <div class="checkbox">
			<label><input type="checkbox"> Remember me</label>
		</div> -->
			<button type="button" class="btn btn-default" onclick="formhash(this.form, this.form.password)">Submit</button>
		</form>
	</div>

	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
	</body>
</html>

<?php
include_once 'includes/create_account.inc.php';
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/content-style.css" />
</head>
<body>
	<?php if(login_check($mysqli) == true){
	echo '<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="brand-text">Members Area</div>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="eportal.php"><span class="glyphicon glyphicon-tasks"></span> Events Portal</a></li>
							<li><a href="memdir.php"><span class="glyphicon glyphicon-list-alt"></span> Member Directory</a></li>						
							<li><a href="profile.php"><span class="glyphicon glyphicon-credit-card"></span> Profile</a></li>
							<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-briefcase"></span> Admin Page</a></li>
						</ul>';
						echo '
						<ul class="nav navbar-nav navbar-right list-inline">
							<p class="navbar-text"><font color="#fff"><span class="glyphicon glyphicon-user"></span> Welcome, ';
							if($_SESSION['nick'] == NULL) echo 'User';
							else echo $_SESSION['nick'];
							echo'!</font></p>
							<li><a href="index.php"><font color="#fff"><span class="glyphicon glyphicon-modal-window"></span> Index</font></a></li>
							<li><a href="includes/logout.php"><font color="#fff"><span class="glyphicon glyphicon-log-out"></span> Log-out</font></a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	';
	echo '<h1>Create Account</h1>';
	if (!empty($error_msg)) {
		echo $error_msg;
	}
	echo' <p>
	Success!<br>
	You have successfully created a new account. 
	Redirecting to admin page...
	</p>';
	header('Refresh:2; URL="./admin.php"');
	} else echo '<p>You are not authorized to access this page.</p>'; ?>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
</body>
</html>
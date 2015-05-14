<?php
include_once 'includes/create_account.inc.php';
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
	<h1>Create an Account</h1>';
	if (!empty($error_msg)) {
		echo $error_msg;
	}
	echo'
	<form class="form-horizontal" action="'; echo esc_url($_SERVER['PHP_SELF']); echo '" method="post">
		<div class="form-group">
			<label for="snum" class="col-sm-2 control-label">Student Number</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="snum" id="snum" placeholder="201XXXXXX"/><br>
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-4">
				<input type="password" class="form-control" name="password" id="password" placeholder="Password"/><br>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-4">
				<input type="submit" class="btn btn-success" value="Create" name="create" onclick="return createaccountformhash(this.form,this.form.snum,this.form.password);"></button>
				<input type="reset" class="btn btn-default" value="Reset" name="reset"></button>
				<input type="submit" class="btn btn-danger" value="Cancel" name="cancel"></button>
			</div>
		</div>
	</form>
	';
	} else echo '<p>You are not authorized to access this page.</p>'; ?>

	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
</body>
</html>
<?php
include_once 'includes/workspace.inc.php';
include_once 'includes/db_connect.php';
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
							<li class="active"><a href="eportal.php"><span class="glyphicon glyphicon-tasks"></span> Events Portal</a></li>
							<li><a href="memdir.php"><span class="glyphicon glyphicon-list-alt"></span> Member Directory</a></li>						
							<li><a href="profile.php"><span class="glyphicon glyphicon-credit-card"></span> Profile</a></li>';
							$val = admincheck($_SESSION['student_number'], $mysqli);
							if($val) echo '<li><a href="admin.php"><span class="glyphicon glyphicon-briefcase"></span> Admin Page</a></li>';
							echo '</ul>';
						echo '
						<ul class="nav navbar-nav navbar-right list-inline">
							<p class="navbar-text"><font color="#fff"><span class="glyphicon glyphicon-user"></span> Welcome, ';
							if($_SESSION['nick'] == NULL) echo 'User';
							else echo $_SESSION['nick'];
							echo'!</font></p>
							<li><a href="index.php"><font color="#fff"><span class="glyphicon glyphicon-modal-window"></span> Index</font></a></li>
							<li><a href="includes/logout.php"><font color="#fff"><span class="glyphicon glyphicon-log-out"></span> Log-out</font></a></li>
						</ul>
						';
						echo '
					</div>
				</div>
			</div>
		</nav>
	<h1>Edit event information</h1>';
	echo '
	<form class="form-horizontal" action="'; echo esc_url($_SERVER['PHP_SELF']); echo'" method="post" >
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="title" name="title" value="'; echo $result['title']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="date_created" class="col-sm-2 control-label">Date Created</label>
			<div class="col-sm-4">
				<p class="form-control-static">'; echo $result['date_created']; echo' </p>
			</div>
		</div>
		<div class="form-group">
			<label for="date_held" class="col-sm-2 control-label">Date of Event Proper</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="date_held" name="date_held" value="'; echo $result['date_held']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="description" name="description" value="'; echo $result['description']; echo'"/>
			</div>
		</div>
		<input type="hidden" name="eventID" id="eventID" value="'; echo $result['eventID']; echo '"/>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label"></label>
			<div class="col-sm-4">
				<input type="submit" class="btn btn-success" name="done" value="Submit"/>
				<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
				<input type="submit" class="btn btn-danger" name="cancel" value="Cancel"/>
			</div>
		</div>
	</form>
	';}
	else echo '<p>You are not authorized to access this page.</p>';
	?>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</body>
</html>
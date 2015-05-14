<?php
include_once 'includes/edit_profile.inc.php';
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
							<li><a href="eportal.php"><span class="glyphicon glyphicon-tasks"></span> Events Portal</a></li>
							<li><a href="memdir.php"><span class="glyphicon glyphicon-list-alt"></span> Member Directory</a></li>						
							<li class="active"><a href="profile.php"><span class="glyphicon glyphicon-credit-card"></span> Profile</a></li>
							<li><a href="admin.php"><span class="glyphicon glyphicon-briefcase"></span> Admin Page</a></li>
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
	<h1>Edit your profile</h1>';
	if (!empty($error_msg)) {
		echo $error_msg;
	}
	echo'
	<form class="form-horizontal" action="'; echo esc_url($_SERVER['PHP_SELF']); echo '" method="post" >
		<div class="form-group">
			<label for="nickname" class="col-sm-2 control-label">Nickname</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="nickname" name="nickname" value="'; echo $result['nickname']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="first_name" name="first_name" value="'; echo $result['first_name']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="last_name" name="last_name" value="'; echo $result['last_name']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="middle_name" class="col-sm-2 control-label">Middle Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="middle_name" name="middle_name" value="'; echo $result['middle_name']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="birthday" class="col-sm-2 control-label">Birth Date</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="birthday" name="birthday" value="'; echo $result['birthday']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="degree_program" class="col-sm-2 control-label">Degree Program</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="degree_program" name="degree_program" value="'; echo $result['degree_program']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="mail_main" class="col-sm-2 control-label">E-mail 1</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="mail_main" name="mail_main" value="'; echo $result['mail_main']; echo '"/>
			</div>
		</div>
		<div class="form-group">
			<label for="mail_alt" class="col-sm-2 control-label">E-mail 2</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="mail_alt" name="mail_alt" value="'; echo $result['mail_alt']; echo'"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_globe" class="col-sm-2 control-label">Phone Number (Globe)</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="num_globe" name="num_globe" value="'; 
					if($result['num_globe'] == NULL) echo "";
					else echo $result['num_globe']; echo'"
					placeholder="0905XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_smart" class="col-sm-2 control-label">Phone Number (Smart)</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="num_smart" name="num_smart" value="'; 
					if($result['num_smart'] == NULL) echo "";
					else echo $result['num_smart']; echo'"
					placeholder="0908XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_sun" class="col-sm-2 control-label">Phone Number (Sun)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="num_sun" name="num_sun" value="'; 
					if($result['num_sun'] == NULL) echo "";
					else echo $result['num_sun']; echo'"
					placeholder="0935XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="landline" class="col-sm-2 control-label">Landline</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="landline" name="landline" value="'; 
					if($result['landline'] == NULL) echo "";
					else echo $result['landline']; echo'"
					placeholder="639XXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="address" name="address" value="';
					if($result['address'] == NULL) echo "";
					else echo $result['address']; echo'"
					placeholder="Blk 4 Lot 7, BF Homes, Quezon City"/>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label"></label>
			<div class="col-sm-4">
				<input type="submit" class="btn btn-success" name="edit_profile" value="Submit"/>
				<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
				<input type="submit" class="btn btn-danger"  name="cancel" value="Cancel"/>
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
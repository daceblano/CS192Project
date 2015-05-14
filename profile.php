<?php
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
	<link rel="icon" href="../../favicon.ico">

	<title>The CURSOR Site - Events Portal</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/internal-style.css" rel="stylesheet">
</head>
<body>
<?php

$result = NULL;
	
if($stmt = $mysqli->prepare("SELECT nickname, first_name, last_name, middle_name, birthday, degree_program, mail_main, mail_alt, num_globe, num_smart, num_sun, landline, address, committee, status FROM members WHERE student_number = ? LIMIT 1")) {
	$stmt->bind_param('s', $_SESSION['student_number']);
	$stmt->execute();
	$res = $stmt->get_result();
	$result = $res->fetch_assoc();
}
?>
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
							<li class="active"><a href="profile.php"><span class="glyphicon glyphicon-credit-card"></span> Profile</a></li>';
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
	';
			
	echo '
		<div class="content-container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Profile</h3>
				</div>
			<div class="panel-body">
				<div class="row">
					<div class=" col-xs-5"> 
						<table class="table table-user-information">
						<tbody>
							<tr>
								<td class="info-lead">First Name</td>
								<td>';
								if($result['first_name'] != NULL ) echo $result['first_name'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Last Name</td>
								<td>';
								if($result['last_name'] != NULL ) echo $result['last_name'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Middle Name</td>
								<td>';
								if($result['middle_name'] != NULL ) echo $result['middle_name'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Date of Birth</td>
								<td>';
								if($result['birthday'] != NULL ) echo $result['birthday'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Degree Program</td>
								<td>'; 
								if($result['degree_program'] != NULL ) echo $result['degree_program'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
						</tbody>
						</table>
					</div>
					<div class=" col-xs-5"> 
						<table class="table table-user-information">
						<tbody>
							<tr>
								<td class="info-lead">Nickname</td>
								<td>'; 
								if($result['nickname'] != NULL ) echo $result['nickname'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Committee</td>
								<td>'; 
									if($result['committee'] == NULL){
										$str = $result['status']; 
										if($str == "Inactive") echo "Inactive";
										elseif($str == "Alumni") echo "Alumni";
										else echo '<p class="blank">NOT ASSIGNED</p>';
									}
									else{
										$str = $result['committee']; 
										if($str == "exec") echo "Executive Committee";
										elseif($str == "acad") echo "Academic Affairs Committee";
										elseif($str == "acti") echo "Activities Committee";
										elseif($str == "exte") echo "External Affairs Committee";
										elseif($str == "fin") echo "Finance Committee";
										elseif($str == "info") echo "Information and Public Relations Committee";
										elseif($str == "mem") echo "Membership Committee";
										elseif($str == "rex") echo "Records Committee";
									}
									echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Home Address</td>
								<td>'; 
								if($result['address'] != NULL ) echo $result['address'];
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
							<tr>
								<td class="info-lead">Phone Number</td>
								<td>'; 
								if($result['num_globe'] != NULL){ echo $result['num_globe']; echo "[Globe]<br>"; 
									if($result['num_smart'] != NULL){ echo $result['num_smart']; echo "[Smart]<br>";}
									if($result['num_sun'] != NULL){ echo $result['num_sun']; echo "[Sun]<br>";}
									if($result['landline'] != NULL){ echo $result['landline']; echo "[Landline]<br>";}
								}
								elseif($result['num_smart'] != NULL){ echo $result['num_globe']; echo "[Globe]<br>"; 
									if($result['num_sun'] != NULL){ echo $result['num_sun']; echo "[Sun]<br>";}
									if($result['landline'] != NULL){ echo $result['landline']; echo "[Landline]<br>";}
								}
								elseif($result['num_sun'] != NULL){ echo $result['num_globe']; echo "[Globe]<br>";
									if($result['landline'] != NULL){ echo $result['landline']; echo "[Landline]<br>";}
								}
								else echo '<p class="blank">BLANK</p>';
								echo '
								</td>
							</tr>
							<tr>
								<td class="info-lead">Email</td>
								<td>'; 
								if($result['mail_main'] != NULL ){
									echo $result['mail_main']; echo' [main]<br>';
									if($result['mail_alt'] != NULL){ echo $result['mail_alt']; echo ' [alt]';}
								}
								elseif($result['mail_alt'] != NULL ){
									echo $result['mail_alt']; 
									echo ' [alt]';
								}
								else echo '<p class="blank">BLANK</p>';
								echo '</td>
							</tr>
						</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<form action="edit_profile.php">
							<div class="form-group">
								<button type="submit" class="btn btn-info">Edit Profile</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	';

	}
	else echo '<p>You are not authorized to access this page.</p>';
	?>

	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 

</body>
</html>
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
	<link rel="stylesheet" href="styles/content-style.css" />
</head>
<body>
	<!-- Registration form to be output if the POST variables are not
	set or if the registration script caused an error. -->
	<h1>Edit your profile</h1>
	<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
	?>
	<form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" >
		<div class="form-group">
			<label for="nickname" class="col-sm-2 control-label">Nickname</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $result['nickname'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $result['first_name'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $result['last_name'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="middle_name" class="col-sm-2 control-label">Middle Name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $result['middle_name'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="birthday" class="col-sm-2 control-label">Birth Date</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $result['birthday'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="degree_program" class="col-sm-2 control-label">Degree Program</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="degree_program" name="degree_program" value="<?php echo $result['degree_program'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="mail_main" class="col-sm-2 control-label">E-mail 1</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="mail_main" name="mail_main" value="<?php echo $result['mail_main'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="mail_alt" class="col-sm-2 control-label">E-mail 2</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="mail_alt" name="mail_alt" value="<?php echo $result['mail_alt'];?>"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_globe" class="col-sm-2 control-label">Phone Number (Globe)</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="num_globe" name="num_globe" value="<?php 
					if($result['num_globe'] == NULL) echo "";
					else echo $result['num_globe'];?>"
					placeholder="905XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_smart" class="col-sm-2 control-label">Phone Number (Smart)</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="num_smart" name="num_smart" value="<?php 
					if($result['num_smart'] == NULL) echo "";
					else echo $result['num_smart'];?>"
					placeholder="908XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="num_sun" class="col-sm-2 control-label">Phone Number (Sun)</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="num_sun" name="num_sun" value="<?php 
					if($result['num_sun'] == NULL) echo "";
					else echo $result['num_sun'];?>"
					placeholder="935XXXXXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="landline" class="col-sm-2 control-label">Landline</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="landline" name="landline" value="<?php 
					if($result['landline'] == NULL) echo "";
					else echo $result['landline'];?>"
					placeholder="639XXXX"/>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="address" name="address" value="<?php 
					if($result['address'] == NULL) echo "";
					else echo $result['address'];?>"
					placeholder="Blk 4 Lot 7, BF Homes, Quezon City"/>
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-sm-2 control-label"></label>
			<div class="col-sm-1">
				<input type="submit" class="btn btn-success" name="edit_profile"/>
			</div>
			<div class="col-sm-1">
				<input type="reset" class="btn btn-default" name="reset"/>
			</div>
			<div class="col-sm-1">
				<input type="submit" class="btn btn-danger" value="Cancel" name="cancel"/>
			</div>
		</div>
	</form>

	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</body>
</html>
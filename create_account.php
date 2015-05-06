<?php
include_once 'includes/create_account.inc.php';
include_once 'includes/functions.php';
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
	<!-- Registration form to be output if the POST variables are not
	set or if the registration script caused an error. -->
	<h1>Create an Account</h1>
	<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
	?>
	<form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
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
			<div class="col-sm-1">
				<input type="submit" class="btn btn-success" value="Create" name="create" onclick="return createaccountformhash(this.form,this.form.snum,this.form.password);"></button>
			</div>
			<div class="col-sm-1">
				<input type="reset" class="btn btn-default" name="reset"></button>
			</div>
			<div class="col-sm-1">
				<input type="submit" class="btn btn-danger" value="Cancel" name="cancel"></button>
			</div>
		</div>
	</form>

	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
</body>
</html>
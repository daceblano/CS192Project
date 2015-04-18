<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="styles/content-style.css" />
</head>
<body>
	<h1>Admin Page</h1>
	<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
	?>
	<div class="content-panel">
		<form class="form-horizontal" action="instantiate.php">
			<div class="form-group">
				<input type="submit" class="btn btn-info col-sm-2" value="Event Creation" name="instantiate"/>
				<div class="col-sm-8">
					<span id="helpBlock" class="help-block">Create an event.</span>
				</div>
			</div>
		</form>
		<form class="form-horizontal" action="create_account.php">
			<div class="form-group">
				<input type="submit" class="btn btn-info col-sm-2" value="Account Creation" name="create_account"/>
				<div class="col-sm-10">
					<span id="helpBlock" class="help-block">Create account for a new member to access the site.</span>
				</div>
			</div>
		</form>
	</div>

	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</body>
</html>
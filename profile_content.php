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

	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="styles/content-style.css" />
</head>
<body>
	<div class="content-panel">
		<form action="edit_profile.php">
			<div class="form-group">
				<button type="submit" class="btn btn-default">Edit Profile</button>
			</div>
		</form>
	</div>
</body>


	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</html>
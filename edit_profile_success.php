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
	<p>Success!</p>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
	<script type="text/javascript">
		window.top.location.reload();
	</script></body>
</html>
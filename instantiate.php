<?php
include_once 'includes/instantiate.inc.php';
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
	<h1>Create an Event</h1>
	<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
	?>
	<form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Event Name:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="title" id="title" placeholder="Event Name"/><br>
			</div>
		</div>
		<div class="form-group">
			<label for="date" class="col-sm-2 control-label">Date:</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" name="date" id="date" placeholder="mm/dd/yyyy" /><br>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Description:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="description" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-1">
				<input type="submit" class="btn btn-success" value="Submit" name="submit"></button>
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
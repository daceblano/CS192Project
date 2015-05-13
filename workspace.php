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
	<h1>Edit event information</h1>
	<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" >
		Title:  <input type="text" name="title" id="title" value="<?php echo $result['title'];?>"/><br>
		Description:  <input type="text" name="description" id="description" value="<?php echo $result['description'];?>"/><br>
		Date Created:  <input type="text" name="date_created" id="date_created" value="<?php echo $result['date_created'];?>"/><br>
		Date Held:  <input type="text" name="date_held" id="date_held" value="<?php echo $result['date_held'];?>"/><br>
		Display Pic:  <input type="date" name="displayPic" id="displayPic" value="<?php echo $result['displayPic'];?>"/><br>
		Other Information:  <input type="text" name="listString" id="listString" value="<?php echo $result['listString'];?>"/><br>
		Links:  <input type="text" name="links" id="links" value="<?php echo $result['links'];?>"/><br>
		<input type="hidden" name="eventID" id="eventID" value="<?php echo $result['eventID']?>"/>
		
		<input type="submit" name="done" value="done"/>
		<input type="reset" name="reset" value="reset"/>
		<input type="submit" name="cancel" value="cancel"/>
	</form>
</body>
</html>
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
	<link rel="stylesheet" href="css/content-style.css" />
</head>
<body>
	<div class="content-panel">
	<?php
		//not sure if secure
		$result = mysqli_query($mysqli, "SELECT * FROM members ORDER BY last_name ASC");
		echo '<table class="table table-condensed table-hover table-striped">
			<tr>
			<th>ID</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Nickname</th>
			<th>Email</th>
			</tr>';

		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['student_number']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['nickname']."</td>";
			echo "<td>".$row['mail_main']."</td>";
			echo "</tr>";
		}
	?>
	</div>
</body>


	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</html>
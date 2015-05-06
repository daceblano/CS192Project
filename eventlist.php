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
		$result = mysqli_query($mysqli, "SELECT * FROM events");
		echo '<table class="table table-condensed table-hover table-striped">
			<tr>
			<th>Event Title</th>
			<th>Date</th>
			<th>Description</th>
			</tr>';

		// echo "<form method='post' action='workspace.php'>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['title']."</td>";
			echo "<td>".$row['date_created']."</td>";
			echo "<td>".$row['description']."</td>";
			echo "</tr>";
		}
		// echo "</form>";
	?>
	</div>
</body>


	<script src="js/bootstrap.min.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script> 
</html>
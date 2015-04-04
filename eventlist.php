<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	 
	sec_session_start();
?>
<?php
	//not sure if secure
	$result = mysqli_query($mysqli, "SELECT * FROM events");
	echo "<table id='akosilek'>
		<tr>
		<th>Event Title</th>
		<th>Date</th>
		<th>Description</th>
		</tr>";

	echo "<form method='post' action='workspace.php'>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td><input name='title' type='submit' value='".$row['title']."'/></td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "</tr>";
	}
	echo "</form>";
?>
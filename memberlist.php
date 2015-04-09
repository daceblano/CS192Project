<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	 
	sec_session_start();
?>
<?php
	//not sure if secure
	$result = mysqli_query($mysqli, "SELECT * FROM members ORDER BY last_name DESC");
	echo "<table id='akosilek'>
		<tr>
		<th>ID</th>
		<th>Last name</th>
		<th>Nickname</th>
		<th>Email</th>
		</tr>";

	while($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['student_number']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['nickname']."</td>";
		echo "<td>".$row['mail_main']."</td>";
		echo "</tr>";
	}
?>
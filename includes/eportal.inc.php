<?php
	include_once 'includes/db_connect.php';
	 
	sec_session_start();

	$set = NULL;
	if($stmt = $mysqli->prepare("SELECT * FROM events")) {
		echo 'test <br>';
		$stmt->execute();
		$res = $stmt->get_result();
		for ($set = array (); $row = $res->fetch_assoc(); $set[] = $row);
	}
?>
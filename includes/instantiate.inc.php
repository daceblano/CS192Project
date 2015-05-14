<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['submit'])) {
	if($_POST['title'] != '' && $_POST['date'] != '') {
		// Sanitize and validate the data passed in
		$title= filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$date_h = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
		$desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
		$date_c = date('Y-m-d', time());
		
		if (empty($error_msg)) {
			// Insert the new event into the database 
			if ($insert_stmt = $mysqli->prepare("INSERT INTO events (title, date_held, description, date_created) VALUES (?, ?, ?, ?)")) {
				$insert_stmt->bind_param('ssss', $title, $date_h, $desc, $date_c);
				// Execute the prepared query.
				if (! $insert_stmt->execute()) {
					header('Location: ../error.php?err=Instantiation failure: INSERT');
				}
			}
			header('Location: ./instantiate_success.php');
		}
	} else
		$error_msg = "Not enough information provided. Please fill out all the required forms.";
}
elseif (isset($_POST['cancel'])) {
	header('Location: ./admin.php');
}
?>
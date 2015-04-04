<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['title'], $_POST['date'], $_POST['description'])) {
    // Sanitize and validate the data passed in
    $title= filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
 
	/*
    $prep_stmt = "SELECT id FROM members WHERE title = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing event 
    if ($stmt) {
        $stmt->bind_param('s', $title);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // An event with this title already exists
            $error_msg .= '<p class="error">An event with this title already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
	*/
	
    if (empty($error_msg)) {
        // Insert the new event into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO events (title, date, description) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $title, $date, $description);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Instantiation failure: INSERT');
            }
        }
        header('Location: ./eportal.php');
    }
}
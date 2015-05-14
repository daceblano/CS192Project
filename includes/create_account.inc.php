<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['snum'], $_POST['p'])) {
    // Sanitize the data passed in
    $snum = filter_input(INPUT_POST, 'snum', FILTER_SANITIZE_STRING);
 
	// check existing student number
	$prep_stmt = "SELECT * FROM members WHERE `student_number` = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
	
    if ($stmt) {
        $stmt->bind_param('s', $snum);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this student number already exists.</p>';
                        $stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (student_number, password, salt) VALUES (?, ?, ?)")) {
            $insert_stmt->bind_param('sss', $snum, $password, $random_salt);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Refresh:2; URL="../error.php?err=Account creation failure: INSERT"');
            }
        }
        header('Location: ./account_creation_success.php');
    }
}

elseif (isset($_POST['cancel'])){
    // header('Refresh:2; URL="./admin.php"');
	header('Location: ./admin.php');
}
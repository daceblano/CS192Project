<?php
	// Create connection
	$con = mysqli_connect("localhost", "root","admin");

	// Create database
	$sql = "CREATE DATABASE cs192";
	mysqli_query($con,$sql);

	// Use database
	mysqli_query($con,"USE cs192");
	
	// The data from the login form
	$unf = $_POST["fname"]; //first name for now
	$pwf = $_POST["pword"];
	
	//get the hash from the database with the username unf
	$info = mysqli_query($con, "SELECT * FROM Members WHERE FirstName = '".$unf."'");
	$row = mysqli_fetch_array($info);
	$hash = $row['PassWord'];
	
	// Select the same username from the table
	if (password_verify($pwf, $hash)) {
		echo "<h>Password is valid!</h><br>REDIRECTING TO SOMEWHERE";
		header("Location: memdir.php");
		die();
	} else {
		echo "<h>Invalid password.</h><br>REDIRECTING TO SOMEWHERE ELSE";
		header("Location: index.php");
		die();
	}
	
	// Close connection
	mysqli_close($con);
?>
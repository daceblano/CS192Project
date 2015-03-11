<?php
	// Create connection
	$con=mysqli_connect("localhost", "root","admin");

	// Create database
	$sql="CREATE DATABASE cs192";
	mysqli_query($con,$sql);

	// Use database
	mysqli_query($con,"USE cs192");
	
	// Create table
	$sql = "CREATE TABLE Members 
		(
		PID INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(PID),
		FirstName CHAR(15),
		MiddleName CHAR(15),
		LastName CHAR(15),
		PassWord CHAR(255)
		)";
	mysqli_query($con,$sql);
	
	// Put into table
	$fn = $_POST["fname"];
	$ln = $_POST["lname"];
	$mn = $_POST["mname"];
	$pw = password_hash($_POST["pword"], PASSWORD_DEFAULT);
	mysqli_query($con, "INSERT INTO Members (FirstName, LastName, MiddleName, PassWord) VALUES ('$fn','$ln','$mn','$pw')");
	
	//close connection
	mysqli_close($con);
?>
<html>
	<h> ACCOUNT CREATED </h>
	<p> this should redirect to home afterwards </p>
</html>
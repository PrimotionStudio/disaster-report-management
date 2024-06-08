<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$password = $_POST["password"];

	// Check if username and email already exist in users table
	$select_user = "SELECT * FROM users WHERE username='$username' || email='$email'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) != 0) {
		$_SESSION["alert"] = "Username or Email already exists";
		header("location: register");
		exit;
	}

	// Insert user in database
	$insert_user = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";
	if (mysqli_query($con, $insert_user)) {
		$_SESSION["alert"] = "New account created";
		header("location: login");
	} else {
		$_SESSION["alert"] = "Error while creating account";
		header("location: register");
	}
	exit;
}

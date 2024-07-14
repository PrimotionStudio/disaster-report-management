<?php
const ACCOUNT_TYPES = ['Government Official', 'Community Member', 'Emergency Responder'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$account_type = $_POST["account_type"];
	$password = $_POST["password"];

	if (!in_array($account_type, ACCOUNT_TYPES)) {
		$_SESSION["alert"] = "Invalid account type";
		header("location: register");
		exit;
	}

	// Check if username and email already exist in users table
	$select_user = "SELECT * FROM users WHERE username='$username' || email='$email'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) != 0) {
		$_SESSION["alert"] = "Username or Email already exists";
		header("location: register");
		exit;
	}

	// Insert user in database
	$insert_user = "INSERT INTO users (username, email, phone, account_type, password) VALUES ('$username', '$email', '$phone', '$account_type', '$password')";
	if (mysqli_query($con, $insert_user)) {
		$_SESSION["alert"] = "New account created";
		header("location: login");
	} else {
		$_SESSION["alert"] = "Error while creating account";
		header("location: register");
	}
	exit;
}

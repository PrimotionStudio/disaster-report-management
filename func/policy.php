<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = $_POST["title"];
	$description = $_POST["description"];

	$insert_response = "INSERT INTO policy (user_id, title, description) VALUES ('$user_id', '$title', '$description')";
	if (mysqli_query($con, $insert_response)) {
		$_SESSION["alert"] = "Policy Added";
		header("location: policy");
	} else {
		$_SESSION["alert"] = "Error while adding policy";
		header("location: policy");
	}
	exit;
}

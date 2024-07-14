<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$description = $_POST["description"];

	$insert_response = "INSERT INTO response (user_id, disaster, description) VALUES ('$user_id', '$disaster', '$description')";
	if (mysqli_query($con, $insert_response)) {
		$_SESSION["alert"] = "Response Allocated";
		header("location: response");
	} else {
		$_SESSION["alert"] = "Error while allocating response";
		header("location: response");
	}
	exit;
}

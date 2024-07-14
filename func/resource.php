<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$disaster = $_POST["disaster"];
	$type = $_POST["type"];
	$quantity = $_POST["quantity"];
	$description = $_POST["description"];

	$insert_response = "INSERT INTO resource (user_id, disaster, type, quantity, description) VALUES ('$user_id', '$disaster', '$type', '$quantity', '$description')";
	if (mysqli_query($con, $insert_response)) {
		$_SESSION["alert"] = "Resource Allocated";
		header("location: resource");
	} else {
		$_SESSION["alert"] = "Error while allocating resource";
		header("location: resource");
	}
	exit;
}

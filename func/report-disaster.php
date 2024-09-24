<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$datetime = $_POST["datetime"];
	$state = $_POST["state"];
	$lga = $_POST["lga"];
	$street = $_POST["street"];
	$disaster = $_POST["disaster"];
	$severity = $_POST["severity"];
	$description = $_POST["description"];

	$location = "$state _location_ $lga _location_ $street";
	$insert_response = "INSERT INTO disasters (event_datetime, location, disaster, severity, description) VALUES ('$datetime', '$location', '$disaster', '$severity', '$description')";
	if (mysqli_query($con, $insert_response)) {
		$_SESSION["alert"] = "Disaster Reported";
		header("location: disasters");
	} else {
		$_SESSION["alert"] = "Error while reporting disaster";
		header("location: report-disaster");
	}
	exit;
}

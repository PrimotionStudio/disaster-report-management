<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $disaster_id = $_POST["disaster_id"];

    $select_disaster = "SELECT * FROM disasters WHERE id='$disaster_id'";
    $query_disaster = mysqli_query($con, $select_disaster);
    if (mysqli_num_rows($query_disaster) == 0) {
      $_SESSION["alert"] = "Cannot find the requested report";
      header("location: response");
      exit;
    }
    $get_disaster = mysqli_fetch_assoc($query_disaster);
    $disaster = $get_disaster["disaster"];
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

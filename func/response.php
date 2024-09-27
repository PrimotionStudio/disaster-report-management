<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $disaster_id = $_POST["disaster_id"];

    // $select_disaster = "SELECT * FROM disasters WHERE id='$disaster_id'";
    // $query_disaster = mysqli_query($con, $select_disaster);
    // if (mysqli_num_rows($query_disaster) == 0) {
    //   $_SESSION["alert"] = "Cannot find the requested report1";
    //   header("location: response?id=$disaster_id");
    //   exit;
    // }
    // $get_disaster = mysqli_fetch_assoc($query_disaster);
    // $disaster = $get_disaster["disaster"];
    $men = $_POST["men"];
    $women = $_POST["women"];
    $children = $_POST["children"];
    $quantity = $_POST["quantity"];
    $evacuation = $_POST["evacuation"];
    $mitigation = $_POST["mitigation"];
    $insert_response = "INSERT INTO response (user_id, disaster_id, men, women, children, quantity, evacuation, mitigation) VALUES ('$user_id', '$disaster_id', '$men', '$women', '$children', '$quantity', '$evacuation', '$mitigation')";
    if (mysqli_query($con, $insert_response)) {
        $_SESSION["alert"] = "Response Effort Saved";
        header("location: response?id=$disaster_id");
    } else {
        $_SESSION["alert"] = "Error while saving response effort";
        header("location: response?id=$disaster_id");
    }
    exit;
}

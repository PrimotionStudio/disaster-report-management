<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php
require_once "required/session.php";
require_once "required/sql.php";
require_once "required/validate.php";
const PAGE_TITLE = "Response Effort";
include_once "included/head.php";
require_once "included/alert.php";

?>
<div class="wrapper ">
    <?php
    include_once "included/sidebar.php";
    ?>
    <div class="main-panel">
        <?php
        include_once "included/navbar.php";
        ?>
        <div class="content">
            <div class="row">
                <?php

                $select_all_disasters = "SELECT * FROM disasters ORDER BY id DESC";
                $query_all_disasters = mysqli_query($con, $select_all_disasters);
                $all_disasters = [];
                while ($get_all_disasters = mysqli_fetch_assoc($query_all_disasters)) {
                    // $all_disasters[] = $get_all_disasters;
                    $all_disasters[$get_all_disasters["id"]] = $get_all_disasters["location"];
                }
                $select_all_response = "SELECT * FROM response";
                $query_all_response = mysqli_query($con, $select_all_response);
                $all_responses = [];
                while ($get_all_response = mysqli_fetch_assoc($query_all_response)) {
                    $all_responses[] = $get_all_response["id"];
                }
                ?>
                <div class="col-md-6 mx-auto">

                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Areas that have received government intervention</h>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>s/n</th>
                                        <th>
                                            Disaster
                                        </th>
                                        <th>
                                            Location
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $received_location = [];
                                        foreach ($all_disasters as $disaster_id => $location) {
                                            if (in_array($disaster_id, $all_responses)) {
                                                // echo $disaster_id . "<br>";
                                                $received_location[$disaster_id] = $location;
                                            }
                                        }
                                        $i = 1;
                                        foreach ($received_location as $disaster_id => $location) :
                                            $select_received_locations = "SELECT * FROM disasters WHERE id='$disaster_id'";
                                            $query_received_locations = mysqli_query($con, $select_received_locations);
                                            $get_received_locations = mysqli_fetch_assoc($query_received_locations);
                                            $disaster_name = $get_received_locations["disaster"];
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $i++ ?>
                                                </td>
                                                <td>
                                                    <?= $disaster_name ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (strstr($location, " _location_ ")) {
                                                        $location = explode(" _location_ ", $location);
                                                        echo $location[0] . ", ";
                                                        echo $location[1] . ", ";
                                                        echo $location[2] . "";
                                                    } else {
                                                        echo $location;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">

                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Remaining areas in need of government intervention</h>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>s/n</th>
                                        <th>
                                            Disaster
                                        </th>
                                        <th>
                                            Location
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $remaining_location = [];
                                        foreach ($all_disasters as $disaster_id => $location) {
                                            if (!in_array($disaster_id, $all_responses)) {
                                                // echo $disaster_id . "<br>";
                                                $remaining_location[$disaster_id] = $location;
                                            }
                                        }
                                        $i = 1;
                                        foreach ($remaining_location as $disaster_id => $location) :
                                            $select_remaining_locations = "SELECT * FROM disasters WHERE id='$disaster_id'";
                                            $query_remaining_locations = mysqli_query($con, $select_remaining_locations);
                                            $get_remaining_locations = mysqli_fetch_assoc($query_remaining_locations);
                                            $disaster_name = $get_remaining_locations["disaster"];
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $i++ ?>
                                                </td>
                                                <td>
                                                    <?= $disaster_name ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (strstr($location, " _location_ ")) {
                                                        $location = explode(" _location_ ", $location);
                                                        echo $location[0] . "<br/>";
                                                        echo $location[1] . "<br/>";
                                                        echo $location[2] . "<br/>";
                                                    } else {
                                                        echo $location;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        include_once "included/footer.php";
        ?>
    </div>
</div>

<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
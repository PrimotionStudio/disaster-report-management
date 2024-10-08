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
const PAGE_TITLE = "Resource Allocation";
include_once "included/head.php";
require_once "included/alert.php";

if ($get_user["account_type"] == ACCOUNT_TYPES[0])
    require_once "func/resource.php"
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
            <?php
            if ($get_user["account_type"] == ACCOUNT_TYPES[0]) :
            ?>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">Resource Allocation</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Type of Disaster</label>
                                                <select name="disaster" class="form-control">
                                                    <option value="Tornado">Tornado</option>
                                                    <option value="Earthquake">Earthquake</option>
                                                    <option value="Hurricane">Hurricane</option>
                                                    <option value="Volcano">Volcano</option>
                                                    <option value="Flood">Flood</option>
                                                    <option value="Landslide">Landslide</option>
                                                    <option value="Wildfire">Wildfire</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Resource Type</label>
                                                <input type="text" class="form-control" name="type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text">Location*</span>
                                                <input type="text" class="form-control" placeholder="State" name="state" required>
                                                <input type="text" class="form-control" placeholder="LGA" name="lga" required>
                                                <input type="text" class="form-control" placeholder="Street/Town" name="street" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" class="form-control" name="quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control textarea" id='content' name="description" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary btn-round">Allocate Resource</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>

            <div class="row">
                <?php
                if ($get_user["account_type"] != ACCOUNT_TYPES[1]) :
                    $select_all_disasters = "SELECT * FROM disasters ORDER BY id DESC";
                    $query_all_disasters = mysqli_query($con, $select_all_disasters);
                    $all_disasters = [];
                    while ($get_all_disasters = mysqli_fetch_assoc($query_all_disasters)) {
                        // $all_disasters[] = $get_all_disasters;
                        $all_disasters[$get_all_disasters["location"]] = $get_all_disasters["disaster"];
                    }
                    $select_all_resource = "SELECT * FROM resource";
                    $query_all_resource = mysqli_query($con, $select_all_resource);
                    $all_resources = [];
                    while ($get_all_resource = mysqli_fetch_assoc($query_all_resource)) {
                        $all_resources[$get_all_resource["location"]] = $get_all_resource["disaster"];
                    }
                ?>
                    <div class="col-md-6 mx-auto">

                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Areas that have received relief material</h>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <th>s/n</th>
                                            <th>
                                                Disaster
                                            </th>
                                            <th>Resource Type</th>
                                            <th>Quantity</th>
                                            <th>
                                                Location
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $received_location = [];
                                            foreach ($all_disasters as $location => $disaster) {
                                                if (array_key_exists($location, $all_resources) && $all_resources[$location] = $disaster) {
                                                    // echo $disaster_id . "<br>";
                                                    $received_location[$disaster] = $location;
                                                }
                                            }
                                            $i = 1;
                                            foreach ($received_location as $disaster => $location) :
                                                $select_received_locations = "SELECT * FROM resource WHERE disaster='$disaster' && location='$location'";
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
                                                    <td><?= $get_received_locations["type"] ?></td>
                                                    <td><?= $get_received_locations["quantity"] ?></td>
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
                                <h6 class="card-title">Remaining areas in need of relief materials</h>
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
                                            foreach ($all_disasters as $location => $disaster) {
                                                if (!array_key_exists($location, $all_resources)) {
                                                    // echo $disaster_id . "<br>";
                                                    $remaining_location[$location] = $disaster;
                                                }
                                            }
                                            $i = 1;
                                            foreach ($remaining_location as $location => $disaster) :
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $disaster ?>
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
                <?php
                endif;
                ?>

            </div>

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Resources Allocated</h4>
                        </div>
                    </div>
                    <?php
                    $select_response = "SELECT * FROM resource ORDER BY id DESC";
                    $query_response = mysqli_query($con, $select_response);
                    $i = 1;
                    while ($get_response = mysqli_fetch_assoc($query_response)) :
                    ?>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= $get_response["quantity"] . " " . $get_response["type"] . "(s) for " . $get_response["disaster"] ?></h5>
                                <p class="card-text text-muted"><small><?= date('M d, Y - h:i A', strtotime($get_response["datetime"])) ?></small></p>
                                <p class="card-text"><?= $get_response["description"] ?></p>
                                <p class="card-text text-muted">Location: <?php
                                                                            if (strstr($get_response["location"], " _location_ ")) {
                                                                                $location = explode(" _location_ ", $get_response["location"]);
                                                                                echo $location[0] . ", ";
                                                                                echo $location[1] . ", ";
                                                                                echo $location[2] . "";
                                                                            } else {
                                                                                echo $get_response["location"];
                                                                            }
                                                                            ?></p>
                            </div>
                        </div>
                    <?php
                        $i++;
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
        <?php
        include_once "included/footer.php";
        ?>
    </div>
</div>

<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
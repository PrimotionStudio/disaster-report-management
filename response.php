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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_disaster = "SELECT * FROM disasters WHERE id='$id'";
    $query_disaster = mysqli_query($con, $select_disaster);
    if (mysqli_num_rows($query_disaster) == 0) {
        $_SESSION["alert"] = "Cannot find the requested report3";
        header("location: index");
        exit;
    }
    $get_disaster = mysqli_fetch_assoc($query_disaster);
} else {
    $_SESSION["alert"] = "Cannot find the requested report2";
    header("location: index");
    exit;
}
const PAGE_TITLE = "Response Effort";
include_once "included/head.php";
require_once "included/alert.php";

if ($get_user["account_type"] == ACCOUNT_TYPES[2])
    require_once "func/response.php";
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
            if ($get_user["account_type"] == ACCOUNT_TYPES[2]) :
            ?>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card card-user">
                            <div class="card-header">
                                <h5 class="card-title">Response Effort for <?= $get_disaster["disaster"] ?></h5>
                                <p>Location: <?php
                                                if (strstr($get_disaster["location"], " _location_ ")) {
                                                    $location = explode(" _location_ ", $get_disaster["location"]);
                                                    echo $location[0] . " ";
                                                    echo $location[1] . " ";
                                                    echo $location[2] . " ";
                                                } else {
                                                    echo $get_disaster["location"];
                                                }
                                                ?></p>
                            </div>
                            <div class="card-body">

                                <form action="" method="post">
                                    <input type="hidden" name="disaster_id" value="<?= $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php
                                                $select_resource = "SELECT * FROM resource WHERE disaster='" . $get_disaster["disaster"] . "' && location='" . $get_disaster["location"] . "'";
                                                $query_resource = mysqli_query($con, $select_resource);
                                                if (mysqli_num_rows($query_resource) == 0) {
                                                    $quantity = 0;
                                                } else {
                                                    $get_resource = mysqli_fetch_assoc($query_resource);
                                                    $quantity = $get_resource["quantity"];
                                                }
                                                ?>
                                                <label>Quantity of Relief Materials Sent</label>
                                                <input type="number" class="form-control" name="quantity" placeholder="Quantity of Relief Materials Sent" value="<?= $quantity ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description of Evacuation Effort</label>
                                                <textarea class="form-control textarea" id='content' name="evacuation" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description of Mitigation Effort</label>
                                                <textarea class="form-control textarea" id='content2' name="mitigation" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <span class="input-group-text">Critical&nbsp; <small>but receiving treatment</small></span>
                                                <input type="number" class="form-control" placeholder="Men" name="men" required>
                                                <input type="number" class="form-control" placeholder="Women" name="women" required>
                                                <input type="number" class="form-control" placeholder="Children" name="children" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary btn-round">Save Response Effort</button>
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
                <div class="col-md-10 mx-auto">

                    <?php
                    $select_response = "SELECT * FROM response WHERE disaster_id='$id' ORDER BY id DESC";
                    $query_response = mysqli_query($con, $select_response);
                    $i = 1;
                    while ($get_response = mysqli_fetch_assoc($query_response)) :
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Title -->
                                <h5 class="card-title">Relief Effort for <span class="text-primary"><?= $get_disaster["disaster"] ?></span></h5>
                                <p class="card-text text-muted"><small><?= date('M d, Y - h:i A', strtotime($get_response["datetime"])) ?></small></p>
                                <!-- Relief Materials Section -->
                                <p class="card-text">
                                    <strong>Relief Materials Sent:</strong>
                                    <span class="text-success text-xl"><?= $get_response["quantity"] ?></span>
                                </p>
                                <!-- Evacuation Effort Section -->
                                <p class="card-text">
                                    <strong>Evacuation Effort:</strong>
                                    <span class="text-info"><?= $get_response["evacuation"] ?></span>
                                </p>
                                <!-- Mitigation Effort Section -->
                                <p class="card-text">
                                    <strong>Disaster Mitigation Efforts:</strong>
                                    <span class="text-warning"><?= $get_response["mitigation"] ?></span>
                                </p>
                                <!-- Critical Condition Section -->
                                <p class="card-text">
                                    <strong>People in Critical Condition:</strong>
                                </p>
                                <ul>
                                    <li><span class="text-danger">Males:</span> <?= $get_response["men"] ?></li>
                                    <li><span class="text-danger">Females:</span> <?= $get_response["women"] ?></li>
                                    <li><span class="text-danger">Children:</span> <?= $get_response["children"] ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                        $i++;
                    endwhile;
                    ?>
                </div>
                <div class="col-md-10 mx-auto">

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
                                        $select_unattended_disaster = "SELECT * FROM disasters ORDER BY id DESC";
                                        $query_unattended_disaster = mysqli_query($con, $select_unattended_disaster);
                                        while ($get_unattended_disaster = mysqli_fetch_assoc($query_unattended_disaster)) :

                                            $location = explode(" _location_ ", $get_unattended_disaster["location"]);
                                            $remaining_area = $location[0] + $location[1] + $location[2];
                                            if ($remaining_area > 0) :
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $get_unattended_disaster["id"] ?>
                                                    </td>
                                                    <td>
                                                        <?= $get_unattended_disaster["disaster"] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $location[0] . " ";
                                                        echo $location[1] . " ";
                                                        echo $location[2] . " ";
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            endif;
                                        endwhile;
                                        $select_response = "SELECT * FROM resource ORDER BY id DESC";
                                        $query_response = mysqli_query($con, $select_response);
                                        $i = 1;
                                        while ($get_response = mysqli_fetch_assoc($query_response)) :
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <?= $get_response["disaster"] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (strstr($get_response["location"], " _location_ ")) {
                                                        $location = explode(" _location_ ", $get_response["location"]);
                                                        echo $location[0] . " ";
                                                        echo $location[1] . " ";
                                                        echo $location[2] . " ";
                                                    } else {
                                                        echo $get_response["location"];
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endwhile;
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


<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('content2');
</script>
<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
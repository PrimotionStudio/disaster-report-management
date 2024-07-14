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
                                <h5 class="card-title">Response Effort</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <input type="hidden" name="disaster_id" value="<?= $id ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description of Response Effort</label>
                                                <textarea class="form-control textarea" name="description" placeholder=""></textarea>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Response Effort</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <th>s/n</th>
                                        <th>
                                            Description
                                        </th>
                                        <th class="text-right">
                                            Date/Time
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_response = "SELECT * FROM response WHERE disaster_id='$id' ORDER BY id DESC";
                                        $query_response = mysqli_query($con, $select_response);
                                        $i = 1;
                                        while ($get_response = mysqli_fetch_assoc($query_response)) :
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <?= $get_response["description"] ?>
                                                </td>
                                                <td class="text-right">
                                                    <?= date('d, M Y - h:iA', strtotime($get_response["datetime"])) ?>
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

<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
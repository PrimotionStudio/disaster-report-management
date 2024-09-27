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
const PAGE_TITLE = "Policy Making";
include_once "included/head.php";
require_once "included/alert.php";

if ($get_user["account_type"] == ACCOUNT_TYPES[0])
    require_once "func/policy.php";
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
                                <h5 class="card-title">Policy Making</h5>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Policy Title</label>
                                                <input type="text" class="form-control" placeholder="" name="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Policy Description</label>
                                                <textarea class="form-control textarea" id='content' name="description" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary btn-round">Add Policy</button>
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
                    $select_response = "SELECT * FROM policy";
                    $query_response = mysqli_query($con, $select_response);
                    $i = 1;
                    while ($get_response = mysqli_fetch_assoc($query_response)) :
                        $select_author = "SELECT * FROM users WHERE id='" . $get_response["user_id"] . "'";
                        $query_author = mysqli_query($con, $select_author);
                        $get_author = mysqli_fetch_assoc($query_author);
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= $get_response["title"] ?></h5>
                                <p class="card-text text-muted">by <strong><?= ucfirst($get_author["username"]) ?></strong> | <small><?= date('M d, Y - h:i A', strtotime($get_response["datetime"])) ?></small></p>
                                <p class="card-text"><?= $get_response["description"] ?></p>
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
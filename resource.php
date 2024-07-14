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
                                            <textarea class="form-control textarea" name="description" placeholder=""></textarea>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Resources Allocated</h4>
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
                                            Resource Type
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th class="text-right">
                                            Date/Time
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_resource = "SELECT * FROM resource";
                                        $query_resource = mysqli_query($con, $select_resource);
                                        $i = 1;
                                        while ($get_resource = mysqli_fetch_assoc($query_resource)) :
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td>
                                                    <?= $get_resource["disaster"] ?>
                                                </td>
                                                <td>
                                                    <?= $get_resource["type"] ?>
                                                </td>
                                                <td>
                                                    <?= $get_resource["quantity"] ?>
                                                </td>
                                                <td>
                                                    <?= $get_resource["description"] ?>
                                                </td>
                                                <td class="text-right">
                                                    <?= date('d, M Y - h:iA', strtotime($get_resource["datetime"])) ?>
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
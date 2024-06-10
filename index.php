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
const PAGE_TITLE = "Disaster Report Management System";
include_once "included/head.php";
require_once "included/alert.php";

$select_disasters = "SELECT * FROM disasters ORDER BY id DESC";
$query_disasters = mysqli_query($con, $select_disasters);
$disaster_types = [];
while ($get_disaster = mysqli_fetch_assoc($query_disasters)) {
  $disaster_types[] = $get_disaster["disaster"];
}

require_once "func/login.php";
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
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-globe text-warning"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Reports</p>
                    <p class="card-title"><?= mysqli_num_rows($query_disasters) ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fa fa-refresh"></i>
                Updated Now
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Users Behavior</h5>
              <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
              <canvas id="speedChart" width="400" height="100"></canvas>
            </div>
            <div class="card-footer ">
              <div class="chart-legend">
                <?php
                $bootstrap_colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'body', 'dark'];
                foreach ($disaster_types as $i => $type) :
                  $color = $bootstrap_colors[$i];
                ?>
                  <i class="fa fa-circle text-<?= $color ?>"></i> <?= $type ?>
                <?php
                endforeach;
                ?>
              </div>
              <hr />
              <div class="card-stats">
                <i class="fa fa-check"></i> Data information verified
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Email Statistics</h5>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-body ">
              <canvas id="chartEmail"></canvas>
            </div>
            <div class="card-footer ">
              <div class="legend">
                <i class="fa fa-circle text-primary"></i> Opened
                <i class="fa fa-circle text-warning"></i> Read
                <i class="fa fa-circle text-danger"></i> Deleted
                <i class="fa fa-circle text-gray"></i> Unopened
              </div>
              <hr>
              <div class="stats">
                <i class="fa fa-calendar"></i> Number of emails sent
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card card-chart">
            <div class="card-header">
              <h5 class="card-title">NASDAQ: AAPL</h5>
              <p class="card-category">Line Chart with Points</p>
            </div>
            <div class="card-body">
              <canvas id="chartHours" width="400" height="100"></canvas>
            </div>
            <div class="card-footer">
              <hr>
              <div class="stats">
                <i class="fa fa-history"></i> Updated 3 minutes ago
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
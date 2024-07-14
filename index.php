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

$select_disasters = "SELECT * FROM disasters";
$query_response = mysqli_query($con, $select_disasters);
$disaster_types = [];
while ($get_response = mysqli_fetch_assoc($query_response)) {
  $disaster_types[] = $get_response["disaster"];
}

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
                    <p class="card-title"><?= mysqli_num_rows($query_response) ?></p>
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
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Reported Disasters</h4>
            </div>
            <div class="card-body">
              <div class="">
                <table class="table table-hover">
                  <thead class="text-primary">
                    <th>s/n</th>
                    <th>
                      Disaster Type
                    </th>
                    <th>
                      Severity
                    </th>
                    <th>
                      Location
                    </th>
                    <th>
                      Event Date/Time
                    </th>
                    <th class="text-right">
                      Action
                    </th>
                  </thead>
                  <tbody>
                    <?php
                    $query_response = mysqli_query($con, $select_disasters);
                    $i = 1;
                    while ($get_response = mysqli_fetch_assoc($query_response)) :
                    ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td>
                          <?= $get_response["disaster"] ?>
                        </td>
                        <td>
                          <?= $get_response["severity"] ?>
                        </td>
                        <td>
                          <?= $get_response["location"] ?>
                        </td>
                        <td>
                          <?= date('d, M Y - h:iA', strtotime($get_response["event_datetime"])) ?>
                        </td>
                        <td class="text-right">
                          <a href="response?id=<?= $get_response["id"] ?>" title="more">
                            Response Effort
                            <i class="nc-icon nc-satisfied"></i>
                          </a>
                          |
                          <a href="disaster_details?id=<?= $get_response["id"] ?>" title="more">
                            More Information
                            <i class="nc-icon nc-minimal-right"></i>
                          </a>
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
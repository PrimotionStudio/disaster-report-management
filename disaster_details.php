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
    $_SESSION["alert"] = "Cannot find the requested report";
    header("location: disasters");
    exit;
  }
} else {
  $_SESSION["alert"] = "Cannot find the requested report";
  header("location: disasters");
  exit;
}
const PAGE_TITLE = "Disaster Details";
include_once "included/head.php";
require_once "included/alert.php";

$get_response = mysqli_fetch_assoc($query_disaster);

require_once "func/disaster-details.php";
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
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="card">
            <div class="card-body">
              <div class="">
                <table class="table">
                  <thead class="text-primary">
                    <th>
                      Disaster Type
                    </th>
                    <th>
                      Severity
                    </th>
                    <th>
                      Location
                    </th>
                    <th class="text-right">
                      Event Date/Time
                    </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <?= $get_response["disaster"] ?>
                      </td>
                      <td>
                        <?= $get_response["severity"] ?>
                      </td>
                      <td>
                        <?= $get_response["location"] ?>
                      </td>
                      <td class="text-right">
                        <?= date('d, M Y - h:iA', strtotime($get_response["event_datetime"])) ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer border-top">
              <h6 class="card-title">Description</h6>
              <p><?= $get_response["description"] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="card card-user">
            <div class="card-header">
              <h6 class="card-title">Update Report</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>Affected Population</label>
                      <textarea class="form-control textarea" name="affected" style="max-height: 200px; color: #000; height: 200px;" placeholder="Number of people affected"><?= $get_response["affected"] ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Extent of Damages</label>
                      <textarea class="form-control textarea" name="damages" style="max-height: 200px; color: #000; height: 200px;" placeholder="Extent of damages done"><?= $get_response["damages"] ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>Response Effort</label>
                      <textarea class="form-control textarea" name="response" style="max-height: 200px; color: #000; height: 200px;" placeholder="Has relieve materials been sent by government officials the response and effort made to tackle the disaster"><?= $get_response["response"] ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Casualties and Compensation</label>
                      <textarea class="form-control textarea" name="casualties" style="max-height: 200px; color: #000; height: 200px;" placeholder="Were the relieve materials enough"><?= $get_response["casualties"] ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Update</button>
                  </div>
                </div>
              </form>
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
?>
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
<script src="assets/js/Chart.js"></script>
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
                        <?php
                        switch ($get_response["severity"]) {
                          case '1':
                            echo "Level 1: Minimal impact, easily manageable.";
                            break;
                          case '2':
                            echo "Level 2: Minor impact, requires limited resources.";
                            break;
                          case '3':
                            echo "Level 3: Moderate impact, manageable with some effort.";
                            break;
                          case '4':
                            echo "Level 4: Significant impact, requires substantial resources.";
                            break;
                          case '5':
                            echo "Level 5: Major impact, affecting a large area or population.";
                            break;
                          case '6':
                            echo "Level 6: Severe impact, causing widespread disruption.";
                            break;
                          case '7':
                            echo "Level 7: Critical impact, posing a significant threat.";
                            break;
                          case '8':
                            echo "Level 8: Catastrophic impact, causing widespread devastation.";
                            break;
                          case '9':
                            echo "Level 9: Emergency impact, requiring immediate response to prevent further loss.";
                            break;
                          case '10':
                            echo "Level 10: Extreme impact, causing widespread destruction and loss of life.";
                            break;
                          default:
                            echo "Invalid severity level.";
                            break;
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if (strstr($get_response["location"], " _location_ ")) {
                          $location = explode(" _location_ ", $get_response["location"]);
                          echo $location[0] . "<br/>";
                          echo $location[1] . "<br/>";
                          echo $location[2] . "<br/>";
                        } else {
                          echo $get_response["location"];
                        }
                        ?>
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
                      <!-- <label>Affected Population</label> -->
                      <canvas id="affectedPopulationChart"></canvas>
                      <script>
                        // Generate random values between 0 and 1000 for men, women, and children
                        const men = Math.floor(Math.random() * 9999);
                        const women = Math.floor(Math.random() * 9999);
                        const children = Math.floor(Math.random() * 9999);

                        const ctx = document.getElementById('affectedPopulationChart').getContext('2d');
                        const populationChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: ['Men', 'Women', 'Children'],
                            datasets: [{
                              label: 'Number of affected population',
                              data: [men, women, children],
                              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                              borderColor: ['#2e59d9', '#17a673', '#2c9faf'],
                              borderWidth: 1
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            }
                          }
                        });
                      </script>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <canvas id="extentDamageChart"></canvas>
                      <script>
                        // Generate random values for the data
                        const housesAffected = Math.floor(Math.random() * 9999); // Number of houses affected
                        const areaCovered = Math.floor(Math.random() * 9999); // Area covered by damages in square meters
                        const propertyWorth = Math.floor(Math.random() * 99999); // Worth of properties in dollars

                        const damagetx = document.getElementById('extentDamageChart').getContext('2d');
                        const damageChart = new Chart(damagetx, {
                          type: 'bar',
                          data: {
                            labels: ['Houses Affected', 'Area Covered (sq meters)', 'Property Worth (₦)'],
                            datasets: [{
                              label: 'Damage Statistics',
                              data: [housesAffected, areaCovered, propertyWorth],
                              backgroundColor: ['#f94144', '#f3722c', '#f8961e'],
                              borderColor: ['#d7263d', '#e36414', '#f77f00'],
                              borderWidth: 1
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            },
                            plugins: {
                              tooltip: {
                                callbacks: {
                                  label: function(context) {
                                    let label = context.dataset.label || '';

                                    if (label) {
                                      label += ': ';
                                    }
                                    label += context.raw;
                                    if (context.dataIndex === 1) {
                                      label += ' sq meters'; // Add units for area
                                    } else if (context.dataIndex === 2) {
                                      label += ' $'; // Add dollar sign for worth
                                    }
                                    return label;
                                  }
                                }
                              }
                            }
                          }
                        });
                      </script>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <!-- <label>Response Effort</label> -->

                      <?php
                      $select_response = "SELECT * FROM response WHERE disaster_id='$id' ORDER BY id DESC";
                      $query_response = mysqli_query($con, $select_response);
                      if (mysqli_num_rows($query_response) != 0) :
                        $get_response = mysqli_fetch_assoc($query_response)
                      ?>
                        <div class="border p-3 rounded">
                          <p class="card-text">
                            <strong>Relief Materials Sent:</strong>
                            <span class="text-success text-xl"><?= $get_response["quantity"] ?></span>
                          </p>
                          <p class="card-text">
                            <strong>Evacuation Effort:</strong>
                            <span class="text-info"><?= $get_response["evacuation"] ?></span>
                          </p>
                          <p class="card-text">
                            <strong>Disaster Mitigation Efforts:</strong>
                            <span class="text-warning"><?= $gt_response["mitigation"] ?></span>
                          </p>
                          <p class="card-text">
                            <strong>People in Critical Condition:</strong>
                          </p>
                          <ul>
                            <li><span class="text-danger">Males:</span> <?= $get_response["men"] ?></li>
                            <li><span class="text-danger">Females:</span> <?= $get_response["women"] ?></li>
                            <li><span class="text-danger">Children:</span> <?= $get_response["children"] ?></li>
                          </ul>
                        </div>
                      <?php
                      endif;
                      ?>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <canvas id="casualtiesChart"></canvas>
                      <script>
                        // Generate random values for the data
                        const deaths = Math.floor(Math.random() * 9999); // Number of deaths
                        const injured = Math.floor(Math.random() * 9999); // Number of injured people
                        const compensations = Math.floor(Math.random() * 99999); // Compensation amount in dollars

                        const casualtytx = document.getElementById('casualtiesChart').getContext('2d');
                        const casualtiesChart = new Chart(casualtytx, {
                          type: 'bar',
                          data: {
                            labels: ['Number of Deaths', 'Number of Injured', 'Compensations ($)'],
                            datasets: [{
                              label: 'Casualties and Compensation',
                              data: [deaths, injured, compensations],
                              backgroundColor: ['#ff4d4d', '#ffbf00', '#36b9cc'],
                              borderColor: ['#e60000', '#e6ac00', '#2c9faf'],
                              borderWidth: 1
                            }]
                          },
                          options: {
                            scales: {
                              y: {
                                beginAtZero: true
                              }
                            },
                            plugins: {
                              tooltip: {
                                callbacks: {
                                  label: function(context) {
                                    let label = context.dataset.label || '';

                                    if (label) {
                                      label += ': ';
                                    }
                                    label += context.raw;
                                    if (context.dataIndex === 2) {
                                      label += ' $'; // Add dollar sign for compensation
                                    }
                                    return label;
                                  }
                                }
                              }
                            }
                          }
                        });
                      </script>
                      <!-- <label>Casualties and Compensation</label>
                      <textarea class="form-control textarea" name="casualties" style="max-height: 200px; color: #000; height: 200px;" placeholder="Were the relieve materials enough"><?= $get_response["casualties"] ?></textarea> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <!-- <button type="submit" class="btn btn-primary btn-round">Update</button> -->
                  </div>
                </div>
              </form>
              <!-- <form action="" method="post">
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
              </form> -->
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
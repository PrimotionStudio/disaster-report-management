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
if ($get_user["account_type"] == ACCOUNT_TYPES[0]) {
  define('PAGE_TITLE', "High Level Oversight");
} else {
  define('PAGE_TITLE', "Monitor Real-Time Data");
}
include_once "included/head.php";
require_once "included/alert.php";

$select_disasters = "SELECT * FROM disasters";
$query_response = mysqli_query($con, $select_disasters);
$disaster_types = [];
while ($get_response = mysqli_fetch_assoc($query_response)) {
  $disaster_types[] = $get_response["disaster"];
}
$disaster_types = array_unique($disaster_types);
require_once "func/login.php";
?>
<style>
  #graph-x {
    position: absolute;
    transform: translate(150px, -20px);
  }

  #graph-y {
    writing-mode: vertical-lr;
    position: absolute;
    transform: translate(-5px, 20px);
  }

  canvas {
    margin: 0 0 1rem 1rem;
  }
</style>
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

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <div class="container my-5">
        <div class="row">
          <!-- Bar Chart -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="">Total Number of Casualties</h4>
              </div>
              <div class='card-body'>
                <canvas id="casualtiesChart"></canvas>
              </div>
            </div>
          </div>

          <!-- Line Chart -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="">Hospitalized People</h4>
              </div>
              <div class='card-body'>
                <canvas id="hospitalizedChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Reported Occurances</h4>
            </div>
            <div class="card-body">
              <span id="graph-y">occurance</span>
              <canvas id="occurance" width="400" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Reported Severity/Occurances</h4>
            </div>
            <div class="card-body">
              <span id="graph-y">severity</span>
              <canvas id="sever_occur" width="400" height="200"></canvas>
              <span id="graph-x">occurance</span>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($disaster_types as $type) :
        ?>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?= ucfirst($type) ?> Severity</h4>
              </div>
              <div class="card-body">
                <span id="graph-y">severity</span>
                <canvas id="<?= $type ?>_chart" width="400" height="200"></canvas>
                <span id="graph-x">occurance</span>
              </div>
            </div>
          </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mx-4 p-0">
          <h4 class="px-3">Severity Lookup Table</h4>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Severity Level</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Level 1</td>
                <td>Minimal impact, easily manageable.</td>
              </tr>
              <tr>
                <td>Level 2</td>
                <td>Minor impact, requires limited resources.</td>
              </tr>
              <tr>
                <td>Level 3</td>
                <td>Moderate impact, manageable with some effort.</td>
              </tr>
              <tr>
                <td>Level 4</td>
                <td>Significant impact, requires substantial resources.</td>
              </tr>
              <tr>
                <td>Level 5</td>
                <td>Major impact, affecting a large area or population.</td>
              </tr>
              <tr>
                <td>Level 6</td>
                <td>Severe impact, causing widespread disruption.</td>
              </tr>
              <tr>
                <td>Level 7</td>
                <td>Critical impact, posing a significant threat.</td>
              </tr>
              <tr>
                <td>Level 8</td>
                <td>Catastrophic impact, causing widespread devastation.</td>
              </tr>
              <tr>
                <td>Level 9</td>
                <td>Emergency impact, requiring immediate response to prevent further loss.</td>
              </tr>
              <tr>
                <td>Level 10</td>
                <td>Extreme impact, causing widespread destruction and loss of life.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php
    include_once "included/footer.php";
    ?>
  </div>
</div>

<script>
  // Simulate an API response with random data
  const casualtiesData = {
    men: Math.floor(Math.random() * 500),
    women: Math.floor(Math.random() * 500),
    children: Math.floor(Math.random() * 500)
  };

  const hospitalizedData = {
    men: Math.floor(Math.random() * 1000),
    women: Math.floor(Math.random() * 1000),
    children: Math.floor(Math.random() * 1000)
  };

  // Bar Chart - Total Number of Casualties
  const casualtiesCtx = document.getElementById('casualtiesChart').getContext('2d');
  new Chart(casualtiesCtx, {
    type: 'bar',
    data: {
      labels: ['Men', 'Women', 'Children'],
      datasets: [{
        label: 'Total Casualties',
        data: [casualtiesData.men, casualtiesData.women, casualtiesData.children],
        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
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

  // Line Chart - Hospitalized People
  const hospitalizedCtx = document.getElementById('hospitalizedChart').getContext('2d');
  new Chart(hospitalizedCtx, {
    type: 'line',
    data: {
      labels: ['Men', 'Women', 'Children'],
      datasets: [{
        label: 'Total Hospitalized',
        data: [hospitalizedData.men, hospitalizedData.women, hospitalizedData.children],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true
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
<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
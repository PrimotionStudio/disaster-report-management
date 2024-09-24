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
const PAGE_TITLE = "Report Disaster";
include_once "included/head.php";
require_once "included/alert.php";

require_once "func/report-disaster.php";
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
              <h5 class="card-title">Report Disaster</h5>
              <sub>* indicates a required field</sub>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>Date and Time of the Event*</label>
                      <input type="datetime-local" class="form-control" name="datetime" required>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Type of Disaster*</label>
                      <select name="disaster" class="form-control" required>
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
                  <div class="col-12">
                    <div class="form-group">
                      <label>Severity:</label>
                      <select name="severity" class="form-control" required>
                        <optgroup label='Low'>
                          <option value="1">Level 1: Minimal impact, easily manageable.</option>
                          <option value="2">Level 2: Minor impact, requires limited resources.</option>
                          <option value='3'>Level 3: Moderate impact, manageable with some effort.</option>
                        </optgroup>
                        <optgroup label='Medium'>
                          <option value="4">Level 4: Significant impact, requires substantial resources.</option>
                          <option value="5">Level 5: Major impact, affecting a large area or population.</option>
                          <option value="6">Level 6: Severe impact, causing widespread disruption.</option>
                        </optgroup>
                        <optgroup label='High'>
                          <option value="7">Level 7: Critical impact, posing a significant threat.</option>
                          <option value="8">Level 8: Catastrophic impact, causing widespread devastation.</option>
                          <option value="9">Level 9: Emergency impact, requiring immediate response to prevent further loss.</option>
                        </optgroup>
                        <optgroup label='Catastrophic'>
                          <option value="10">Level 10: Extreme impact, causing widespread destruction and loss of life.</option>
                        </optgroup>
                      </select>
                      <!-- <input type="range" id="severity" name="severity" class="form-control-range" min="1" max="10"> -->
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
                      <label>Description</label>
                      <textarea class="form-control textarea" name="description" placeholder="Write a description of the incident to enable the emergency responder better understand the situation" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Report</button>
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
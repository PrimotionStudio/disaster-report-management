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
const PAGE_TITLE = "Disaster Entry";
include_once "included/head.php";
require_once "included/alert.php";

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
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Report Disaster</h5>
            </div>
            <div class="card-body">
              <f>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>Date and Time of the Event</label>
                      <input type="datetime-local" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Type of Disaster</label>
                      <select name="disaster" class="form-control">
                        <option value="Fire">Fire</option>
                        <option value="Tornado">Tornado</option>
                        <option value="Earthquake">Earthquake</option>
                        <option value="Hurricane">Hurricane</option>
                        <option value="Volcano">Volcano</option>
                        <option value="Flood">Flood</option>
                        <option value="Tsunami">Tsunami</option>
                        <option value="Landslide">Landslide</option>
                        <option value="Drought">Drought</option>
                        <option value="Wildfire">Wildfire</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Severity: <span id="value">5</span></label>
                      <input type="range" id="severity" class="form-control-range" min="0" max="10">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Location</label>
                      <input type="text" class="form-control" placeholder="" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" placeholder="Company" value="Chet">
                    </div>
                  </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 pr-1">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" placeholder="City" value="Melbourne">
                    </div>
                  </div>
                  <div class="col-md-4 px-1">
                    <div class="form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" placeholder="Country" value="Australia">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label>Postal Code</label>
                      <input type="number" class="form-control" placeholder="ZIP Code">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
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
<script>
  document.getElementById('severity').addEventListener('input', function() {
    document.getElementById('value').textContent = this.value;
  });
</script>
<?php
include_once "included/scripts.php";
?>
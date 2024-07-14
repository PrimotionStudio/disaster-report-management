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
const PAGE_TITLE = "Access Safety Information";
include_once "included/head.php";
require_once "included/alert.php";

$select_disasters = "SELECT * FROM disasters";
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
            <?php
            if ($get_user["account_type"] === ACCOUNT_TYPES[1]) : //Community member
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Safety Information</h4>
                            </div>
                            <div class="card-body">
                                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="Search for disaster types..">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="disasterTable">
                                        <thead class="text-primary">
                                            <th>Disaster Type</th>
                                            <th>Description</th>
                                            <th>Location of Shelters</th>
                                            <th>Emergency Contact Numbers</th>
                                            <th>Guidelines</th>
                                        </thead>
                                        <tbody>
                                            <!-- Earthquake -->
                                            <tr>
                                                <td>Earthquake</td>
                                                <td>A sudden and violent shaking of the ground.</td>
                                                <td>
                                                    <ul>
                                                        <li>Shelter A: 123 Main St.</li>
                                                        <li>Shelter B: 456 Oak Ave.</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Emergency: 911</li>
                                                        <li>Local: (555) 123-4567</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Drop, Cover, and Hold On.</li>
                                                        <li>Stay indoors until the shaking stops.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Flood -->
                                            <tr>
                                                <td>Flood</td>
                                                <td>Overflow of water that submerges land.</td>
                                                <td>
                                                    <ul>
                                                        <li>Shelter C: 789 River Rd.</li>
                                                        <li>Shelter D: 101 Creek Blvd.</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Emergency: 911</li>
                                                        <li>Local: (555) 234-5678</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Move to higher ground immediately.</li>
                                                        <li>Avoid walking or driving through floodwaters.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Hurricane -->
                                            <tr>
                                                <td>Hurricane</td>
                                                <td>A tropical storm with violent wind.</td>
                                                <td>
                                                    <ul>
                                                        <li>Shelter E: 202 Storm St.</li>
                                                        <li>Shelter F: 303 Windy Way.</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Emergency: 911</li>
                                                        <li>Local: (555) 345-6789</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Stay indoors away from windows.</li>
                                                        <li>Follow evacuation orders from authorities.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Wildfire -->
                                            <tr>
                                                <td>Wildfire</td>
                                                <td>An uncontrolled fire in a forest or other area of vegetation.</td>
                                                <td>
                                                    <ul>
                                                        <li>Shelter G: 404 Fire Lane.</li>
                                                        <li>Shelter H: 505 Forest Dr.</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Emergency: 911</li>
                                                        <li>Local: (555) 456-7890</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Evacuate immediately if instructed to do so.</li>
                                                        <li>Wear protective clothing to avoid burns.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Tornado -->
                                            <tr>
                                                <td>Tornado</td>
                                                <td>A mobile, destructive vortex of violently rotating winds.</td>
                                                <td>
                                                    <ul>
                                                        <li>Shelter I: 606 Tornado Alley.</li>
                                                        <li>Shelter J: 707 Cyclone Cir.</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Emergency: 911</li>
                                                        <li>Local: (555) 567-8901</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Seek shelter in a basement or interior room.</li>
                                                        <li>Avoid windows and cover yourself with a mattress or blankets.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            endif;
            ?>
        </div>
        <?php
        include_once "included/footer.php";
        ?>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tableSearch = document.getElementById('tableSearch');
        var tableRows = document.getElementById('disasterTable').getElementsByTagName('tr');

        tableSearch.addEventListener('keyup', function() {
            var filter = tableSearch.value.toLowerCase();
            for (var i = 0; i < tableRows.length; i++) {
                var row = tableRows[i];
                var rowText = row.textContent.toLowerCase();
                row.style.display = rowText.indexOf(filter) > -1 ? '' : 'none';
            }
        });
    });
</script>
<?php
include_once "included/scripts.php";
include_once "included/charts.php";
?>
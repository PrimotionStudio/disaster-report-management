<div class="sidebar" data-color="white" data-active-color="danger">
	<div class="logo">
		<a href="javascript:;" class="simple-text logo-mini">
			<div class="logo-image-small">
				<img src="assets/img/logo-small.png">
			</div>
			<!-- <p>CT</p> -->
		</a>
		<a href="javascript:;" class="simple-text logo-normal">
			DRMS
			<!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
		</a>
	</div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li>
				<a href="index">
					<i class="nc-icon nc-bank"></i>
					<p>Dashboard</p>
				</a>
			</li>
			<?php
			if ($get_user["account_type"] == ACCOUNT_TYPES[1]) :
			?>
				<li>
					<a href="report-disaster">
						<i class="nc-icon nc-sound-wave"></i>
						<p>Report Disaster</p>
					</a>
				</li>
				<li>
					<a href="disasters">
						<i class="nc-icon nc-single-copy-04"></i>
						<p>Disasters</p>
					</a>
				</li>
				<li>
					<a href="updates">
						<i class="nc-icon nc-refresh-69"></i>
						<p>Disaster Updates</p>
					</a>
				</li>
				<li>
					<a href="safety-information">
						<i class="nc-icon nc-alert-circle-i"></i>
						<p>Safety Information</p>
					</a>
				</li>
			<?php
			endif;
			?>
			<li>
				<a href="analysis">
					<i class="nc-icon nc-chart-bar-32"></i>
					<p>Analysis</p>
				</a>
			</li>
			<li class="active-pro">
				<a href="logout">
					<i class="nc-icon text-danger nc-button-power"></i>
					<p class="text-danger">Logout</>
				</a>
			</li>
		</ul>
	</div>
</div>
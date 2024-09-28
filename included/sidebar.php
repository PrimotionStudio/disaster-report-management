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
	<?php
	function file_name()
	{
		$file_path = explode("/", $_SERVER["SCRIPT_NAME"]);
		$file_name = end($file_path);
		return explode(".", $file_name)[0];
	}
	?>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li class="<?php echo (file_name() === "index") ? "active" : ""; ?>">
				<a href="index">
					<i class="nc-icon nc-bank"></i>
					<p>Dashboard</p>
				</a>
			</li>
			<?php
			if ($get_user["account_type"] == ACCOUNT_TYPES[1]) :
			?>
				<li class="<?php echo (file_name() === "report-disaster") ? "active" : ""; ?>">
					<a href="report-disaster">
						<i class="nc-icon nc-sound-wave"></i>
						<p>Report Disaster</p>
					</a>
				</li>
				<li class="<?php echo (file_name() === "disasters") ? "active" : ""; ?>">
					<a href="disasters">
						<i class="nc-icon nc-refresh-69"></i>
						<p>Disasters Updates</p>
					</a>
				</li>
				<li class="<?php echo (file_name() === "safety-information") ? "active" : ""; ?>">
					<a href="safety-information">
						<i class="nc-icon nc-alert-circle-i"></i>
						<p>Safety Information</p>
					</a>
				</li>
			<?php
			endif;
			if ($get_user["account_type"] == ACCOUNT_TYPES[0] || $get_user["account_type"] == ACCOUNT_TYPES[2]) :
			?>
				<li class="<?php echo (file_name() === "analysis") ? "active" : ""; ?>">
					<a href="analysis">
						<i class="nc-icon nc-chart-bar-32"></i>
						<p><?= $get_user["account_type"] == ACCOUNT_TYPES[0] ? "High-Level Oversight" : "Monitor Real-Time Data" ?></p>
					</a>
				</li>
			<?php
			endif;
			if ($get_user["account_type"] == ACCOUNT_TYPES[2]) :
			?>
				<li class="<?php echo (file_name() === "response-effort") ? "active" : ""; ?>">
					<a href="response-effort">
						<i class="nc-icon nc-chart-bar-32"></i>
						<small><?= "Coordinate Response Effort" ?></small>
					</a>
				</li>
			<?php
			endif;
			?>
			<li class="<?php echo (file_name() === "resource") ? "active" : ""; ?>">
				<a href="resource">
					<i class="nc-icon nc-ambulance"></i>
					<p>Resource Allocation</p>
				</a>
			</li>

			<li class="<?php echo (file_name() === "policy") ? "active" : ""; ?>">
				<a href="policy">
					<i class="nc-icon nc-paper"></i>
					<p>Policy Making</p>
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
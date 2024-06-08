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
include_once "included/head.php";
?>
<div class="wrapper">
	<div class="row mt-5">
		<div class="col-4"></div>
		<div class="col-4">
			<div class="card card-md card-user border-top">
				<div class="card-header">
					<h5 class="card-title text-center">Disaster Management System</h5>
				</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="Username" value="" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" placeholder="Password" />
						</div>
						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="submit" class="btn btn-primary btn-round">
									Login
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-12"><p class="text-center">Don't have an account? <a href="register">Register!</a></p></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
</div>
<?php
include_once "included/scripts.php";
?>
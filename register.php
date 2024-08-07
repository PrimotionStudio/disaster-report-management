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
const PAGE_TITLE = "Register";
include_once "included/head.php";
require_once "included/alert.php";

require_once "func/register.php";
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
					<form action="" method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" placeholder="Username" name="username" required />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Email" name="email" required />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" class="form-control" placeholder="Phone" name="phone" required />
						</div>
						<div class="form-group">
							<label>Account Type</label>
							<select name="account_type" class="form-control">
								<option value="Community Member">Community Member</option>
								<option value="Emergency Responder">Emergency Responder</option>
								<option value="Government Official">Government Official</option>
							</select>
						</div>
						<div class="form-group">
							<lael>Password</label>
							<input type="password" class="form-control" placeholder="Password" name="password" required />
						</div>
						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="submit" class="btn btn-primary btn-round">
									Register
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<p class="text-center">Already have an account? <a href="login">Login!</a></p>
							</div>
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
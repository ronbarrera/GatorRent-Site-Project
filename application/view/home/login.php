<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form id="registrationForm" class="form-horizontal" action='<?php echo URL ?>user/login' method="POST">
				<fieldset>
					<br />
					<div id="legend">
						<legend class="">Login</legend>
					</div>
					<?php
						$cookieData = json_decode($_COOKIE['session'], true);
						if (isset($cookieData['loginError'])) {
					?>
						<span style="color:red"><?php echo $cookieData['loginError']; ?></span>
						<br />
					<?php } ?>
					<div class="form-group">
						<!-- E-mail -->
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="text" id="email" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<!-- Password -->
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" id="password" name="password" class="form-control">
						</div>
					</div>
					<br />
					<div class="form-group">
						<!-- Login button -->
						<div class="controls">
							<button id="submitForm" class="btn btn-primary center-block">Login</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

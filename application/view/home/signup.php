<div class="container">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" action='<?php echo URL ?>user/register' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Create Account</legend>
                    </div>
                    <div class="form-group">
                        <label for="user_type">Identify yourself as:</label>
                        <select class="form-control" id="user_type" name="user_type">
                            <option value="Renter" selected>Renter</option>
                            <option value="Lessor">Lessor</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <!-- First name -->
                        <label class="control-label">Full Name</label>
                        <div class="controls">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
                            <p class="help-block">Please enter your full name.</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Renter ID -->
                        <label class="control-label" for="renter_id">Student ID</label>
                        <div class="controls">
                            <input type="text" id="renter_id" name="renter_id" placeholder="Student ID" class="form-control">
                            <p class="help-block">Please provide your student ID (required for renters)</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                            <p class="help-block">Password should be at least 4 characters</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password -->
                        <label class="control-label"  for="password_verify">Password Verify</label>
                        <div class="controls">
                            <input type="password" id="password_verify" name="password_verify" placeholder="Verify password" class="form-control">
                            <p class="help-block">Please confirm password</p>
                        </div>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="toscomply">
                            I agree to GatorRent's <a href="<?php echo URL; ?>home/conditions_of_use" target="_blank">Conditions of Use</a> and <a href="<?php echo URL; ?>home/privacy_notice" target="_blank">Privacy Notice</a>.
                        </label>
                    </div>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-primary">Create your GatorRent account</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-sm-4">

        </div>

    </div>
</div>

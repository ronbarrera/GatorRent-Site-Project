<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" action='<?php echo URL ?>user/register' method="POST">
                <fieldset>
                    <br>
                    <div id="legend">
                        <legend class="">Create Account</legend>
                    </div>
                    <div class="form-group">
                        <!-- First name -->
                        <label class="control-label">Full Name*</label>
                        <div class="controls">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
                            <br>
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                    <!-- User type -->
                    <div class="form-group">
                        <label for="user_type">Identify yourself as*</label>
                        <select class="form-control" id="user_type" name="user_type">
                            <option value="Select" selected>--Select one--</option>
                            <option value="Renter">Renter</option>
                            <option value="Lessor">Lessor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Renter ID -->
                        <label class="control-label" for="renter_id">Student ID</label>
                        <div class="controls">
                            <input type="text" id="renter_id" name="renter_id" placeholder="Please provide your student ID (required for renters)" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail*</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="Please provide your E-mail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password*</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Password should be at least 4 characters" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Password -->
                        <label class="control-label"  for="password_verify">Password Verify*</label>
                        <div class="controls">
                            <input type="password" id="password_verify" name="password_verify" placeholder="Verify password" class="form-control">
                        </div>
                    </div>
                    <br>
                    <!-- Conditions of use and Privacy notice agreement. -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="toscomply">
                            I agree to GatorRent's <a href="<?php echo URL; ?>home/conditionsofuse" target="_blank">Conditions of Use</a> and <a href="<?php echo URL; ?>home/privacynotice" target="_blank">Privacy Notice</a>.
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <!-- Create account button -->
                        <div class="controls">
                            <button class="btn btn-primary center-block">Create your GatorRent account</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="footer">
                * Required field
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>

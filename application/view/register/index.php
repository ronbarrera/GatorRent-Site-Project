<div class="container">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" action='<?php echo URL ?>register/registerUser' method="POST">
                <fieldset>
                    <br>
                    <div id="legend">
                        <legend class="">Create Account</legend>
                    </div>
                    <div class="form-group">
                        <!-- First name -->
                        <label class="control-label">Full Name*</label>
                        <div class="controls">
                            <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" value="<?php if (isset($currentForm['firstName'])) { echo htmlspecialchars($currentForm['firstName']); } ?>">
                            <br>
                            <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" value="<?php if (isset($currentForm['firstName'])) { echo htmlspecialchars($currentForm['lastName']); } ?>">
                        </div>
                    </div>
                    <!-- User type -->
                    <div class="form-group">
                        <label for="userType">Identify yourself as*</label>
                        <select class="form-control" id="userType" name="userType">
                            <option value="" <?php if (isset($currentForm['userType']) && $currentForm['userType'] === '') { echo htmlspecialchars('selected'); } ?>>--Select one--</option>
                            <option value="Renter" <?php if (isset($currentForm['userType']) && $currentForm['userType'] === 'Renter') { echo htmlspecialchars('selected'); } ?>>Renter</option>
                            <option value="Lessor" <?php if (isset($currentForm['userType']) && $currentForm['userType'] === 'Lessor') { echo htmlspecialchars('selected'); } ?>>Lessor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- Renter ID -->
                        <label class="control-label" for="renterId">Student ID</label>
                        <div class="controls">
                            <input type="text" id="renterId" name="renterId" placeholder="Please provide your student ID (required for renters)" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail*</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="Please provide your E-mail" class="form-control" value="<?php if (isset($currentForm['email'])) { echo htmlspecialchars($currentForm['email']); } ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Password -->
                        <label class="control-label" for="password">Password*</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Password should be at least 4 characters" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Password Verify-->
                        <label class="control-label"  for="passwordVerify">Password Verify*</label>
                        <div class="controls">
                            <input type="password" id="passwordVerify" name="passwordVerify" placeholder="Verify password" class="form-control">
                        </div>
                    </div>
                    <br>
                    <!-- Conditions of use and Privacy notice agreement. -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="tosComply" name="tosComply">
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
    </div>
</div>

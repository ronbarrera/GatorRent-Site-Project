<div class="container">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" action='' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Create Account</legend>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Identify yourself as:</label>
                        <select class="form-control" id="sel1">
                            <option>Renter</option>
                            <option>Lessor</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="username">Name</label>
                        <div class="controls">
                            <input type="text" id="username" name="username" placeholder="" class="form-control">
                            <p class="help-block">Please enter your full name.</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="form-control">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="form-control">
                            <p class="help-block">Password should be at least 4 characters</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password -->
                        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control">
                            <p class="help-block">Please confirm password</p>
                        </div>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            I agree to GatorRent's Conditions of Use and Privacy Notice.
                        </label>
                    </div>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success">Create your GatorRent account</button>
                        </div>
                    </div>
                </fieldset>
            </form> 

        </div>
        <div class="col-sm-4">

        </div>

    </div>
</div>

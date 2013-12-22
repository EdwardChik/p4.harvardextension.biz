<!-- allows a new user to sign up for Woof Woof Woof -->
<form method='POST' action='/users/p_signup'>

    <div class="input-group">

        <div class="row extra-space-bottom">

            <!-- text field for first name -->
            <div class="col-sm-6 form-group first-name-group">
                <label for="first_name" class="control-label">First Name: </label>
                <input type="text" id="first_name" class="form-control" name="first_name">
                <span class="help-block"></span>
            </div>

            <!-- text field for last name -->
            <div class="col-sm-6 form-group last-name-group">
                <label for="last_name" class="control-label">Last Name: </label>
                <input type="text" id="last_name" class="form-control" name="last_name">
                <span class="help-block"></span>
            </div>

        </div>


        <div class="row extra-space-bottom">

            <!-- text field for e-mail address -->
            <div class="col-sm-6 form-group email-group">
                <label for="email" class="control-label">E-mail Address: </label>
                <input type="text" id="email" class="form-control" name="email">
                <span class="help-block"></span>
            </div>

            <!-- text field for location -->
            <div class="col-sm-6 form-group location-group">
                <label for="location" class="control-label">Location: </label>
                <input type="text" id="location" class="form-control" name="location">
                <span class="help-block"></span>
            </div>

        </div>


        <div class="row extra-space-bottom">

            <!-- text field for biography -->
            <div class="col-sm-6 form-group biography-group">
                <label for="biography" class="control-label">Biography: </label>
                <input type="text" id="biography" class="form-control" name="biography">
                <span class="help-block"></span>
            </div>

            <!-- password field for password -->
            <div class="col-sm-6 form-group password-group">
                <label for="password" class="control-label">Password: </label>
                <input type="password" id="password" class="form-control" name="password">
                <span class="help-block"></span>
            </div>

        </div>

    </div>

    <!-- displays message upon error -->
    <?php if(isset($error)): ?>
        <div class='error'>
            Registration failed. Please double check that the data you are entering meets the following criteria:

            <ul>
                <li>All fields must be filled out.</li>
                <li>E-mail address must be unique (not already in the system).</li>
            </ul>

        </div>
        <br>
    <?php endif; ?>

    <button type="submit" class="btn btn-default navbar-btn">Sign up!</button>
    <br><br>

</form>
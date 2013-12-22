<!-- standardized login page -->
<form method='POST' action='/users/p_login'>

    <div class="row extra-space-bottom">

        <!-- text field for login e-mail -->
        <div class="col-sm-6 form-group login-email-group">
            <label for="login_email" class="control-label">E-mail Address: </label>
            <input type="text" id="login_email" class="form-control" name="login_email">
            <span class="help-block"></span>
        </div>

        <!-- text field for login password -->
        <div class="col-sm-6 form-group login-password-group">
            <label for="login_password" class="control-label">Password: </label>
            <input type="password" id="login_password" class="form-control" name="login_password">
            <span class="help-block"></span>
        </div>

    </div>

    <div class="row extra-space-bottom">

        <div class="col-sm-2 form-group">
            <button type="submit" class="btn btn-default navbar-btn">Log in!</button>
        </div>

    </div>

    <!-- displays a message if there is an error in the login process -->
    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

</form>
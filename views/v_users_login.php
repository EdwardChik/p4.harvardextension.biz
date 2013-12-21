<!-- standardized login page -->
<form method='POST' action='/users/p_login'>

    <!-- text field for login e-mail -->
    <div class="col-sm-4 form-group login-email-group">
        <label for="login_email" class="control-label">E-mail Address: </label>
        <input type="text" id="login_email" class="form-control">
        <span class="help-block"></span>
    </div>

    <!-- text field for login password -->
    <div class="col-sm-4 form-group login-password-group">
        <label for="login_password" class="control-label">Password: </label>
        <input type="password" id="login_password" class="form-control">
        <span class="help-block"></span>
    </div>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password. <!-- To reset your password, please click <a href='/users/reset'>here</a>.-->
        </div>
        <br>
    <?php endif; ?>

    <button type="submit" class="btn btn-default navbar-btn">Log in!</button>

    <!-- 95% built, come back to this when e-mail is working
    <br><br>
    Forgot your password? <a href='/users/reset'>Click here</a> to reset it. -->

</form>
<!-- standardized login page -->
<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>    
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

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
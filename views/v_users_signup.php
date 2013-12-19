<!-- allows a new user to sign up for Woof Woof Woof -->
<form method='POST' action='/users/p_signup'>

    <div class="input-group">

        First Name: <br>
        <input type='text' class='form-control' name='first_name'> 
        <br><br>

        Last Name: <br>
        <input type='text' class='form-control' name='last_name'>
        <br><br>

        E-mail Address: <br>
        <input type='text' class='form-control' name='email'>
        <br><br>

        Location: <br>
        <input type='text' class='form-control' name='location'>
        <br><br>

        Biography: <br>
        <input type='text' class='form-control' name='biography'>
        <br><br>

        Password: <br>
        <input type='password' class='form-control' name='password'>
        <br><br>

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
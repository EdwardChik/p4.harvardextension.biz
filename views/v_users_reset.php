<!-- form to prompt for e-mail address, for password reset and message to user -->
<form method='POST' action='/users/p_reset'>


    <div class="row extra-space-bottom">

	    <!-- password field for current password -->
	    <div class="col-sm-6 form-group email-group">
	        <label for="email" class="control-label">E-mail address: </label>
	        <input type="text" id="email" class="form-control" name="email">
	        <span class="help-block"></span>
	    </div>

	</div>

    <div class="row extra-space-bottom">

	    <!-- password field for current password -->
	    <div class="col-sm-6 form-group password-group">
	        <label for="password" class="control-label">Current Password: </label>
	        <input type="password" id="password" class="form-control" name="password">
	        <span class="help-block"></span>
	    </div>

	    <!-- password field for current password (again) -->
	    <div class="col-sm-6 form-group password-confirm-group">
	        <label for="password_confirm" class="control-label">Current Password (again): </label>
	        <input type="password" id="password_confirm" class="form-control" name="password_confirm">
	        <span class="help-block"></span>
	    </div>

	</div>

    <div class="row extra-space-bottom">

	    <!-- password field for current password -->
	    <div class="col-sm-6 form-group new-password-group">
	        <label for="new_password" class="control-label">New Password: </label>
	        <input type="password" id="new_password" class="form-control" name="new_password">
	        <span class="help-block"></span>
	    </div>

	    <!-- password field for current password (again) -->
	    <div class="col-sm-6 form-group new-password-confirm-group">
	        <label for="new_password_confirm" class="control-label">New Password (again): </label>
	        <input type="password" id="new_password_confirm" class="form-control" name="new_password_confirm">
	        <span class="help-block"></span>
	    </div>

	</div>

    <div class="row extra-space-bottom">
        <div class="col-sm-2 form-group">
		    <button type="submit" class="btn btn-default navbar-btn">Change Password</button>
        </div>
    </div>

    <!-- displays a message if there is an error in the posting process -->
    <?php if(isset($error)): ?>
        <div class='error'>
            Password update failed. Please double check that your current password is correct, and that you have entered a new password.
        </div>
        <br>
    <?php endif; ?>



</form>
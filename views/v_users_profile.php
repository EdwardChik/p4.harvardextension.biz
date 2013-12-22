<!-- profile page for logged in user -->
<h1>This is the profile of <?=$user->first_name?> <?=$user->last_name?>.</h1>

<!-- profile page data points are all pre-populated in fields, for immediate access to editing -->
<form method='POST' action='/users/profile_edit'>

    <div class="row extra-space-bottom">

        <!-- text field for first name -->
        <div class="col-sm-6 form-group first-name-group">
            <label for="first_name" class="control-label">First Name: </label>
            <input type="text" id="first_name" class="form-control" name="first_name" value='<?=$user->first_name?>'>
            <span class="help-block"></span>
        </div>

        <!-- text field for last name -->
        <div class="col-sm-6 form-group last-name-group">
            <label for="last_name" class="control-label">Last Name: </label>
            <input type="text" id="last_name" class="form-control" name="last_name" value='<?=$user->last_name?>'>
            <span class="help-block"></span>
        </div>

    </div>


    <div class="row extra-space-bottom">

        <!-- text field for location -->
        <div class="col-sm-6 form-group location-group">
            <label for="location" class="control-label">Location: </label>
            <input type="text" id="location" class="form-control" name="location" value='<?=$user->location?>'>
            <span class="help-block"></span>
        </div>

        <!-- text field for biography -->
        <div class="col-sm-6 form-group biography-group">
            <label for="biography" class="control-label">Biography: </label>
            <input type="text" id="biography" class="form-control" name="biography" value='<?=$user->biography?>'>
            <span class="help-block"></span>
        </div>

    </div>

    <div class="row extra-space-bottom">
        <div class="col-sm-2 form-group">
            <button type="submit" class="btn btn-default navbar-btn">Edit Profile</button>
        </div>
    </div>

    <!-- displays a message if there is an error in the profile editing process -->
    <?php if(isset($error)): ?>
        <div class='error'>
            Profile edit failed. Please double check that all fields are filled out.
        </div>
        <br>
    <?php endif; ?>


</form>

<!-- statistics for logged in user -->
<p>You have posted a total of <?=$user->post_total?> woofs.</p>

<p>Your last login was on <?=Time::display($user->last_login,'Y-m-d G:i')?>, and your profile was last modified on <?=Time::display($user->modified,'Y-m-d G:i')?>.</p>
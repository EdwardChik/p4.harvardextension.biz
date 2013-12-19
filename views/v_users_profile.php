<!-- profile page for logged in user -->
<h1>This is the profile of <?=$user->first_name?> <?=$user->last_name?>.</h1>

<!-- profile page data points are all pre-populated in fields, for immediate access to editing -->
<form method='POST' action='/users/profile_edit'>

    <div class="input-group">

	<p>First name: <input type='text' class='form-control' name='first_name' value='<?=$user->first_name?>'></p>

	<p>Last name: <input type='text' class='form-control' name='last_name' value='<?=$user->last_name?>'></p>

	<p>Location: <input type='text' class='form-control' name='location' value='<?=$user->location?>'></p>

	<p>Biography: <input type='text' class='form-control' name='biography' value='<?=$user->biography?>'></p>

	<input type='hidden' name='user_id' value='<?=$user->user_id?>'>	

	<button type="submit" class="btn btn-default navbar-btn">Edit Profile</button>

</form>

<!-- statistics for logged in user -->
<p>You have posted a total of <?=$user->post_total?> woofs.</p>

<p>Your last login was on <?=Time::display($user->last_login,'Y-m-d G:i')?>, and your profile was last modified on <?=Time::display($user->modified,'Y-m-d G:i')?>.</p>
<!-- add new post to the service -->
<form method='POST' action='/posts/p_add'>

    <div class="row extra-space-bottom">

	    <!-- textarea field for new post -->
	    <div class="col-sm-6 form-group new-post-group">
	        <label for="new_post" class="control-label">New Post: </label>
	        <input type="textarea" id="new_post" class="form-control" name="new_post">
	        <span class="help-block"></span>
	    </div>

	</div>

    <div class="row extra-space-bottom">
        <div class="col-sm-2 form-group">
            <button type="submit" class="btn btn-default navbar-btn">Woof!</button>
        </div>
    </div>

    <!-- displays a message if there is an error in the posting process -->
    <?php if(isset($error)): ?>
        <div class='error'>
            Woof failed. Please double check that there is content to post.
        </div>
        <br>
    <?php endif; ?>

</form>
<!-- add new post to the service -->
<form method='POST' action='/posts/p_add'>

    <!-- textarea field for new post -->
    <div class="col-sm-4 form-group new-post-group">
        <label for="new_post" class="control-label">New Post: </label>
        <input type="textarea" id="new_post" class="form-control">
        <span class="help-block"></span>
    </div>

    <br><br>
    <input type='submit' value='New post'>

</form>
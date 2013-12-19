<!-- loops through users database to display each one, and allow following or unfollowing as desired -->
<?php foreach($users as $user): ?>

    <div class="panel panel-default">
        <div class="panel-body">

            <!-- Print this user's name -->
            <?=$user['first_name']?> <?=$user['last_name']?> 

            <!-- displays user stats -->
            (total of <?=$user['post_total']?> woofs)

            <!-- If there exists a connection with this user, show a unfollow link -->
            <?php if(isset($connections[$user['user_id']])): ?>
                <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

            <!-- Otherwise, show the follow link -->
            <?php else: ?>
                <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
            <?php endif; ?>

        </div>
    </div>

<?php endforeach; ?>
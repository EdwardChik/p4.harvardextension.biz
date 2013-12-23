<?=ini_set('error_reporting', E_ALL);
ini_set('display_errors',true);?>

<!-- HTML5 table structure to populate with leaderboard data -->
<table id="leaderboard">
    <thead>
        <tr>
            <th>User</th>
            <th>Location</th>
            <th>Posts</th>
            <th>Games Played</th>
            <th>Average HP Left</th>
            <th>Following?</th>
        </tr>
    </thead>
    <tbody>

		<!-- loops through users database to display each one, and generating an HTML5 table to apply the DataTables plugin onto -->
		<?php foreach($users as $user): ?>

			<?=file_put_contents('debug.txt', print_r($user))?>

			<?=$average_hp = $user['hp_remaining'] / $user['games_played']?>

	        <tr>
	            <!-- user name -->
	            <td><?=$user['first_name']?> <?=$user['last_name']?></td>
	            <!-- user location -->
	            <td><?=$user['location']?></td>
	            <!-- user posts -->
	            <td><?=$user['post_total']?></td>
	            <!-- user location -->
	            <td><?=$user['games_played']?></td>
	            <!-- user average HP left after game -->
	            <td><?=round($average_hp, 2)?></td>
	            <!-- user follow status -->
	            <td>
		            <!-- If there exists a connection with this user, show a unfollow link -->
		            <?php if(isset($connections[$user['user_id']])): ?>
		                <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

		            <!-- Otherwise, show the follow link -->
		            <?php else: ?>
		                <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
		            <?php endif; ?>
	            </td>
	        </tr>

		<?php endforeach; ?>

	</tbody>
</table>
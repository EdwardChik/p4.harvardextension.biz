<!-- HTML5 table structure to populate with leaderboard data -->
<table id="leaderboard" class="display">
    <thead>
        <tr>
            <th>User</th>
            <th>Location</th>
            <th>Posts</th>
            <th>Games Played</th>
        </tr>
    </thead>
    <tbody>

		<!-- loops through users database to display each one, and generating an HTML5 table to apply the DataTables plugin onto -->
		<?php foreach($users as $user): ?>

	        <tr>
	            <!-- user name -->
	            <td><?=$user['first_name']?> <?=$user['last_name']?></td>
	            <!-- user location -->
	            <td><?=$user['location']?></td>
	            <!-- user posts -->
	            <td><?=$user['post_total']?></td>
	            <!-- user location -->
	            <td><?=$user['games_played']?></td>
	        </tr>

		<?php endforeach; ?>

	</tbody>
</table>
<!-- form to write a new post -->
<form method='POST' action='/posts/p_add'>

	<label for='content'>Write a New Woof:</label><br>
	
	<textarea name='content' id='content'></textarea>

	<button type="submit" class="btn btn-default navbar-btn">New woof!</button>

	<br><br>

</form>

<!-- loop that scans through posts table to display relevant entries (those being followed by the logged in user) -->
<?php foreach($posts as $post): ?>

	<article>

		<!-- display each post in a panel, with poster name in title -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?=$post['first_name']?> <?=$post['last_name']?></h3>
			</div>
			<div class="panel-body">
				<?=$post['content']?>
			</div>
			<div class="panel-footer">
				<!-- timestamp of post -->
				<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
					Woofed on <?=Time::display($post['created'])?>
				</time>

		        <!-- delete option enabled for users who are logged in, for posts they wrote -->
		        <?php if($user->user_id == $post['post_user_id']): ?>
					<!-- creates link to delete post -->
					 / <a href='/posts/delete/<?=$post['post_id']?>'>Delete Woof</a>
		        <!-- delete option disabled for users who are not the author of the post -->
		        <?php else: ?>
					 / Delete Woof
		        <?php endif; ?>

			</div>
		</div>

	</article>

<?php endforeach; ?>
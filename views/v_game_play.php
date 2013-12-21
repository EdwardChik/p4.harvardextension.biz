<p>Welcome<?php if($user) echo ', '.$user->first_name.' '.$user->last_name; ?>! Here is an overview of what Woof Woof Woof has to offer:</p>

<!-- gaming code -->
<div class="col-sm-8 col-md-8">

	<!-- top jumbotron explaining the concept -->
	<div class="jumbotron">

		<div class="row extra-space-bottom">

			<!-- main content of jumbotron -->
			<div class="col-sm-7 col-md-7">

				<h2>What's That Nintendo Song?</h2>
			
				<p>Let's match up classic Nintendo songs with their characters!</p>

				<ol>
					<li>Press Play to listen to the song.</li>
					<li>Click the button for the character you think the song belongs to.</li>
					<li>If you want to try again, press the Reboot Game button.</li>
				</ol>

			</div>


			<div class="col-sm-3 col-md-3">
				<!-- Nintendo logo -->
				<img src="images\Nintendo Logo.png" alt="Nintendo logo"><br /><br />

				<div id="scoreboard">Hearts Left: 5</div>

				<button type="button" class="btn btn-primary" id="reboot-game">Reboot Game</button>

			</div>
		</div>

		<div class="row extra-space-bottom">

			<!-- audio player to start playback of the song -->
			<div id="random_song"></div>

		</div>
	</div>


	<!-- Twitter Bootstrap display grids start here --> 
	<div class="row extra-space-bottom">

		<!-- image of Mario -->
		<div class="col-sm-4 col-md-2">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="images/Super_Mario.jpg" alt="It\'s-a me, Mario!">
				<div class="caption">
					<h3>Mario</h3>
					<p>Brother of Luigi, plumber and defender of the Mushroom Kingdom!</p>

					<button type="button" class="btn btn-primary" id="select-mario">This song is Mario!</button>
				</div>
			</div>
		</div>

		<!-- image of Link -->
		<div class="col-sm-4 col-md-2">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="images/The_Legend_of_Zelda.jpg" alt="HEY! HEY! HEY LINK!">
				<div class="caption">
					<h3>Link</h3>
					<p>The hero of Hyrule, foe of Ganon and the waker of winds!</p>

					<button type="button" class="btn btn-primary" id="select-link">This song is Link!</button>
				</div>
			</div>
		</div>

		<!-- image of Samus -->
		<div class="col-sm-4 col-md-2">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="images/Super_Metroid.jpg" alt="Samus Aran, feared bounty hunter.">
				<div class="caption">
					<h3>Samus Aran</h3>
					<p>Feared bounty hunter, mortal enemy of brains on mechanical legs.</p>

					<button type="button" class="btn btn-primary" id="select-samus">This song is Samus!</button>
				</div>
			</div>
		</div>

		<!-- image of Donkey Kong -->
		<div class="col-sm-4 col-md-2">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="images/Donkey_Kong_Country.jpg" alt="See? Everyone looks better in a tie, even (or especially) apes.">
				<div class="caption">
					<h3>Donkey Kong</h3>
					<p>Not to be confused with Diddy, Dixie, Baby, Cranky, or...</p>

					<button type="button" class="btn btn-primary" id="select-dk">This song is DK!</button>
				</div>
			</div>
		</div>

		<!-- image of Fox McCloud -->
		<div class="col-sm-4 col-md-2">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="images/Star_Fox.jpg" alt="GOOD LUCK, FOX.">
				<div class="caption">
					<h3>Fox McCloud</h3>
					<p>How would Falco, Peppy and Slippy get by without their leader?</p>

					<button type="button" class="btn btn-primary" id="select-fox">This song is Fox!</button>
				</div>
			</div>
		</div>

	</div>

</div>
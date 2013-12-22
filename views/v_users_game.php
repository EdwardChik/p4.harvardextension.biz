<p>Welcome<?php if($user) echo ', '.$user->first_name.' '.$user->last_name; ?>! Here is a fun Classic Games experience that I hope you enjoy.</p>

<!-- gaming code -->
<div class="col-sm-12 col-md-12">

	<!-- top jumbotron explaining the concept -->
	<div class="jumbotron">

		<div class="row extra-space-bottom">

			<!-- main content of jumbotron -->
			<div class="col-sm-7 col-md-7">

				<h2>What's That Classic Song?</h2>
			
				<p>Let's match up Nintendo songs with characters!</p>

				<ol>
					<li>Press Play to listen to the song.</li>
					<li>Click a character's button to guess.</li>
					<li>To try again, press Reboot Game.</li>
				</ol>

			</div>


			<div class="col-sm-5 col-md-5">
				<!-- Nintendo logo -->
				<img src="/images/characters/Nintendo_Logo.png" alt="Nintendo logo"><br /><br />

				<p>Health</p>

				<div class="progress" id="scoreboard">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" id="health_bar">
						<span class="sr-only">100% Health</span>
					</div>
				</div>

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
		<div class="col-sm-4 col-md-2" id="character-select-mario">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="/images/characters/Super_Mario.jpg" alt="It\'s-a me, Mario!">
				<div class="caption">
					<h3>Mario</h3>
					<p>Brother of Luigi, defender of the Mushroom Kingdom!</p>

					<button type="button" class="btn btn-primary" id="select-mario">It's Mario!</button>
				</div>
			</div>
		</div>

		<!-- image of Link -->
		<div class="col-sm-4 col-md-2" id="character-select-link">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="/images/characters/The_Legend_of_Zelda.jpg" alt="HEY! HEY! HEY LINK!">
				<div class="caption">
					<h3>Link</h3>
					<p>The hero of Hyrule, foe of Ganon and the waker of winds!</p>

					<button type="button" class="btn btn-primary" id="select-link">It's Link!</button>
				</div>
			</div>
		</div>

		<!-- image of Samus -->
		<div class="col-sm-4 col-md-2" id="character-select-samus">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="/images/characters/Super_Metroid.jpg" alt="Samus Aran, feared bounty hunter.">
				<div class="caption">
					<h3>Samus</h3>
					<p>Feared bounty hunter, mortal enemy of mutant brains.</p>

					<button type="button" class="btn btn-primary" id="select-samus">It's Samus!</button>
				</div>
			</div>
		</div>

		<!-- image of Donkey Kong -->
		<div class="col-sm-4 col-md-2" id="character-select-dk">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="/images/characters/Donkey_Kong_Country.jpg" alt="See? Everyone looks better in a tie, even (or especially) apes.">
				<div class="caption">
					<h3>DK</h3>
					<p>Not to be confused with Diddy, Dixie, Cranky, or...</p>

					<button type="button" class="btn btn-primary" id="select-dk">It's DK!</button>
				</div>
			</div>
		</div>

		<!-- image of Fox McCloud -->
		<div class="col-sm-4 col-md-2" id="character-select-fox">
			<div class="thumbnail">
				<img data-src="holder.js/300x300" src="/images/characters/Star_Fox.jpg" alt="GOOD LUCK, FOX.">
				<div class="caption">
					<h3>Fox</h3>
					<p>How would Falco, Peppy and Slippy get by without him?</p>

					<button type="button" class="btn btn-primary" id="select-fox">It's Fox!</button>
				</div>
			</div>
		</div>

	</div>

</div>
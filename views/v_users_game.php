<!-- gaming code -->
<div class="col-sm-12 col-md-12">

	<!-- top jumbotron explaining the concept -->
	<div class="jumbotron">

		<div class="row extra-space-bottom">

			<!-- main content of jumbotron -->
			<div class="col-sm-7 col-md-7">

				<h2>What's That Classic Song?</h2>
			
				<p>Welcome<?php if($user) echo ', '.$user->first_name ?>! Here is a fun Classic Games experience that I hope you enjoy.</p>

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

		<!-- selection box for Mario -->
		<ul class="media-list" id="character-select-mario">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Super_Mario.jpg" alt="It\'s-a me, Mario!">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Mario</h3>
						Brother of Luigi, prolific plumber, defender of the Mushroom Kingdom and all around swell guy!
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-mario">It's Mario!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Link -->
		<ul class="media-list" id="character-select-link">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/The_Legend_of_Zelda.jpg" alt="HEY! HEY! HEY LINK!">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Link</h3>
						The hero of Hyrule, foe of Ganon and the waker of winds! Also turns 3D and varies in age on occasion.
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-link">It's Link!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Samus -->
		<ul class="media-list" id="character-select-samus">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Super_Metroid.jpg" alt="Samus Aran, feared bounty hunter.">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Samus</h3>
						Feared bounty hunter across the galaxy, mortal enemy of mutant brains and master of the hyper beam.
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-samus">It's Samus!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Donkey Kong -->
		<ul class="media-list" id="character-select-dk">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Donkey_Kong_Country.jpg" alt="See? Everyone looks better in a tie, even (or especially) apes.">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Donkey Kong</h3>
						King K-Rool is no match for this tie wearing hero! Not to be confused with Diddy, Dixie, Baby, Cranky, or...
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-dk">It's DK!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Fox McCloud -->
		<ul class="media-list" id="character-select-fox">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Star_Fox.jpg" alt="GOOD LUCK, FOX.">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Fox</h3>
						How would Falco, Peppy and Slippy get by without him? Truly, he's the hero of Corneria!
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-fox">It's Fox!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Captain Falcon -->
		<ul class="media-list" id="character-select-falcon">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Captain_Falcon.jpg" alt="WHOOSH!">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Captain Falcon</h3>
						No one's faster than the Captain! Behold the wonders of amazing Super FX technology.
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-falcon">It's Falcon!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Kirby -->
		<ul class="media-list" id="character-select-kirby">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Kirby.jpg" alt="(spits out stars)">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Kirby</h3>
						If you should eat it, he'll eat it. If you shouldn't eat it...he'll still eat it.
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-kirby">It's Kirby!</button>
					</div>
				</div>

			</li>
		</ul>

		<!-- selection box for Ness -->
		<ul class="media-list" id="character-select-ness">
			<li class="media">
				<a class="pull-left" href="#">
					<img data-src="holder.js/64x64" src="/images/characters/Ness.jpg" alt="(swings small wooden hammer)">
				</a>
				<div class="media-body">

					<div class="col-sm-10 col-md-10">
						<h3 class="media-heading">Ness</h3>
						He'll always be EarthBound, but he'll never forget his Mother. (cue laugh track)
					</div>

					<div class="col-sm-2 col-md-2">
						<button type="button" class="btn btn-primary" id="select-ness">It's Ness!</button>
					</div>
				</div>

			</li>
		</ul>


	</div>

</div>
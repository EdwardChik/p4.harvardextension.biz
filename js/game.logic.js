// this file contains the logic to play a song and generate character images

$(document).ready(function() {

	// initializes scoreboard
	var scoreboard = 100;

	// create an array of base series string values
	var series = [];

	// tracks button clicked status
	var clicked = [];

	// initializes page (i.e. characters, score)
	initializeGame();

	// randomly picks from options
	var random;

	randomPick();

	// assigns value of selected array element to variable
	var selected = series[random];

	// initializes audio (picks audio track based on selected character / score)
	initializeAudio();


	// when character guesses are made by user

		// when Mario is selected
		$('#select-mario').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Mario') {
  				message = "1UP!";
  				button_colour = "success";
				clicked['mario'] = "right";
				disableButtons();
  			} else {
  				message = "Not Mario.";
  				button_colour = "danger";
				clicked['mario'] = "wrong";
				decreaseScore();
  			}

			$('#select-mario').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-mario" disabled="disabled">' + message + '</button>');

			if (clicked['mario'] == "wrong") {
				$("#character-select-mario").delay(1000).slideUp("slow");
			}

		});

		// when Link is selected
		$('#select-link').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Link') {
  				message = "Heart +1!";
  				button_colour = "success";
  				clicked['link'] = "right";
				disableButtons();
  			} else {
  				message = "Not Link.";
  				button_colour = "danger";
  				clicked['link'] = "wrong";
  				decreaseScore();
  			}

			$('#select-link').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-link" disabled="disabled">' + message + '</button>');

			if (clicked['link'] == "wrong") {
				$("#character-select-link").delay(1000).slideUp("slow");
			}

		});

		// when Samus is selected
		$('#select-samus').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Samus') {
  				message = "Hyper beam!";
  				button_colour = "success";
  				clicked['samus'] = "right";
				disableButtons();
  			} else {
  				message = "Not Samus.";
  				button_colour = "danger";
  				clicked['samus'] = "wrong";
  				decreaseScore();
  			}

			$('#select-samus').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-samus" disabled="disabled">' + message + '</button>');

			if (clicked['samus'] == "wrong") {
				$("#character-select-samus").delay(1000).slideUp("slow");
			}

		});

		// when Donkey Kong is selected
		$('#select-dk').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'DK') {
  				message = "Bananas!";
  				button_colour = "success";
  				clicked['dk'] = "right";
				disableButtons();
  			} else {
  				message = "Not DK.";
  				button_colour = "danger";
  				clicked['dk'] = "wrong";
  				decreaseScore();
  			}

			$('#select-dk').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-dk" disabled="disabled">' + message + '</button>');

			if (clicked['dk'] == "wrong") {
				$("#character-select-dk").delay(1000).slideUp("slow");
			}

		});

		// when Fox McCloud is selected
		$('#select-fox').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Fox') {
  				message = "Barrel roll!";
  				button_colour = "success";
  				clicked['fox'] = "right";
				disableButtons();
  			} else {
  				message = "Not Fox.";
  				button_colour = "danger";
  				clicked['fox'] = "wrong";
  				decreaseScore();
  			}

			$('#select-fox').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-fox" disabled="disabled">' + message + '</button>');

			if (clicked['fox'] == "wrong") {
				$("#character-select-fox").delay(1000).slideUp("slow");
			}

		});

		// when Captain Falcon is selected
		$('#select-falcon').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Falcon') {
  				message = "ZOOM!";
  				button_colour = "success";
  				clicked['falcon'] = "right";
				disableButtons();
  			} else {
  				message = "Not Falcon.";
  				button_colour = "danger";
  				clicked['falcon'] = "wrong";
  				decreaseScore();
  			}

			$('#select-falcon').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-falcon" disabled="disabled">' + message + '</button>');

			if (clicked['falcon'] == "wrong") {
				$("#character-select-falcon").delay(1000).slideUp("slow");
			}

		});

		// when Kirby is selected
		$('#select-kirby').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Kirby') {
  				message = "YAY!";
  				button_colour = "success";
  				clicked['kirby'] = "right";
				disableButtons();
  			} else {
  				message = "Not Kirby.";
  				button_colour = "danger";
  				clicked['kirby'] = "wrong";
  				decreaseScore();
  			}

			$('#select-kirby').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-kirby" disabled="disabled">' + message + '</button>');

			if (clicked['kirby'] == "wrong") {
				$("#character-select-kirby").delay(1000).slideUp("slow");
			}

		});

		// when Ness is selected
		$('#select-ness').click(function() {

			// sets flags based on match with randomly selected character
			if (selected == 'Ness') {
  				message = "We can do this!";
  				button_colour = "success";
  				clicked['ness'] = "right";
				disableButtons();
  			} else {
  				message = "Not Ness.";
  				button_colour = "danger";
  				clicked['ness'] = "wrong";
  				decreaseScore();
  			}

			$('#select-ness').replaceWith('<button type="button" class="btn btn-' + button_colour + '" id="select-ness" disabled="disabled">' + message + '</button>');

			if (clicked['ness'] == "wrong") {
				$("#character-select-ness").delay(1000).slideUp("slow");
			}

		});

	// end character click



	// refreshes game when reboot button is selected
	$('#reboot-game').click(function() {

		location.reload();

	});


	// randomly pick
	function randomPick() {

		// randomly select song + image (integer)
		random = Math.floor(Math.random()*8);

	}

	// initialize game
	function initializeGame() {

		// resets scoreboard
		scoreboard = 100;

		// creates game series array and assigns base values
		series[0] = "Mario";
		series[1] = "Link";
		series[2] = "Samus";
		series[3] = "DK";
		series[4] = "Fox";
		series[5] = "Falcon";
		series[6] = "Kirby";
		series[7] = "Ness";

		// creates clicked status array and assigns base values
		clicked['mario'] = "ready";
		clicked['link'] = "ready";
		clicked['samus'] = "ready";
		clicked['dk'] = "ready";
		clicked['fox'] = "ready";
		clicked['falcon'] = "ready";
		clicked['kirby'] = "ready";
		clicked['ness'] = "ready";

	} // end initialize game function


	// creates audio player elements, based on randomly selected character and corresponding song 
	function initializeAudio() {

		// generate audio player with randomly selected audio clip
		$('#random_song').html('<audio controls><source src="/audio/' + series[random] + '.mp3" type="audio/mpeg">Unfortunately, it appears that your browser does not support the audio playback element.</audio>');

	} // end audio initialization function


	// updates score in database for leaderboard retrieval
	function updateScore() {

		document.location.href = '/users/addScore';
		
	}	// end update score function


	// function to update all buttons upon click
	function disableButtons() {

		// sets variable with message for disabled / not selected buttons
		var message = "Game over.";

		// update all buttons that have not been clicked yet
		for(var index in clicked) {

			if (clicked[index] == "ready") {
				$('#select-' + index).replaceWith('<button type="button" class="btn btn-primary" id="select-' + index + '" disabled="disabled">' + message + '</button>');
			}
		}

		updateScore();

	} // end disable buttons function


	// decreases current score by 1
	function decreaseScore() {

		scoreboard = scoreboard - 10;

		var bar_type = "info";

		if (scoreboard == 90 || scoreboard == 80) {
			bar_type = "success";
		} else if (scoreboard == 70 || scoreboard == 60 || scoreboard == 50) {
			bar_type = "warning";
		} else {
			bar_type = "danger";
		}

		// updates scoreboard element
		$('#health_bar').replaceWith('<div class="progress-bar progress-bar-' + bar_type + '" role="progressbar" aria-valuenow="' + scoreboard + '"aria-valuemin="0" aria-valuemax="100" style="width: ' + scoreboard + '%" id="health_bar"><span class="sr-only">' + scoreboard + '% Health</span></div>');

	} // end decrease score function

}); //end ready
// this file contains the logic to play a song and generate character images

$(document).ready(function() {

	// initializes scoreboard
	var scoreboard;

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

			alert(clicked['mario']);

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

			alert(clicked['link']);

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

			alert(clicked['samus']);

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

			alert(clicked['dk']);

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

			alert(clicked['fox']);

			if (clicked['fox'] == "wrong") {
				$("#character-select-fox").delay(1000).slideUp("slow");
			}

		});

	// end character click



	// when reboot button is selected
	$('#reboot-game').click(function() {

		location.reload();

	});


	// randomly pick
	function randomPick() {

		// randomly select song + image (integer)
		random = Math.floor(Math.random()*5);

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

		// creates clicked status array and assigns base values
		clicked['mario'] = "ready";
		clicked['link'] = "ready";
		clicked['samus'] = "ready";
		clicked['dk'] = "ready";
		clicked['fox'] = "ready";

	} // end initialize game function


	// creates audio player elements, based on randomly selected character and corresponding song 
	function initializeAudio() {

		// generate audio player with randomly selected audio clip
		$('#random_song').html('<audio controls><source src="/audio/' + series[random] + '.mp3" type="audio/mpeg">Unfortunately, it appears that your browser does not support the audio playback element.</audio>');

	} // end audio initialization function


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

	} // end disable buttons function


	// decreases current score by 1
	function decreaseScore() {

		scoreboard = scoreboard - 20;

		// updates scoreboard element
		$('#scoreboard').replaceWith('<div id="scoreboard">Hearts: ' + scoreboard + '</div>');

	} // end decrease score function

}); //end ready
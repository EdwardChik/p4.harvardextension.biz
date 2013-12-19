$(document).ready(function(){

	// enables tabs
	$("#tabs").tabs();

	// enables progress bar
	$("#progress_bar").progressbar({
		value: 40
	});

	// enables draggable element
	$("#draggable").draggable({
		revert: "valid",
		containment: "parent"
	});

	// enables droppable element
	$("#droppable").draggable({
		revert: "invalid"
	});

	// creates droppable area
	$("#droppable_area").droppable({
		activeClass: "ui-state-hover",
		hoverClass: "ui-state-active",
		drop: function(event, ui) {
			$(this)
				.addClass("ui-state-highlight")
				.find("p")
					.html("Dropped!");
		}
	});

	// bounces toggle area when associated button is clicked
	$("#toggle-bounce").click(function() {
		$('#toggle_area').toggle('bounce');	
	});

	// explodes toggle area when associated button is clicked
	$("#toggle-explode").click(function() {
		$('#toggle_area').toggle('explode');	
	});

	// folds toggle area when associated button is clicked
	$("#toggle-fold").click(function() {
		$('#toggle_area').toggle('fold');	
	});

}); //end ready
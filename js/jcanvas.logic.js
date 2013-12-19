$(document).ready(function(){

	// clears contents of jCanvas
	$('#canvas-clear-btn').click(function() {

		$("#canvas-create").clearCanvas();

	}); //end clear canvas button click


	// displays image in canvas
	$('#image').change(function(){
		if ($('#image').val() == 'jack_sparrow') {
			$('#canvas-create').drawImage({
				source: '../images/characters_jack_sparrow.jpg',
				x: 200,
				y: 300
			});
		} else if ($('#image').val() == 'violet') {
			$('#canvas-create').drawImage({
				source: '../images/characters_violet.jpg',
				x: 200,
				y: 300
			});
		} else if ($('#image').val() == 'mike') {
			$('#canvas-create').drawImage({
				source: '../images/characters_mike.jpg',
				x: 200,
				y: 300
			});
		} else {
			$('#canvas-create').drawImage({
				source: '../images/characters_lone_ranger.jpg',
				x: 200,
				y: 300
				});
		}
	});	// end displays image in canvas


	// creates/renders contents of jCanvas
	$('#canvas-create-btn').click(function(){

		var imgsrc = $('#image').val();

		switch(imgsrc){
			case 'jack_sparrow':
				imgsrc = "../images/characters_jack_sparrow.jpg";
				break;
			case 'violet':
				imgsrc = "../images/characters_violet.jpg";
				break;
			case 'mike':
				imgsrc = "../images/characters_mike.jpg";
				break;
			default:
				imgsrc = "../images/characters_lone_ranger.jpg"; 
		} // end switch

		// create thought bubble
		function thoughtBubble() {

			$("#canvas-create").drawArc({
				strokeStyle: "grey",
				strokeWidth: 4,
				x: 100, y: 80,
				radius: 10
			})
			.drawArc({
				strokeStyle: "grey",
				strokeWidth: 4,
				x: 75, y: 105,
				radius: 10
			})
			.drawRect({
				strokeStyle: "grey",
				strokeWidth: 4,
				x: 150, y: 30,
				width: 250,
				height: 50,
				cornerRadius: 10
			});	

		}	// end thought bubble


		// thought bubble text
		function thoughtText() {

			var thought_text = $('#thought_text').val();

			$('#canvas-create').drawText({
				fillStyle: '#fff',
				strokeStyle: '#000',
				strokeWidth: 3,
				x: 300,
				y: 50,
				fontSize: '3em', 
				fontFamily: 'Impact, sans-serif',
				text: thought_text
			});

		}	// end thought bubble text

		// This is where everything is written to the web page!
		$('#canvas-create').drawImage({
			source: imgsrc,
			x: 200,
			y: 300,
			load: thoughtBubble,
			load: thoughtText
		});

	}); //end create canvas button click


}); //end ready
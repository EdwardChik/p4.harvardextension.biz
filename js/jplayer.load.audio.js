$(document).ready(function(){
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {

			$(this).jPlayer("setMedia", {
				m4a: "../assets/audio.m4a",
				oga: "../assets/audio.oga"
			});
		},

		swfPath: "../js",
		supplied: "m4a, oga"

	});
});
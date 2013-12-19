$(document).ready(function(){
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {

			$(this).jPlayer("setMedia", {
				m4v: "../assets/video.m4v",
				ogv: "../assets/video.ogv",
				poster: "../images/video_player_poster.jpg"
			});
		},

		swfPath: "../js",
		supplied: "m4v, ogv"

	});
});
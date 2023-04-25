(function($){
	function videoblock(){
		$('body').on('click', '.pt-video-block', function(e){
			e.preventDefault();
			var myVideo = $(this).find('.movie')[0];
			if (myVideo.paused){
				myVideo.play();
				$(this).addClass('play');
			} else {
				myVideo.pause();
				$(this).removeClass('play');
			}
		});
	};
	var ptVideoBlock = $('#pt-pageContent .pt-video-block');
	if (ptVideoBlock.length){
		videoblock();
	};
})(jQuery);

(function($){
	function isTouchDevice(){
		return typeof window.ontouchstart !== 'undefined';
	};
	if(isTouchDevice()){
		$('body #pt-pageContent .block-once').one('click', this, function(event){
			event.preventDefault();
		});
	};
})(jQuery);


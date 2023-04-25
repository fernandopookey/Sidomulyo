(function($){
	var jsInitPromofixed = $('#js-init-promofixed');
	if(jsInitPromofixed){
		$(document).ready(function() {
			setTimeout(function(){
				$('#js-slick-promofixed').slick({
					dots: false,
					arrows: false,
					infinite: true,
					autoplay: true,
					autoplaySpeed: 6000,
					slidesToShow: 1,
					slidesToScroll: 1,
					adaptiveHeight: true,
					fade: true
				});
				jsInitPromofixed.fadeTo("90", 1);
			}, 2300);
			jsInitPromofixed.on('click', '.pt-btn-close', function(e){
				$('#js-slick-promofixed').slick('unslick');
				$(this).closest('.pt-promofixed').hide();
				return false;
			});
		});
	};
})(jQuery);

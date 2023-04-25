(function($){
	var $jsHeaderSlider = $('#pt-header .js-header-slider');
	if($jsHeaderSlider.length){
		$jsHeaderSlider.slick({
			autoplay:true,
			autoplaySpeed: 5500,
			dots: false,
			arrows: false,
			infinite: true,
			speed: 500,
			slidesToShow: 1,
			adaptiveHeight: false
		});
	};
})(jQuery);

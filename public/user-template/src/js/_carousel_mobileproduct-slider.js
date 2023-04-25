(function($){
	var initMobileProductSingle = $('#js-init-mobile-productsingle');
	if(initMobileProductSingle.length){
		initMobileProductSingle.slick({
			lazyLoad: 'progressive',
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true,
			 lazyLoad: 'progressive',
		});
	};
})(jQuery);

(function($){
	var ptCarouselBrands = $('#pt-pageContent .pt-carousel-brands');
	if (ptCarouselBrands.length) {
		ptCarouselBrands.slick({
			lazyLoad: 'progressive',
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			slidesToShow: 6,
			slidesToScroll: 1,
			adaptiveHeight: true,
			responsive: [
			{
				breakpoint: 1230,
				settings: {
					slidesToShow: 6,
				}
			},
			{
				breakpoint: 1025,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 790,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 380,
				settings: {
					slidesToShow: 1
				}
			}
			]
		});
	};
})(jQuery);

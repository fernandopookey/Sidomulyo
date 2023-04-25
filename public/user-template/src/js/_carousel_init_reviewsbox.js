(function($){
		var ptCarouselReviewsbox = $('#pt-pageContent .js-carousel-reviewsbox');
		if (ptCarouselReviewsbox.length){
				ptCarouselReviewsbox.slick({
					lazyLoad: 'progressive',
					dots: true,
					arrows: false,
					infinite: true,
					speed: 300,
					slidesToShow: 2,
					slidesToScroll: 2,
					adaptiveHeight: true,
					responsive: [
					{
						breakpoint: 790,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					}
					]
				});
		};
})(jQuery);

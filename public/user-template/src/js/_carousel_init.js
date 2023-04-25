(function($){
	var jsCarouselProducts = $('#pt-pageContent .js-init-carousel');
	if (jsCarouselProducts.length) {
		jsCarouselProducts.each(function(){
			var slick = $(this),
					item =  $(this).data('item'),
					itemmobile =  $(this).data('itemmobile');

			if(slick.item==5){
				slick.slick({
					lazyLoad: 'progressive',
					dots: true,
					arrows: true,
					infinite: true,
					speed: 300,
					slidesToShow: item,
					slidesToScroll: item,
					adaptiveHeight: true,
						responsive: [{
							breakpoint: 1240,
							settings: {
								slidesToShow: 4,
								slidesToScroll: 4
							}
						},
						{
							breakpoint: 1025,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 3
							}
						},
						{
							breakpoint: 791,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						}]
				});
			};
			slick.slick({
				lazyLoad: 'progressive',
				dots: true,
				arrows: true,
				infinite: true,
				speed: 300,
				slidesToShow: item || 4,
				slidesToScroll: item || 4,
				adaptiveHeight: true,
					responsive: [{
						breakpoint: 1025,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3
						}
					},
					{
						breakpoint: 791,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
				{
					breakpoint: 650,
					settings: {
						slidesToShow: itemmobile || 2,
						slidesToScroll: itemmobile || 1
					}
				}]
			});
		});
	};
})(jQuery);
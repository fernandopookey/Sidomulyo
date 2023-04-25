// (*blog-single-post-gallery.html)
(function($){
	var ptSliderBlogSingle =  $('#pt-pageContent .pt-slider-blog-single');
	if (ptSliderBlogSingle.length){
		ptSliderBlogSingle.slick({
			dots: false,
			arrows: false,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true
		});
		//total slides
		var ptSlickQuantity = $('.pt-slick-quantity');
		if (ptSlickQuantity.length) {
			ptSlickQuantity.find('.total').html(ptSliderBlogSingle.slick("getSlick").slideCount);
			ptSliderBlogSingle.on('afterChange', function(event, slick, currentSlide){
				var currentIndex = $('.slick-current').attr('data-slick-index');
				currentIndex = ++ currentSlide;
				ptSlickQuantity.find('.account-number').html(currentIndex);
			});
		};
		//button
		var ptSlickButton = $('.pt-slick-button');
		if (ptSlickButton.length) {
			ptSlickButton.find('.slick-next').on('click',function(e) {
				ptSliderBlogSingle.slick('slickNext');
			});
			ptSlickButton.find('.slick-prev').on('click',function(e) {
				ptSliderBlogSingle.slick('slickPrev');
			});
		};
	};
})(jQuery);

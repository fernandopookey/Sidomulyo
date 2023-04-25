(function($){
	$('body').on('click', '.pt-product .pt-btn-wishlist, .pt-product .pt-btn-compare', function (e){
		$(this).toggleClass('active');
		return false;
	});
})(jQuery);

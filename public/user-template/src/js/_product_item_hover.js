(function($){
	$(document).on('mouseenter click touchstart touch', '#pt-pageContent .pt-product:not(.tt-view)', function(e) {
		var target = e.target,
			srcRollover = $(this).attr('data-rollover');

		if (typeof srcRollover !== 'undefined' && !$(this).hasClass('pt-is-include')){
			$(this).addClass('pt-is-include');
			$(this).find('.pt-image-box .pt-img').after('<span class="pt-img-roll-over"><img src="' + srcRollover + '"" alt="image"></span>');

		};
	});



	if (!$('html').hasClass('pt-product-move') || !$('html').hasClass('pt-product-type-02') ) return;
	var moveProduct = (function () {
		$(document).on('mouseenter mouseleave', '#pt-pageContent .pt-product', function(e) {
			if($('.pt-product-listing').length && $('.pt-product-listing').hasClass("pt-col-one")) return false;

			var $this = $(this),
				windW = window.innerWidth,
				objLiftUp01 = $this.find('.pt-description'),
				objLiftUp02 = $this.find('.pt-row-hover'),
				objHeight02 = parseInt(objLiftUp02.height())+23,
				objCountdown = $this.find('.pt-countdown_box'),
				target = e.target;

			if($this.hasClass('product-nohover')) return false;

			if (e.type === 'mouseenter' && windW > 1024) {
				ptOnHover();
			} else if (e.type === 'mouseleave' && e.relatedTarget && windW > 1024) {
				ptOffHover();
			};

			function ptOnHover(e){
				$this.stop().css({
				height: $this.innerHeight()
				}).addClass('hovered');
				objLiftUp01.stop().animate({'top': '-' + objHeight02}, 200);
				objLiftUp02.stop().animate({ 'opacity': 1 }, 400);
				objCountdown.stop().animate({'bottom': objHeight02}, 200);
				return false;
			};
			function ptOffHover(e){
				$this.stop().removeClass('hovered').removeAttr('style');
				objLiftUp01.stop().animate({'top': '0'}, 200, function(){$(this).removeAttr('style')});
				objLiftUp02.stop().animate({ 'opacity': 0 }, 100, function(){$(this).removeAttr('style')});
				objCountdown.stop().animate({'bottom': 0}, 200, function(){$(this).removeAttr('style')});
				return false
			};
		});
	}());
})(jQuery);

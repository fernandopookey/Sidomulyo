/*
	Main Slider - Slick
*/
(function($){
	var $mainSliderSlick = $('#pt-pageContent .mainSliderSlick-js');
	if (!mainSliderSlick) return;

	mainSliderSlick();

	function mainSliderSlick() {
		var $el = $mainSliderSlick;
		$el.on('init', function (e, slick) {
			var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
			doAnimations($firstAnimatingElements);
		});
		$el.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
			var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
			var $animatingElements = $currentSlide.find('[data-animation]');
			doAnimations($animatingElements);
		});
		$el.slick({
			arrows: false,
			dots: true,
			autoplay: true,
			autoplaySpeed: 5500,
			fade: true,
			speed: 1000,
			pauseOnHover: false,
			pauseOnDotsHover: true,
			responsive: [{
				breakpoint: 1025,
				settings: {
					arrows: false,
					dots: true
				}
			}]
		});
	};
	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('animation-delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
			  'animation-delay': $animationDelay,
			  '-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
			  $this.removeClass($animationType);
			});
			if ($this.hasClass('animate')) {
			  $this.removeClass('animation');
			}
		});
	};
	function checkDots(){
		var objDots = $mainSliderSlick.find('.slick-dots'),
			checkQuantity = objDots.find('li').length;
		if(checkQuantity == '1'){
			objDots.addClass('hide');
		}
	};
	checkDots();
	$(window).on("resize", function(){
		checkDots();
	});

})(jQuery);

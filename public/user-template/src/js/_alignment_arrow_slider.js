(function($){
		var methods = {
				init: function(options){
						return this.each(function(){
								var $this = $(this);
								methods.alignmen(options, $this);
						});
				},
				alignmen: function(options, $this){
					var btnNav = $this.find('.slick-arrow'),
							btnNavHeight = btnNav.findHeight(),
							object = $this.find('.' + options.centeringObject),
							objectHeight = object.findHeight(),
							objectHeightError = parseInt(object.css('marginTop'), 10),
							addErrorObj = $this.find('.' + options.addError),
							addError = addErrorObj.innerHeight() + parseInt($this.find(addErrorObj).css('marginTop'), 10) || 0,
							addErrorTopObj = $this.find('.' + options.addErrorTop),
							addErrorTop = parseInt($this.find(addErrorTopObj).css('marginTop'), 10) || 0;

					btnNav.css({
						'top' : addError + addErrorTop + objectHeightError + objectHeight - btnNavHeight,
						"margin-top": "0px"
					}).animate({opacity: 1});
				}
		};
		$.fn.alignmentArrow = function(action){
			 if(methods[action]){
					 return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
			 } else if(typeof action === 'object' || !action){
					 return methods.init.apply(this, arguments);
			 } else {
					 console.info('Action ' +action+ 'not found this plugin');
					 return this;
			 }
		};
		$.fn.findHeight = function(){
			var $blocks = $(this),
					maxH    = $blocks.eq(0).innerHeight();

			$blocks.each(function(){
				maxH = ( $(this).innerHeight() > maxH ) ? $(this).innerHeight() : maxH;
			});

			return maxH/2;
		};
		$(window).resize((function(e){
			setTimeout(function(){
					$('#pt-pageContent .js-compare-alignment-arrow').imagesLoaded().alignmentArrow({
							centeringObject: 'pt-img',
							addError: 'pt-remove-item'
					});
					$('#pt-pageContent .js-align-arrow').imagesLoaded().alignmentArrow({
							centeringObject: 'pt-image-box',
							addErrorTop: 'pt-product'
					});
					$('#pt-pageContent .js-promo-align-arrow').imagesLoaded().alignmentArrow({
							centeringObject: 'image-box',
							addErrorTop: 'pt-promo-card'
					});
			}, 630);
		})).resize();
})(jQuery);
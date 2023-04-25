
		var settings = {
			singleImg: '768'
		};
		var methods = {
				init: function(options){
						var setting = $.extend(settings, options);
						return this.each(function(){
								var ptCarousel = $(this).find("." + 'pt-gallery-carousel');

								methods.initCarusel(ptCarousel);
								methods.changeImg();
								methods.clickImg();

						});
				},
				resize: function(){
					$(window).resize(function(){
							 var windW = window.innerWidth;
							 if (windW >= 791) {
									methods.clickImg();
								} else if (windW < 790) {
								 methods.offClickImg();
							};
					});
				},
				changeImg: function(ptSrc){
						$('.pt-gallery-single-img img').attr('src', ptSrc);
				},
				currentImg: function(){
						var ptSrc = $('.' + 'pt-gallery-carousel').find('.slick-current img').attr('src');
						methods.changeImg(ptSrc);
				},
				clickImg: function(ptSrc){
						$('body').on('click', '.pt-gallery-carousel li img', function(e){
								var ptSrc = $(this).attr('src');
								methods.changeImg(ptSrc);
								 $(this).closest('li').addClass('slick-current').siblings().removeClass('slick-current');
								return false;
						});
				},
				offClickImg: function(){
					$('body').off( "click", ".pt-gallery-carousel li img");
				},
				initCarusel: function(ptCarousel){
						ptCarousel.slick({
							dots: false,
							arrows: false,
							infinite: true,
							speed: 300,
							slidesToShow: 6,
							slidesToScroll: 1,
							adaptiveHeight: true,
								responsive: [{
									breakpoint: 1240,
									settings: {
										slidesToShow: 4,
									}
								},
							 {
									breakpoint: 1024,
									settings: {
										slidesToShow: 3,
									}
								},
								{
									breakpoint: 791,
									settings: {
										slidesToShow: 3,
									}
								}]
						});
						var ttSlickButton = $('.pt-gallery-button');
						if (ttSlickButton.length){
							ttSlickButton.find('.slick-next').on('click',function(e){
									ptCarousel.slick('slickNext');
									methods.currentImg();
							});
							ttSlickButton.find('.slick-prev').on('click',function(e){
									ptCarousel.slick('slickPrev');
									methods.currentImg();
							});
						};
				}
		};
		$.fn.galleryPreview = function(action){
			 if(methods[action]){
					 return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
			 } else if(typeof action === 'object' || !action){
					 return methods.init.apply(this, arguments);
			 } else {
					 console.info('Action ' +action+ 'not found this plugin');
					 return this;
			 }
		};
		$('#ModalquickView .pt-gallery').galleryPreview({});


		$('body').on('shown.bs.modal', $('#ModalquickView'), function(e){
				initScroll();
		});
		$('body').on('hidden.bs.modal', $('#ModalquickView'), function(e){
				destroyScroll();
		});
		$.fn.getRealDimensions = function (outer){
				var $this = $(this);
				if ($this.length == 0) {
						return false;
				}
				var $clone = $this.clone()
						.show()
						.css('visibility','hidden')
						.insertAfter($this);
				var result = {
						width:      (outer) ? $clone.outerWidth() : $clone.innerWidth(),
						height:     (outer) ? $clone.outerHeight() : $clone.innerHeight(),
						offsetTop:  $clone.offset().top,
						offsetLeft: $clone.offset().left
				};
				$clone.remove();
				return result;
		};

		var ttCachedWidth = $(window).width();
				$(window).on('resize', function(){
					$('body').hasClass('modal-open');
					var newWidth = $(window).width();
					if(newWidth !== ttCachedWidth){
							ttCachedWidth = newWidth;
						 destroyScroll();
						 initScroll();
					}
			 });
		function initScroll(){
				var windowWidth = window.innerWidth,
						windowHeight = window.innerHeight,
						objScrollInit = $('#ModalquickView .pt-modal-quickview'),
						layoutHeight = parseInt(objScrollInit.getRealDimensions().height),
						requiredSize = parseInt(windowHeight - 80);

				if(layoutHeight > windowHeight){
						objScrollInit.css("height", requiredSize).perfectScrollbar();
				} else {
					objScrollInit.perfectScrollbar('destroy');
				};
		};
		function destroyScroll(){
			$('#ModalquickView').find('.ps-container').perfectScrollbar('destroy').removeAttr('style');

		};



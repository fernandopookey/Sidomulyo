(function($){
		var $ptPageContent = $('#pt-pageContent'),
				ptProductSingleBtnZomm = $ptPageContent.find('.pt-product-single-img .js-btnzoom-slider'),
				$body = $('body'),
				$jsbtnzoomGallery = $('#js-btnzoom-gallery'),
				$jsLayoutGallery = $('#js-layout-gallery');

		if(ptProductSingleBtnZomm.length){
				product_single_btnzomm();
		};

		function product_single_btnzomm(){
				$body.on('click', '.pt-product-single-img .js-btnzoom-slider', function(e){
						var objSmallGallery = $('#smallGallery');
						objSmallGallery.find('a').each(function(){
								var dataZoomImg = $(this).attr('data-zoom-image');
								if(dataZoomImg.length){
									$(this).closest('li').append("<a class='link-magnific-popup' href='#'></a>").find('.link-magnific-popup').attr('href', dataZoomImg);
									if($(this).hasClass('zoomGalleryActive')){
										$(this).closest('li').find('.link-magnific-popup').addClass('zoomGalleryActive');
									};
								};
						});
						objSmallGallery.addClass('pt-magnific-popup').find('.link-magnific-popup').magnificPopup({
							type: 'image',
							mainClass: 'mfp-zoom-in',
							closeBtnInside:true,
								gallery: {
										enabled: true,
										tCounter: '<span class="mfp-counter"></span>'
								},
								callbacks: {
									open: function(){
										$('.mfp-gallery').append('<button title="Close (Esc)" type="button" class="mfp-close">×</button>');
									},
									close: function() {
										$('.mfp-gallery .mfp-close').remove();
										setTimeout(function() {
												objSmallGallery.removeClass('pt-magnific-popup').find('.link-magnific-popup').remove();
										}, 200);
									}
								}
						});
						objSmallGallery.find('.link-magnific-popup.zoomGalleryActive').trigger('click');
				});
		};
		var elevateZoomWidget = {
			scroll_zoom: true,
			class_name: '.zoom-product',
			thumb_parent: $('#smallGallery'),
			scrollslider_parent: $('.slider-scroll-product'),
			checkNoZoom: function(){
				return $(this.class_name).parent().parent().hasClass('no-zoom');
			},
			init: function(type){
				var _ = this;
				var currentW = window.innerWidth || $(window).width();
				var zoom_image = $(_.class_name);
				var _thumbs = _.thumb_parent;
				_.initBigGalleryButtons();
				_.scrollSlider();

				if(zoom_image.length == 0) return false;
				if(!_.checkNoZoom()){
					var attr_scroll = zoom_image.parent().parent().attr('data-scrollzoom');
					attr_scroll = attr_scroll ? attr_scroll : _.scroll_zoom;
					_.scroll_zoom = attr_scroll == 'false' ? false : true;
					currentW > 575 && _.configureZoomImage();
					_.resize();
				}

				if(_thumbs.length == 0) return false;
				var thumb_type = _thumbs.parent().attr('class').indexOf('-vertical') > -1 ? 'vertical' : 'horizontal';
				_[thumb_type](_thumbs);
				_.setBigImage(_thumbs);
			},
			configureZoomImage: function(){
				var _ = this;
				$('.zoomContainer').remove();
				var zoom_image = $(this.class_name);
				zoom_image.each(function(){
					var _this = $(this);
					var clone = _this.removeData('elevateZoom').clone();
					_this.after(clone).remove();
				});
				setTimeout(function(){
					$(_.class_name).elevateZoom({
						gallery: _.thumb_parent.attr('id'),
						zoomType: "inner",
						scrollZoom: Boolean(_.scroll_zoom),
						cursor: "crosshair",
						zoomWindowFadeIn: 300,
						zoomWindowFadeOut: 300
					});
				}, 100);
			},
			resize: function(){
				var _ = this;
				$(window).resize(function(){
					var currentW = window.innerWidth || $(window).width();
					if(currentW <= 575) return false;
					_.configureZoomImage();
				});
			},
			horizontal: function(_parent){
				var item =  _parent.data('slick-total');
				if(item == undefined){
						_parent.slick({
							infinite: true,
							dots: false,
							arrows: true,
							slidesToShow: 7,
							slidesToScroll: 1,
							responsive: [{
								breakpoint: 1239,
								settings: {
									slidesToShow: 5,
									slidesToScroll: 1
								}
							},
							{
								breakpoint: 992,
								settings: {
									slidesToShow: 4,
									slidesToScroll: 1
								}
							}]
						});
				};
				if(item == 4){
						_parent.slick({
								infinite: true,
								dots: false,
								arrows: true,
								slidesToShow: 4,
								slidesToScroll: 1,
								responsive: [{
									breakpoint: 1239,
									settings: {
										slidesToShow: 4,
										slidesToScroll: 1
									}
								},
								{
									breakpoint: 992,
									settings: {
										slidesToShow: 4,
										slidesToScroll: 1
									}
								}]
						});
				};
				 if(item == 6){
						_parent.slick({
								infinite: true,
								dots: false,
								arrows: true,
								slidesToShow: 6,
								slidesToScroll: 1,
								responsive: [{
									breakpoint: 1239,
									settings: {
										slidesToShow: 4,
										slidesToScroll: 1
									}
								},
								{
									breakpoint: 992,
									settings: {
										slidesToShow: 4,
										slidesToScroll: 1
									}
								}]
						});
				};
			},
			vertical: function(_parent){
				_parent.slick({
					vertical: true,
					infinite: false,
					slidesToShow: 6,
					slidesToScroll: 1,
					verticalSwiping: true,
					arrows: true,
					dots: false,
					centerPadding: "0px",
					customPaging: "0px",
					responsive: [{
						breakpoint: 1239,
						settings: {
							slidesToShow: 5,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1
						}
					}]
				});
			},
			initBigGalleryButtons: function(){
							var bigGallery = $('.bigGallery');
							if(bigGallery.length == 0) return false;
							$( 'body' ).on( 'mouseenter', '.zoomContainer',
											function(){        bigGallery.find('button').addClass('show');        }
							).on( 'mouseleave', '.zoomContainer',
											function(){ bigGallery.find('button').removeClass('show'); }
							);
			},
			scrollSlider: function(){
				var _scrollslider_parent = this.scrollslider_parent;
				if(_scrollslider_parent.length == 0) return false;
				_scrollslider_parent.on('init', function(event, slick) {
					_scrollslider_parent.css({ 'opacity': 1 });
				});
				_scrollslider_parent.css({ 'opacity': 0 }).slick({
					infinite: false,
					vertical: true,
					verticalScrolling: true,
					dots: true,
					arrows: false,
					slidesToShow: 1,
					slidesToScroll: 1,
					responsive: [{
						breakpoint: 1200,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 992,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}]
				}).mousewheel(function(e) {
					e.preventDefault();
					e.deltaY < 0 ? $(this).slick('slickNext') : $(this).slick('slickPrev');
				});
			},
			setBigImage: function(_parent){
				var _ = this;
				_parent.find('a').on('click',function(e) {
					_.checkNoZoom() && e.preventDefault();
					var zoom_image = $(_.class_name);
					var getParam = _.checkNoZoom() ? 'data-image' : 'data-zoom-image';
					var setParam = _.checkNoZoom() ? 'src' : 'data-zoom-image';
					var big_image = $(this).attr(getParam);
					zoom_image.attr(setParam, big_image);

					if(!_.checkNoZoom()) return false;
					_parent.find('.zoomGalleryActive').removeClass('zoomGalleryActive');
					$(this).addClass('zoomGalleryActive');
				});
			}
		};
		elevateZoomWidget.init();

	$body.on('click', '#js-btnzoom-gallery', function(e){
		$jsLayoutGallery.find('> *:first a').trigger('click');
		return false;
	});
	$jsLayoutGallery.find('.pt-gallery-link').magnificPopup({
			type: 'image',
			mainClass: 'mfp-zoom-in',
			closeBtnInside:true,
				gallery: {
						enabled: true,
						tCounter: '<span class="mfp-counter"></span>'
				},
				callbacks: {
					open: function(){
						$('.mfp-gallery').append('<button title="Close (Esc)" type="button" class="mfp-close">×</button>');
					},
					close: function() {
						$('.mfp-gallery .mfp-close').remove();
						setTimeout(function() {
								objSmallGallery.removeClass('pt-magnific-popup').find('.link-magnific-popup').remove();
						}, 200);
					}
				}
	});

})(jQuery);

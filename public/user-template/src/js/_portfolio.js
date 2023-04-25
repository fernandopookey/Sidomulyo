(function($){
		var $ptPageContent = $('#pt-pageContent'),
				ptPortfolioMasonry = $ptPageContent.find('.pt-portfolio-masonry'),
				ptPortfolioContent = $ptPageContent.find('.pt-portfolio-content'),
				$window = $(window);

		if (ptPortfolioContent.length && is_touch_device()) {
			ptPortfolioContentMobile();
		};

		$window.on('load', function(){
			var ptwindowWidth = window.innerWidth || $window.width();
			if (ptPortfolioMasonry.length){
					gridPortfolioMasonr();
					initPortfolioPopup();
			};
		});
		var ptCachedWidth = $window.width();
		$window.on('resize', function () {
				 var newWidth = $window.width();
					if(newWidth !== ptCachedWidth){
							ptCachedWidth = newWidth;
							var ptwindowWidth = window.innerWidth || $window.width();

							if (ptPortfolioContent.length && is_touch_device()) {
									ptPortfolioContentMobile();
							};
					}
		});
		function ptPortfolioContentMobile(){
				ptPortfolioContent.on('click', 'figure img', function() {
						$(this).closest(".pt-portfolio-content").find('figure').removeClass('gallery-click');
						$(this).closest("figure").addClass('gallery-click');
				});
		};
		function gridPortfolioMasonr(){
				// init Isotope
				var $grid = ptPortfolioMasonry.find('.pt-portfolio-content').isotope({
						itemSelector: '.element-item',
						layoutMode: 'masonry',
				});
				// layout Isotope after each image loads
				$grid.imagesLoaded().progress( function() {
					$grid.isotope('layout').addClass('pt-show');
				});
				// filter functions
				var ptFilterNav =  ptPortfolioMasonry.find('.pt-filter-nav');
				if (ptFilterNav.length) {
						var filterFns = {
								ium: function() {
									var name = $(this).find('.name').text();
									return name.match(/ium$/);
								}
						};
						// bind filter button click
					 ptFilterNav.on('click', '.button', function() {
								var filterValue = $(this).attr('data-filter');
								filterValue = filterFns[filterValue] || filterValue;
								$grid.isotope({
									filter: filterValue
								});
								$(this).addClass('active').siblings().removeClass('active');
						});
				};
				//add item
				var isotopShowmoreJs = $('.isotop_showmore_js .btn'),
						ptAddItem = $('.pt-add-item');
				if (isotopShowmoreJs.length && ptAddItem.length) {
						isotopShowmoreJs.on('click', function(e) {
								e.preventDefault();
								$.ajax({
										url: 'ajax_portfolio.php',
										success: function(data) {
											var $item = $(data);
											ptAddItem.append($item);
											$grid.isotope('appended', $item);
											initPortfolioPopup();
											adjustOffset();
										}
								});
								function adjustOffset(){
										var offsetLastItem = ptAddItem.children().last().children().offset().top - 180;
										$($body, $html).animate({
												scrollTop: offsetLastItem
										}, 500);
								};
								return false;
						 });
				};
		};
		function initPortfolioPopup(){
			var objZoom = $ptPageContent.find('.pt-portfolio-masonry .pt-btn-zoom');
			objZoom.magnificPopup({
					type: 'image',
					mainClass: 'mfp-zoom-in',
					gallery: {
							enabled: true
					},
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
									setTimeout(function(){
											objZoom.removeClass('pt-magnific-popup').find('.link-magnific-popup').remove();
									}, 200);
						}
					}
			});
		};
		function is_touch_device() {
				return !!('ontouchstart' in window) || !!('onmsgesturechange' in window);
		};
})(jQuery);

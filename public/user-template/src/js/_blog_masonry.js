(function($){
	var $ptPageContent = $('#pt-pageContent'),
		ptBlogMasonry = $ptPageContent.find('.pt-blog-masonry'),
		$window = $(window),
		$body = $('body'),
		$html = $('html');

	$window.on('load', function () {
		var ptwindowWidth = window.innerWidth || $window.width();
		if (ptBlogMasonry.length){
			gridGalleryMasonr();
		};
	});

	 function gridGalleryMasonr() {
		// init Isotope
		var $grid = ptBlogMasonry.find('.pt-blog-init').isotope({
			itemSelector: '.element-item',
			layoutMode: 'masonry',
		});
		// layout Isotope after each image loads
		$grid.imagesLoaded().progress( function() {
		  $grid.isotope('layout').addClass('pt-show');
		});
		// filter functions
		var ptFilterNav =  ptBlogMasonry.find('.pt-filter-nav');
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
		var isotopShowmoreJs = $('.isotop_showmore_js .btn'),
			ptAddItem = $('.pt-add-item');
		if (isotopShowmoreJs.length && ptAddItem.length) {
			isotopShowmoreJs.on('click', function(e) {
				e.preventDefault();
				$.ajax({
					url: 'ajax_post.php',
					success: function(data) {
					  var $item = $(data);
					  ptAddItem.append($item);
					  $grid.isotope('appended', $item);
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
})(jQuery);

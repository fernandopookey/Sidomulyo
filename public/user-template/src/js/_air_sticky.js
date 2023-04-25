(function($){
	var ptAirSticky = $('#pt-pageContent .airSticky'),
		$window = $(window),
		ptwindowWidth = window.innerWidth || $window.width();

	if (ptAirSticky.length){
		init_sticky(ptwindowWidth);
	};
	var ptCachedWidth = $window.width();
	$window.on('resize', function () {
		var newWidth = $window.width();
		if(newWidth !== ptCachedWidth){
			ptCachedWidth = newWidth;

			var ptwindowWidth = window.innerWidth || $window.width();

			if (ptAirSticky.length) {
			init_sticky(ptwindowWidth);
			};

		}
	});
	function init_sticky(ptwindowWidth){
		var airStickyObj = ptAirSticky,
			ptCollapseBlock = $('#pt-pageContent .pt-collapse-block'),
			tabObj =  ptCollapseBlock.find('.pt-collapse-title');

		if(ptwindowWidth >= 1024){
			airStickyObj.airStickyBlock({
				debug: false,
				stopBlock: '.airSticky_stop-block',
				offsetTop: 70,
			});
		} else if(airStickyObj.hasClass('airSticky_absolute')) {
			airStickyObj.removeClass('airSticky_absolute');
		};
		$(document).on('resize scroll', tabObj, function () {
			airStickyObj.trigger('render.airStickyBlock');
		});
		tabObj.on('click', function() {
			setTimeout(function(){
				airStickyObj.trigger('render.airStickyBlock');
			 }, 170);
		});
	};
})(jQuery);

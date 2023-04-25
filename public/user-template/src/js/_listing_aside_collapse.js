(function($){
	var ptCollapse = $('#pt-pageContent .pt-collapse');
	if (ptCollapse.length){
		initCollapse();
	};
	function initCollapse(){
		var item = ptCollapse,
			itemTitle = item.find('.pt-collapse-title'),
			itemContent = item.find('.pt-collapse-content');

		item.each(function() {
			if ($(this).hasClass('open')) {
			  $(this).find(itemContent).slideDown();
			} else {
			   $(this).find(itemContent).slideUp();
			}
		});
		itemTitle.on('click', function(e) {
			e.preventDefault();
			var speed = 300;
			var thisParent = $(this).parent(),
				nextLevel = $(this).next('.pt-collapse-content');
			if (thisParent.hasClass('open')) {
				thisParent.removeClass('open');
				nextLevel.slideUp(speed);
			} else {
				thisParent.addClass('open');
				nextLevel.slideDown(speed);
			}
		})
	};
})(jQuery);

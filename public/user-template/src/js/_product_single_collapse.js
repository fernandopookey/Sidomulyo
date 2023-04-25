// (*blog-single-post-gallery.html)
(function($){
	var ptCollapseBlock = $('#pt-pageContent .pt-collapse-block');
	if (ptCollapseBlock.length){
		init_collapse_block();
	};
	function init_collapse_block() {
		ptCollapseBlock.each(function(){
			var obj = $(this),
				objOpen = obj.find('.pt-item.active'),
				objItemTitle = obj.find('.pt-item .pt-collapse-title');

			objOpen.find('.pt-collapse-content').slideToggle(100);

			objItemTitle.on('click', function(){
				$(this).next().slideToggle(200).parent().toggleClass('active');
			});
		});
	};
})(jQuery);

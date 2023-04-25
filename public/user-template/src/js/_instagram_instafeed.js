(function($){
	$(window).on('load', function () {
			$("#instafeed").each(function(){
				var dataLimitimg = $(this).data('limitimg'),
					datausername = $(this).data('username');
				$.instagramFeed({
					'username': datausername,
					'container': "#instafeed",
					'display_profile': false,
					'display_biography': false,
					'display_gallery': true,
					'styling': false,
					'items': dataLimitimg,
					'margin': 0
				});
			});
		});
})(jQuery);

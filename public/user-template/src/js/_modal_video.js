(function($){
	var modalVideoProduct = $('#modalVideoProduct');

	if (modalVideoProduct.length){
		ptVideoPopup();
	};
	function ptVideoPopup(){
		modalVideoProduct.on('show.bs.modal', function(e){
			var relatedTarget = $(e.relatedTarget),
				attr = relatedTarget.attr('data-value'),
				attrPoster = relatedTarget.attr('data-poster'),
				attrType = relatedTarget.attr('data-type');

			if(attrType === "youtube" || attrType === "vimeo" || attrType === undefined){
				$('<iframe src="'+attr+'" allowfullscreen></iframe>').appendTo($(this).find('.modal-video-content'));
			};
			if(attrType === "video"){
				$('<div class="pt-video-block pt-video-icon"><a href="#" class="link-video"><span class="pt-icon-play"><svg><use xlink:href="#icon-play"></use></svg></span><span class="pt-icon-pause"><svg><use xlink:href="#icon-pause"></use></svg></span></a><video class="movie" src="'+attr+'" poster="'+attrPoster+'" allowfullscreen></video></div>').appendTo($(this).find('.modal-video-content'));
			};
		}).on('hidden.bs.modal', function(){
			$(this).find('.modal-video-content').empty();
		});
	};
})(jQuery);

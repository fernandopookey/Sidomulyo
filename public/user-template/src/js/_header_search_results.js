(function($){
	var ptHeader = $('#pt-header');
		$ptSearchObj = ptHeader.find('.pt-search'),
		$ptSearchObjPopupInput = $ptSearchObj.find('.pt-search-input'),
		$ptSearchObjPopupResults = $ptSearchObj.find('.search-results'),

		$ptSearch2Obj = ptHeader.find('.pt-search-02'),
		$ptSearch2ObjPopupInput = $ptSearch2Obj.find('.pt-search-input'),
		$ptSearch2ObjPopupResults = $ptSearch2Obj.find('.search-results');

	if($ptSearchObjPopupInput.length && $ptSearchObjPopupResults.length){
		$ptSearchObj.on("input",function(ev){
			if($(ev.target).val()){
				$ptSearchObjPopupResults.fadeIn("200");
				var searchInclude = $('#pt-header').find('.search-results');
				if(!searchInclude.hasClass('pt-is-include')){
					searchInclude.addClass('pt-is-include');
					$.ajax({
						url: 'ajax-content/ajax_search_results.html',
						success: function(data){
							var $item = $(data);
							searchInclude.append($item);
							new LazyLoad();
						}
					});
				}
			};
		});
		$ptSearchObjPopupInput.blur(function(){
			$ptSearchObjPopupResults.fadeOut("200");
		});
	};

	if($ptSearch2ObjPopupInput.length && $ptSearch2ObjPopupResults.length){
		$ptSearch2Obj.on("input",function(ev){
			if($(ev.target).val()){
				$ptSearch2ObjPopupResults.fadeIn("200");
			};
		});
		$ptSearch2ObjPopupInput.blur(function(){
			$ptSearch2ObjPopupResults.fadeOut("200");
		});
	};
})(jQuery);

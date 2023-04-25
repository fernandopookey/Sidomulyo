(function($){
	function initnewsLetterObj(valueData, $obj){
		setTimeout(function() {
			$obj.modal('show');
		}, valueData);
	};
	$('.modal').each(function(){
		var $obj = $(this),
			$objValuePause = $obj.attr("data-pause"),
			$valuelocStorage = localStorage.getItem($obj.attr("data-localStorage"));

		if ($valuelocStorage == 'toshow') return false;

		if($obj.attr("data-pause")){
			var valueData = $(this).attr('data-pause');
			initnewsLetterObj(valueData, $obj);
		}
	});
})(jQuery);

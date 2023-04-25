(function($){
	var $ptPageContent = $('#pt-pageContent'),
		$ptLeftColumnAside = $ptPageContent.find('.leftColumn.aside'),
		$ptFilterOptions = $ptPageContent.find('.pt-filters-options'),
		ptFilterSort = $ptFilterOptions.find('.pt-sort'),
		ptProductListing = $ptPageContent.find('.pt-product-listing'),
		$ptLeftColumnAside = $ptPageContent.find('.leftColumn.aside'),
		ptFilterDetachOption = $ptLeftColumnAside.find('.pt-filter-detach-option'),
		$window = $(window),
		$body = $('body'),
		$html = $('html'),
		ptBtnColumnClose = $ptLeftColumnAside.find('.pt-btn-col-close'),
		ptBtnToggle = $ptFilterOptions.find('.pt-btn-toggle a');

	(function($) {
		$.fn.removeClassFirstPart = function(mask){
			return this.removeClass(function(index, cls){
				var re = mask.replace(/\*/g, '\\S+');
				return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
			});
		};
	})(jQuery);

	function ptFilterLayout(ptwindowWidth){

		// detach filter aside left
	   if($ptFilterOptions.hasClass('desctop-no-sidebar') && !$ptFilterOptions.hasClass('filters-detach-mobile')){
		   ptwindowWidth <= 1024 ?  insertMobileCol() : insertFilter();
		};
		if($ptFilterOptions.hasClass('filters-detach-mobile')){
			ptwindowWidth <= 1024 ?  insertMobileCol() : insertFilter();
		};
		if(!$ptFilterOptions.hasClass('desctop-no-sidebar')){
			ptwindowWidth <= 1024 ?  insertMobileCol() : insertFilter();
		};

		function insertMobileCol(){
			if(ptFilterSort.hasClass('pt-not-detach')) return;

			var objFilterOptions = ptFilterSort.find('> *').detach();
			ptFilterDetachOption.find('.filters-row-select').append(objFilterOptions);
		};
		function insertFilter(){
			if(ptFilterSort.hasClass('pt-not-detach')) return;

			var objColFilterOptions = ptFilterDetachOption.find('.filters-row-select > *').detach();
			ptFilterSort.append(objColFilterOptions);
		};

		//active filter detection
		ptProductListing.removeClassFirstPart("pt-col-*");

		var ptQuantity = $ptFilterOptions.find('.pt-quantity'),
			ptProductItem = ptProductListing.find('.pt-col-item:first'),
			ptProductItemValue =  (function(){
				if(ptQuantity.length && !ptQuantity.hasClass('pt-disabled')){
					var ptValue = parseInt(ptProductItem.css("flex").replace("0 0", "").replace("%", ""), 10) || parseInt(ptProductItem.css("max-width"), 10);
					return ptValue;
				};
			}()),
			ptGridSwitch = $ptFilterOptions.find('.pt-grid-switch');


		if(ptProductItemValue == 16){
			ptСhangeclass(ptQuantity, '.pt-col-six');
		} else if(ptProductItemValue == 25){
			ptСhangeclass(ptQuantity, '.pt-col-four');
		} else if(ptProductItemValue == 33){
			ptСhangeclass(ptQuantity, '.pt-col-three');
		} else if(ptProductItemValue == 50){
			ptСhangeclass(ptQuantity, '.pt-col-two');
		} else if(ptProductItemValue == 100){
			ptСhangeclass(ptQuantity, '.pt-col-one');
		};

		var switchGridOne = ptProductListing.attr('data-gridone');
		if(switchGridOne){
			$('.pt-filters-options .pt-grid-switch').trigger('click');
			setTimeout(function(){
				$('.pt-product-listing').fadeTo(0,1);
			}, 210);
		};

		function ptСhangeclass(ptObj, ptObjvalue){
			ptObj.find(ptObjvalue).addClass('active').siblings().removeClass('active');
			ptwindowWidth <= 1024 ?  ptShowIconMobile(ptObj, ptObjvalue) : ptShowIconDesctop(ptObj, ptObjvalue);
		};

		function ptShowIconDesctop(ptObj, ptObjvalue){

			ptObj.find('.pt-show').removeClass('pt-show');
			ptObj.find('.pt-show-siblings').removeClass('pt-show-siblings');

			var $this = ptObj.find(ptObjvalue);
			$this.addClass('pt-show');

			$this.next().addClass('pt-show-siblings');
			$this.prev().addClass('pt-show-siblings');
			var quantitySiblings = $('.pt-quantity .pt-show-siblings').length;
			if(quantitySiblings === 1){
				ptObj.find('.pt-show-siblings').prev().addClass('pt-show-siblings');
			};
		};
		function ptShowIconMobile(ptObj, ptObjvalue){
			ptObj.find('.pt-show').removeClass('pt-show');
			ptObj.find('.pt-show-siblings').removeClass('pt-show-siblings');

			var $this = ptObj.find(ptObjvalue);
			$this.addClass('pt-show');
			$this.prev().addClass('pt-show-siblings');
		};

		//click buttons filter
		ptQuantity.on('click', 'a', function(e) {
			e.preventDefault();
			if(ptQuantity.hasClass('pt-disabled')){
			  ptProductListing.removeClass('pt-row-view').find('.pt-col-item > div').removeClass('pt-view');
			  ptQuantity.removeClass('pt-disabled');
			  ptGridSwitch.removeClass('active');
			};

			ptQuantity.find('a').removeClass('active');
			var ptActiveValue = $(this).addClass('active').attr('data-value');
			ptProductListing.removeClassFirstPart("pt-col-*").addClass(ptActiveValue);
		});
	};

	$ptFilterOptions.find('.pt-grid-switch').on('click', function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		ptProductListing.toggleClass('pt-row-view').find('.pt-col-item > div').toggleClass('pt-view');
		$ptFilterOptions.find('.pt-quantity').toggleClass('pt-disabled');
	});

	$window.on('load', function(){
		var ptwindowWidth = window.innerWidth || $window.width();

		if ($ptFilterOptions.length) {
			ptFilterLayout(ptwindowWidth);
		};
	});

   var ptCachedWidth = $window.width();
   $window.on('resize', function(){
			var switchGridOne = ptProductListing.attr('data-gridone');
			if(switchGridOne) return false;
			var newWidth = $window.width();
			if(newWidth !== ptCachedWidth){
				ptCachedWidth = newWidth;
				var ptwindowWidth = window.innerWidth || $window.width();
				if ($ptFilterOptions.length) {
					ptFilterLayout(ptwindowWidth);
				};
				if ($ptLeftColumnAside.hasClass('column-open') && $ptLeftColumnAside.length) {
					$ptLeftColumnAside.find('.pt-btn-col-close a').trigger('click');
				};
		   }
	});

	if ($ptLeftColumnAside && ptBtnColumnClose && ptBtnToggle){
		ptToggleCol();
	};
	function ptToggleCol() {
		var $btnClose = $ptLeftColumnAside.find('.pt-btn-col-close a');

		$('.pt-btn-toggle a').on('click', function (e) {
			e.preventDefault();
			var ptScrollValue = $body.scrollTop() || $html.scrollTop();
			$ptLeftColumnAside.toggleClass('column-open').perfectScrollbar();
			$body.css("top", - ptScrollValue).addClass("no-scroll").append('<div class="modal-filter"></div>');
			var modalFilter = $('.modal-filter').fadeTo('fast',1);
			if (modalFilter.length) {
				modalFilter.on('click', function(){
					$btnClose.trigger('click');
				})
			}
			return false;
		});
		ptBtnColumnClose.on('click', function(e) {
			e.preventDefault();
			$ptLeftColumnAside.removeClass('column-open').perfectScrollbar('destroy');
			var top = parseInt($body.css("top").replace("px", ""), 10) * -1;
			$body.removeAttr("style").removeClass("no-scroll").scrollTop(top);
			$html.removeAttr("style").scrollTop(top);
			$(".modal-filter").off().remove();
		});
	};
})(jQuery);

function itemOptionSwitcher(){
	var ptOptionsSwatch = $('#pt-pageContent .pt-options-swatch');
	// switching click
	if (ptOptionsSwatch.length) {
		initSwatch(ptOptionsSwatch);
	};
	function addBg(optionsColorImg){
		$(optionsColorImg).each(function() {
			var dataSrcValue = $(this).attr('data-src') || false,
				dataSrcDemoValue = $(this).attr('data-src-demo') || false;
			if(dataSrcDemoValue != false){
				$(this).css({
				'background-image': 'url(' + dataSrcDemoValue + ')'
			});
			} else{
				$(this).css({
				'background-image': 'url(' + dataSrcValue + ')'
			});
			};
		});
	};
	function addImg($this){
		var $objData = $this.find('.options-color-img'),
			$objDataImg = $objData.attr('data-src'),
			$objDataDemoImg = $objData.attr('data-src-demo') || false,
			$objDataImgHover = $objData.attr('data-src-hover') || false,
			$objImgWrapper = $this.closest('.pt-product').find('.pt-image-box'),
			$objImgMain = $objImgWrapper.find('.pt-img img'),
			$objImgMainHover = $objImgWrapper.find('.pt-img-roll-over img');

		//change imgMain
		if($objDataImg.length){
			$objImgMain.attr('src', $objDataImg);
		};

		//change imgRollOvernHover
		if($objDataImg.length){
			var checkDisable =  $objImgMainHover.closest('.pt-img-roll-over');
			$objImgMainHover.attr('src', $objDataImgHover);
			if(checkDisable.hasClass('disable')){
				checkDisable.removeClass('disable');
			};
		};

		if($objDataImgHover === false){
			$objImgMainHover.closest('.pt-img-roll-over').addClass('disable');
		};
	};
	function initSwatch($obj){
		$obj.each(function(){
			var $this = $(this),
				jsChangeImg = $this.hasClass('js-change-img'),
				optionsColorImg = $this.find('.options-color-img');

			$this.on('click', 'li', function(e) {
				var $this = $(this);
				$this.addClass('active').siblings().removeClass('active');
				if(jsChangeImg){
					addImg($this);
				};
				return false;
			});
			if (optionsColorImg.length) {
				addBg(optionsColorImg);
			};
		});
	};
};
itemOptionSwitcher();

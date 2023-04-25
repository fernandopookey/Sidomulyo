(function($){
 var ptCompareTable02 = $('#pt-compare-table02'),
		compareInitSlider02 = ptCompareTable02.find('.compare-row-item'),
		$window = $(window);

		if (ptCompareTable02.length && compareInitSlider02.length){
				(function(){
						$window.on('ready, load', function(){
								initalignmentTable();
								checkQuantityProduct();
						});
						$window.resize(debouncer(function(e){
								initalignmentTable();
								checkQuantityProduct();
						}));
						function initalignmentTable(){
								var place01 = ptCompareTable02.find('.pt-col-title'),
										place02 = ptCompareTable02.find('.pt-col-item'),
										place01TotalElement = place01.find('> div').length,
										place02TotalElement = place02.find('.pt-item:first-child > div').length;

								if(place01TotalElement === place02TotalElement){
										var i = 1;
										while (i <= place01TotalElement) {
												var keyword = "js_one-height-0" + i;
												i++;
												calculatingMaxHeight(keyword);
										}
								};
								function calculatingMaxHeight($obj){
									var getObj = ptCompareTable02.find('.' + $obj);

									var maxHeight = 0;
									getObj.css("height", "auto").each(function(){
											$(this).css("height", "auto");
											var colHeight = $(this).height();
											if($(this).height() > maxHeight){
													maxHeight = $(this).height();
											};
									});
									getObj.height(maxHeight);
								};
						};
						function checkQuantityProduct(){
							var quantityProduct = compareInitSlider02.find('> *').length,
									widthViewPort = window.innerWidth || $window.width();

							if(widthViewPort >= 1024 && quantityProduct >= 4){
									initSlider();
									setTimeout(function(){
										initalignmentTable();
									}, 350);
							} else if(widthViewPort < 1024 && quantityProduct > 2){
								initSlider();
								setTimeout(function(){
										initalignmentTable();
									}, 350);
							} else if(widthViewPort < 790 && quantityProduct > 1){
								initSlider();
								setTimeout(function(){
										initalignmentTable();
									}, 350);
							};
						};
						function initSlider(){
								//slider init
								compareInitSlider02.slick({
										dots: false,
										arrows: true,
										infinite: true,
										speed: 300,
										slidesToShow: 3,
										slidesToScroll: 1,
										adaptiveHeight: false,
										responsive: [
										{
											breakpoint: 1025,
											settings: {
												slidesToShow: 2,
											}
										},
										{
											breakpoint: 790,
											settings: {
												slidesToShow: 1
											}
										}
										]
								})[0].slick.refresh();
						};
				}());
		};
		function debouncer(func, timeout) {
				var timeoutID, timeout = timeout || 500;
				return function() {
						var scope = this,
								args = arguments;
						clearTimeout(timeoutID);
						timeoutID = setTimeout(function() {
								func.apply(scope, Array.prototype.slice.call(args));
						}, timeout);
				}
		};
})(jQuery);

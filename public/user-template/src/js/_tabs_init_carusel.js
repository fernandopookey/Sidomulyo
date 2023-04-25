(function($){
	var ptpageContent = $('#pt-pageContent');
	$('a[data-toggle="tab"]').length && $('body').on('shown.bs.tab', 'a[data-toggle="tab"]', function (e){

		// switch animation
		var tttabsLayout = $(this).closest('.tt-ajax-tabs').find('.tab-content');
		if (tttabsLayout.length) {
			tttabsLayout.fadeTo(0,0);
			setTimeout(function(){
				tttabsLayout.fadeTo(170,1);
			}, 350);
		};

		var srcInclude = $(this).data("ajax-include") || "false",
			idInclude = $(this).attr("href") || "false";

		idInclude = idInclude.replace(/#/g, '');

		if(srcInclude !== "false" && !idInclude !== "false" && !$(this).hasClass('include')){
			$(this).addClass('include');
			$.ajax({
				url: srcInclude,
				success: function(data) {
					var $item = $(data),
						$this = $("#" + idInclude);

					$this.append($item);
					$this.find(".js-init-carousel").each( function() {
						var slick = $(this),
					item =  $(this).data('item'),
					itemmobile =  $(this).data('itemmobile');
						if(slick.item==5){
							slick.slick({
								lazyLoad: 'progressive',
								dots: true,
								arrows: true,
								infinite: true,
								speed: 300,
								slidesToShow: item,
								slidesToScroll: item,
								adaptiveHeight: true,
									responsive: [{
										breakpoint: 1240,
										settings: {
											slidesToShow: 4,
											slidesToScroll: 4
										}
									},
									{
										breakpoint: 1025,
										settings: {
											slidesToShow: 3,
											slidesToScroll: 3
										}
									},
									{
										breakpoint: 791,
										settings: {
											slidesToShow: 2,
											slidesToScroll: 2
										}
									}]
							});
						};
						slick.slick({
							lazyLoad: 'progressive',
							dots: true,
							arrows: true,
							infinite: true,
							speed: 300,
							slidesToShow: item || 4,
							slidesToScroll: item || 4,
							adaptiveHeight: true,
								responsive: [{
									breakpoint: 1025,
									settings: {
										slidesToShow: 3,
										slidesToScroll: 3
									}
								},
								{
									breakpoint: 791,
									settings: {
										slidesToShow: 2,
										slidesToScroll: 2
									}
								},
							{
								breakpoint: 650,
								settings: {
									slidesToShow: itemmobile || 2,
									slidesToScroll: itemmobile || 1
								}
							}]
						});
					});
					var objAjax = $this.closest('.tt-ajax-tabs'),
						objAjaxValueOld = objAjax.innerHeight();

					setTimeout(function(){
						objAjax.removeAttr("style");
						var objAjaxValue =  objAjax.innerHeight();
						if(objAjaxValue < objAjaxValueOld){
							objAjax.css({
								'height': objAjaxValue
							});
						};

						$('#pt-pageContent .js-align-arrow').imagesLoaded().alignmentArrow({
							centeringObject: 'pt-image-box',
							addErrorTop: 'pt-product'
						});
						itemOptionSwitcher();
					}, 1000);
				}
			});
		};



		$('.slick-slider').each(function() {
			 $(this).slick("getSlick").refresh();
		});
		ptpageContent.find('.js-align-arrow').imagesLoaded().alignmentArrow({
			centeringObject: 'pt-image-box',
			addErrorTop: 'pt-product'
		});
	});
	$(document).on('mouseenter', 'body a[data-toggle="tab"]', function(e) {
		var srcInclude = $(this).data("ajax-include") || "false",
			idInclude = $(this).attr("href") || "false";

		idInclude = idInclude.replace(/#/g, '');

		if(srcInclude !== "false" && !idInclude !== "false" && !$(this).hasClass('include')){
			$(this).addClass('include');
			$.ajax({
				url: srcInclude,
				success: function(data) {
					var $item = $(data),
						$this = $("#" + idInclude);

					$this.append($item);
					$this.find(".js-init-carousel").each( function() {
						var slick = $(this),
					item =  $(this).data('item'),
					itemmobile =  $(this).data('itemmobile');
						if(slick.item==5){
							slick.slick({
								lazyLoad: 'progressive',
								dots: true,
								arrows: true,
								infinite: true,
								speed: 300,
								slidesToShow: item,
								slidesToScroll: item,
								adaptiveHeight: true,
									responsive: [{
										breakpoint: 1240,
										settings: {
											slidesToShow: 4,
											slidesToScroll: 4
										}
									},
									{
										breakpoint: 1025,
										settings: {
											slidesToShow: 3,
											slidesToScroll: 3
										}
									},
									{
										breakpoint: 791,
										settings: {
											slidesToShow: 2,
											slidesToScroll: 2
										}
									}]
							});
						};
						slick.slick({
							lazyLoad: 'progressive',
							dots: true,
							arrows: true,
							infinite: true,
							speed: 300,
							slidesToShow: item || 4,
							slidesToScroll: item || 4,
							adaptiveHeight: true,
								responsive: [{
									breakpoint: 1025,
									settings: {
										slidesToShow: 3,
										slidesToScroll: 3
									}
								},
								{
									breakpoint: 791,
									settings: {
										slidesToShow: 2,
										slidesToScroll: 2
									}
								},
							{
								breakpoint: 650,
								settings: {
									slidesToShow: itemmobile || 2,
									slidesToScroll: itemmobile || 1
								}
							}]
						});
					});
					var objAjax = $this.closest('.tt-ajax-tabs'),
						objAjaxValueOld = objAjax.innerHeight();

					setTimeout(function(){
						objAjax.removeAttr("style");
						var objAjaxValue =  objAjax.innerHeight();
						if(objAjaxValue < objAjaxValueOld){
							objAjax.css({
								'height': objAjaxValue
							});
						};

						$('#pt-pageContent .js-align-arrow').imagesLoaded().alignmentArrow({
							centeringObject: 'pt-image-box',
							addErrorTop: 'pt-product'
						});
						itemOptionSwitcher();
					}, 1000);
				}
			});
		};
	});
})(jQuery);

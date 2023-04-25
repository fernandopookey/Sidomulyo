(function($){
	var ptHeaderDropdown = $('header .pt-dropdown-obj'),
		$body = $('body'),
		$html = $('html');
	if(ptHeaderDropdown.length){
	init_header_dropdown();
	};
  function init_header_dropdown(){
		var dropdownPopup = $('.header-popup-bg');
		if(!dropdownPopup.length){
			$body.append('<div class="header-popup-bg"></div>');
		};

		//change value obj - pt-dropdown-obj02
		$body.on('click', '.pt-dropdown-obj02 li a', function(){
			var ptDropdownObj02 = $(this).closest('.pt-dropdown-obj02');

			$(this).closest('li').addClass('active').siblings().removeClass('active');
			ptDropdownObj02.find('.pt-dropdown-toggle .pt-dropdown-value').html($(this).attr("data-value"));
		});

		$('header').on('click', '.js-dropdown', function(e) {
			var ptwindowWidth = window.innerWidth || $window.width(),
				$this = $(this),
				target = e.target,
				objSearch = $('.pt-search'),
				objSearchInput = objSearch.find('.pt-search-input');

			// search
			if ($this.hasClass('pt-search') && $('.pt-dropdown-toggle').is(target)){
				searchPopup();
			};
			function searchPopup(){
				$this.addClass('active');
				$body.addClass('pt-open-search');
				objSearchInput.focus();
				return false;
			};
			if (objSearch.find('.pt-btn-close').is(target)){
				objSearchClose();
				return false;
			};
			function objSearchClose(){
				$this.removeClass('active');
				objSearchInput.blur();
				$body.removeClass('pt-open-search');
				return false;
			};

			// cart, account, multi-ob
			if (!$(this).hasClass('pt-search') && $('.pt-dropdown-toggle').is(target)){

				var srcAjax = $(this).attr('data-ajax')
					srcObj = $('#pt-header .pt-cart .pt-dropdown-menu');

				if (typeof srcAjax !== 'undefined' && !srcObj.hasClass('pt-is-include')) {
					srcObj.addClass('pt-is-include');
					$.ajax({
						url: srcAjax,
						success: function(data) {
							var $item = $(data);
							srcObj.append($item);
						}
					});
				};
				ptwindowWidth <= 1024 ?  popupObjMobile($this) : popupObjDesctop($this);
			};
			function popupObjMobile(obj){
				$('header').find('.js-dropdown.active').removeClass('active');
				obj.toggleClass('active').find('.pt-dropdown-menu').removeAttr("style");
				$html.toggleClass('pt-popup-dropdown');
				$('header .pt-dropdown-menu').perfectScrollbar().addClass('perfectScrollbar');
			};
			function popupObjDesctop(obj){
				var $this = obj,
					target = e.target;

				if ($this.hasClass('active')){
					$this.toggleClass('active').find('.pt-dropdown-menu').slideToggle(200);
					$this.find('.ps-container').removeAttr("style");
					$this
					return;
				};
				$('.pt-desktop-header .js-dropdown').each( function () {
					var $this = $(this);
					if($this.hasClass('active')){
						$this.removeClass('active').find('.pt-dropdown-menu').css("display", "none");
					}
				});
				if ($('.pt-dropdown-toggle').is(target)){
					toggleDropdown($this);
				};

				if($this.hasClass('pt-cart')){
					$.fn.getRealDimensions = function (outer){
						var $this = $(this);
						if ($this.length == 0) {
							return false;
						}
						var $clone = $this.clone()
							.show()
							.css('visibility','hidden')
							.insertAfter($this);
						var result = {
							width:      (outer) ? $clone.outerWidth() : $clone.innerWidth(),
							height:     (outer) ? $clone.outerHeight() : $clone.innerHeight(),
							offsetTop:  $clone.offset().top,
							offsetLeft: $clone.offset().left
						};
						$clone.remove();
						return result;
					};

					var dimensions = $('.pt-cart-content').getRealDimensions().height,
						viewportHeight = window.innerHeight,
						cartPopup = dimensions + $('#pt-header').height(),
						stuckNav = $('.pt-stuck-nav');

					if(stuckNav.hasClass('stuck')){
						var insertValue = viewportHeight - stuckNav.height();
					} else{
						var insertValue = viewportHeight - $('#pt-header').height();
					};

					if(viewportHeight <= cartPopup){
						$('header .pt-dropdown-menu .pt-cart-layout').css({
							'height' : insertValue  + 'px'
						}).perfectScrollbar().addClass('perfectScrollbar');
					};
					$(window).resize(debouncer(function(e){
						var ptCart = $('.pt-cart');
						if(ptCart.hasClass('active')){
							$('.pt-cart .pt-dropdown-toggle').trigger('click');
						};
					}));
				}
			};
			function toggleDropdown(obj){
				obj.toggleClass('active').find('.pt-dropdown-menu').slideToggle(200);
			};

			$(document).mouseup(function(e){
				var ptwindowWidth = window.innerWidth || $window.width();

				if (!$this.is(e.target) && $this.has(e.target).length === 0){
					$this.each(function(){
						if($this.hasClass('active') && $this.hasClass('pt-search')){
							objSearch.find('.pt-btn-close').trigger('click');
						};
						if($this.hasClass('active') && !$this.hasClass('pt-search')){
							if(ptwindowWidth <= 1024){
								closeObjPopupMobile();
							} else {
								$('.js-dropdown').each( function () {
									if($(this).hasClass('active')){
										$(this).removeClass('active').find('.pt-dropdown-menu').css("display", "none");
									}
								});
							};
						};
				  });
				};
				if ($this.find('.pt-mobile-add .pt-close').is(e.target)){
					closeObjPopupMobile();
				};
			});
			function closeObjPopupMobile(){
				$('.js-dropdown.active').removeClass('active');
				$html.removeClass('pt-popup-dropdown');
				$('header .pt-dropdown-menu').removeClass('perfectScrollbar').perfectScrollbar('destroy');
				return false;
			};
		});
  };
})(jQuery);

(function($) {
	// ajax include menu//
	var layoutDesktopMenu = $('#js-include-desktop-menu');
	if (layoutDesktopMenu.length){
		$(window).resize(debouncer(function(e){
			includeMenu();
		}));
		includeMenu();
	};
	function includeMenu(){
		var ttwindowWidth = window.innerWidth || $(window).width(),
			hasalready = $('#js-include-desktop-menu').children().length == 0;

		if(ttwindowWidth > 1024 && hasalready){
			$.ajax({
					url: 'ajax-content/ajax_desktop_menu.html',
					success: function(data) {
						var $item = $(data);
						$('#js-include-desktop-menu').append($item);
						new LazyLoad();
						toggle_header_menu();
						definitionActive();
					}
			});
		};
	};

	//init menu//
	var header_menu_timeout = 200,
		header_menu_delay = 200,
		$body = $('body'),
		$ptDesctopMenu = $('#pt-header .pt-desctop-menu'),
		ptBackToTop = $('.pt-back-to-top');

	if (!$ptDesctopMenu) return;

	function toggle_header_menu() {
		var delay = header_menu_timeout,
			hoverTimer = header_menu_delay,
			timeout1 = false;

		var set_dropdown_maxH = function() {
			var wind_H = window.innerHeight,
				$ptDesctopMenu = $(this).find('.dropdown-menu'),
				menu_top = $ptDesctopMenu.get(0).getBoundingClientRect().top,
				menu_max_H = wind_H - menu_top,
				$ptDesctopMenu_H = $ptDesctopMenu.innerHeight(),
				$btn_top = ptBackToTop;

			if ($ptDesctopMenu_H > menu_max_H) {
				var $body = $('body'),
					$stuck = $('.stuck-nav');
				$ptDesctopMenu.css({
					maxHeight: menu_max_H - 20,
					overflow: 'auto'
				});

				var scrollWidth = function() {
					var $div = $('<div>').css({
						overflowY: 'scroll',
						width: '50px',
						height: '50px',
						visibility: 'hidden'
					});

					$body.append($div);
					var scrollWidth = $div.get(0).offsetWidth - $div.get(0).clientWidth;
					$div.remove();

					return scrollWidth;
				};

				$body.css({
					overflowY: 'hidden',
					paddingRight: scrollWidth()
				});

				$stuck.css({
					paddingRight: scrollWidth()
				});

				$btn_top.css({
					right: scrollWidth()
				});
			}
		};

		if ($ptDesctopMenu.length > 0) {
			$('.pt-megamenu-submenu li a').each(function() {
				if ($(this).find('img').length) {
					$(this).closest('ul').addClass('pt-sub-img');
				}
			});

			$ptDesctopMenu.find('.dropdown-menu').each(function() {
				if ($(this).length) {
					$(this).closest('.dropdown').addClass('pt-submenu');
				}
			});

			$(document).on({
				mouseenter: function(e) {

					var $this = $(this),
						that = this,
						windowW = window.innerWidth || $(window).width();

					if (windowW > 1025 && $body.hasClass('touch-device')) {
						$ptDesctopMenu.find('.dropdown.pt-submenu > a').one("click", false);
					};

					timeout1 = setTimeout(function() {

						var $carousel = $this.find('.pt-menu-slider'),
							$ptDesctopMenu = $this.find('.dropdown-menu');


						$this.addClass('active')
							.find(".dropdown-menu")
							.stop()
							.addClass('hover')
							.fadeIn(hoverTimer);

						if ($ptDesctopMenu.length & !$ptDesctopMenu.hasClass('one-col')) {
							set_dropdown_maxH.call(that);
						}

						if ($carousel.length) {
							if (!$carousel.hasClass('slick-initialized')) {
								$carousel.slick({
									dots: false,
									arrows: true,
									infinite: true,
									speed: 300,
									slidesToShow: 3,
									slidesToScroll: 1,
									adaptiveHeight: true
								});
							}
						};
						$carousel.slick('setPosition');

					}, delay);

				},
				mouseleave: function(e) {
					var $this = $(this),
						$dropdown = $this.find(".dropdown-menu");

					if ($(e.target && e.relatedTarget).parents('.dropdown-menu').length && !$(e.target).parents('.pt-megamenu-submenu').length && !$(e.target).parents('.one-col').length) return;

					if (timeout1 !== false) {
						clearTimeout(timeout1);
						timeout1 = false;
					}

					if ($dropdown.length) {
						$dropdown.stop().fadeOut({
							duration: 0,
							complete: function() {
								$this.removeClass('active')
									.find(".dropdown-menu")
									.removeClass('hover');
							}
						});
					} else {
						$this.removeClass('active')
							.find(".dropdown-menu")
							.removeClass('hover');
					}

					$dropdown.removeAttr('style');

					$body.removeAttr('style');

					$('.stuck-nav').css({
						paddingRight: 'inherit'
					});

					ptBackToTop.css({
						right: 0
					});
				}
			}, '.pt-desctop-menu li');

			$ptDesctopMenu.find('.multicolumn ul li').on('hover', function() {
				var $ul = $(this).find('ul:first');

				if ($ul.length) {
					var windW = window.innerWidth,
						windH = window.innerHeight,
						ulW = parseInt($ul.css('width'), 10),
						thisR = this.getBoundingClientRect().right,
						thisL = this.getBoundingClientRect().left;

					if (windW - thisR < ulW) {
						$ul.removeClass('left').addClass('right');
					} else if (thisL < ulW) {
						$ul.removeClass('right').addClass('left');
					} else {
						$ul.removeClass('left right');
					}
					$ul.stop(true, true).fadeIn(300);
				}
			}, function() {
				$(this).find('ul:first').stop(true, true).fadeOut(300).removeAttr('style');
			});


			$ptDesctopMenu.find('.pt-megamenu-submenu li').on("mouseenter", function() {
				var $ul = $(this).find('ul:first');
				if ($ul.length) {
					var $dropdownMenu = $(this).parents('.dropdown').find('.dropdown-menu'),
						dropdown_left = $dropdownMenu.get(0).getBoundingClientRect().left,
						dropdown_Right = $dropdownMenu.get(0).getBoundingClientRect().right,
						dropdown_Bottom = $dropdownMenu.get(0).getBoundingClientRect().bottom,
						ulW = parseInt($ul.css('width'), 10),
						thisR = this.getBoundingClientRect().right,
						thisL = this.getBoundingClientRect().left;

					if (dropdown_Right - 20 - thisR < ulW) {
						$ul.removeClass('left').addClass('right');
					} else if (thisL - ulW - 20 < dropdown_left) {
						$ul.removeClass('right').addClass('left');
					} else {
						$ul.removeClass('left right');
					}

					$ul.stop(true, true).delay(150).fadeIn(300);

					var ul_bottom = $ul.get(0).getBoundingClientRect().bottom;

					if (dropdown_Bottom < ul_bottom) {
						var move_top = dropdown_Bottom - ul_bottom;
						$ul.css({
							top: move_top
						});
					}
				}
			}).on('mouseleave', function() {
				$(this).find('ul:first').stop(true, true).fadeOut(300).removeAttr('style');
			});

			$ptDesctopMenu.find('.dropdown div').on('hover', function() {
				$(this).children('.pt-title-submenu').toggleClass('active');
			});

		};

		function onscroll_dropdown_hover() {
			var $dropdown_active = $('.dropdown.hover');

			if (!$dropdown_active.find('.dropdown-menu').not('.one-col').length) return;

			if ($dropdown_active.length)
				set_dropdown_maxH.call($dropdown_active);
		};
		$(window).on('scroll', function() {
			onscroll_dropdown_hover();
		});
	};
	toggle_header_menu();

	// .definition of the active menu ite
	function definitionActive(){
		var location = window.location.href;
		$ptDesctopMenu.find('li').each(function() {
			var link = $(this).find('a').attr('href');

			if (location.indexOf(link) !== -1) {
				$(this).addClass('selected').closest('li').siblings().removeClass('selected');
			}
		});
	};
	definitionActive();
	var $fixedbg = $('#fixedbg');

	if (!$fixedbg.length) {
		$body.append('<div id="fixedbg"></div>');
	};

	$(document).on('mouseenter mouseleave', '.pt-desctop-menu li.dropdown.pt-submenu', function(e) {
		var $this = $(this),
			windW = window.innerWidth,
			target = e.target;

		if (e.type === 'mouseenter' && windW > 1024) {
			ttOnHover();
		} else if (e.type === 'mouseleave' && windW > 1024) {
			ttOffHover();
		};
		function ttOnHover(e) {
			if ($('.pt-stuck-nav').hasClass('stuck')) {
				$('#fixedbg').stop().fadeIn(150);
				$('#pt-header').stop().css('zIndex', '50').css('position', 'relative');
				$('.pt-menu-categories.opened .pt-dropdown-menu').stop().css('zIndex', '50').css('visibility', 'hidden');
				$('.pt-menu-categories').addClass('pt-blackout');
			} else {
				$('#fixedbg').stop().fadeIn(150);
				$('#pt-header').stop().css('zIndex', '50').css('position', 'relative');
				$('.pt-menu-categories.opened .pt-dropdown-menu').stop().css('zIndex', '50').css('visibility', 'hidden');
				$('.pt-menu-categories').addClass('pt-blackout');
			};
			return false;
		};

		function ttOffHover(e) {
			$('#fixedbg').stop().fadeOut(150);
			$('.pt-menu-categories.opened .pt-dropdown-menu').stop().css('visibility', 'visible').removeAttr("style");
			$('.pt-menu-categories').removeClass('pt-blackout');
			return false;
		};
	});
	$(window).resize(function() {
		$('#pt-header').stop().removeAttr("style");
		$('#fixedbg').hide();
	});
	$('#pt-header').mouseleave(function(){
		setTimeout(function() {
			$('#pt-header').stop().removeAttr("style");
		}, 150);
	});
	if (document.documentMode || /Edge/.test(navigator.userAgent)) {
		$('#pt-header .pt-desktop-header ul:hidden').each(function(){
			$(this).parent().append($(this).detach());
		});
	};
})(jQuery);
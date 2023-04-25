(function($){
  var $ptPageContent = $('#pt-pageContent'),
	  $ptTabsGorizontal = $ptPageContent.find('.pt-tabs-gorizontal-js'),
	  $ptTabsVertical = $ptPageContent.find('.pt-tabs-vertical-js');

	$.fn.ptTabs = function (options) {
		function ptTabs(tabs){
			var $tabs = $(tabs),
				$head = $tabs.find('.pt-tabs__head'),
				$head_ul = $head.find('> ul'),
				$head_li = $head_ul.find('> li'),
				$head_span = $head_li.find('> span'),
				$border = $head.find('.pt-tabs__border'),
				$body = $tabs.find('.pt-tabs__body'),
				$body_li = $body.find('> div'),
				anim_tab_duration = options.anim_tab_duration || 500,
				anim_scroll_duration = options.anim_scroll_duration || 500,
				breakpoint = 1025,
				scrollToOpenMobile = (options.scrollToOpenMobile !== undefined) ? options.scrollToOpenMobile : true,
				singleOpen = (options.singleOpen !== undefined) ? options.singleOpen : true,
				toggleOnDesktop = (options.toggleOnDesktop !== undefined) ? options.toggleOnDesktop : true,
				effect = (options.effect !== undefined) ? options.effect : 'slide',
				offsetTop = (options.offsetTop !== undefined) ? options.offsetTop : '',
				goToTab = options.goToTab,
				$btn_prev = $('<div>').addClass('tt-tabs__btn-prev disabled'),
				$btn_next = $('<div>').addClass('tt-tabs__btn-next'),
				btn_act = false,
				disableDesctop = options.disableDesctop || false;

			function _closeTab($li, desktop) {
				var anim_obj = {
					duration: anim_tab_duration,
					complete: function () {
						$(this).removeAttr('style');
					}
				};

				function _anim_func($animElem) {
					if(effect === 'toggle') {
						$animElem.hide().removeAttr('style');
					} else if(effect === 'slide') {
						$animElem.slideUp(anim_obj);
					} else {
						$animElem.slideUp(anim_obj);
					}
				};

				var $animElem;

				if(desktop || singleOpen) {
					$head_li.removeClass('active');
					$animElem = $body_li.filter('.active').removeClass('active').find('> div').stop();

					_anim_func($animElem);
				} else {
					var index = $head_li.index($li);

					$li.removeClass('active');
					$animElem = $body_li.eq(index).removeClass('active').find('> div').stop();

					_anim_func($animElem);
				}
			};

			function _openTab($li, desktop, beforeOpen, afterOpen, trigger) {
				var index = $head_li.index($li),
					$body_li_act = $body_li.eq(index),
					$animElem,
					anim_obj = {
						duration: anim_tab_duration,
						complete: function () {
							if(afterOpen) afterOpen($body_li_act);
						}
					};

				function _anim_func($animElem) {
					if(beforeOpen) beforeOpen($li.find('> span'));

					if(effect === 'toggle') {
						$animElem.show();
						if(afterOpen) afterOpen($body_li_act);
					} else if(effect === 'slide') {
						$animElem.slideDown(anim_obj);
					} else {
						$animElem.slideDown(anim_obj);
					}
				};

				$li.addClass('active');
				$animElem = $body_li_act.addClass('active').find('> div').stop();

				_anim_func($animElem);
			};

			function _replaceBorder($this, animate) {
				if($this.length) {
					var span_l = $this.get(0).getBoundingClientRect().left,
						head_l = $head.get(0).getBoundingClientRect().left,
						position = {
							left: span_l - head_l,
							width: $this.width()
						};
				} else {
					var position = {
						left: 0,
						width: 0
					};
				}

				if(animate) $border.stop().animate(position, anim_tab_duration);
				else $border.stop().css(position);
			};

			function _correctBtns($li, func) {
				var span_act_l = $li.find('> span').get(0).getBoundingClientRect().left,
					span_act_r = $li.find('> span').get(0).getBoundingClientRect().right,
					head_pos = {
						l: $head.get(0).getBoundingClientRect().left,
						r: $head.get(0).getBoundingClientRect().right
					};

				if(span_act_l < head_pos.l) {
					_replace_slider(Math.ceil(head_pos.l - span_act_l), head_pos, false, function () {
						func();
					});
				} else if(span_act_r > head_pos.r) {
					_replace_slider(Math.ceil(span_act_r - head_pos.r) * -1, head_pos, false, function () {
						func();
					});
				} else {
					func();
				}
			};

			$head.on('click', '> ul > li > span', function (e, trigger) {
				var $this = $(this),
					$li = $this.parent(),
					wind_w = window.innerWidth,
					desktop = wind_w > breakpoint,
					trigger = (trigger === 'trigger') ? true : false;

				if($li.hasClass('active')) {
					if(desktop && !toggleOnDesktop) return;

					_closeTab($li, desktop);

					_replaceBorder('', true);
				} else {
					_correctBtns($li, function () {
						_closeTab($li, desktop);

						_openTab($li, desktop,
							function($li_act) {
								if(desktop) {
									var animate = !trigger;

									_replaceBorder($li_act, animate);
								}
							},
							function ($body_li_act) {
								if(!desktop && !trigger && scrollToOpenMobile) {
									var tob_t = $body_li_act.offset().top;
									$('html, body').stop().animate({ scrollTop: tob_t }, {
										duration: anim_scroll_duration
									});
								}
							}
						);
					});
				}
			});

			$body.on('click', '> div > span', function (e) {
				var $this = $(this),
					$li = $this.parent(),
					index = $body_li.index($li);

				$head_li.eq(index).find('> span').trigger('click');
			});

			function _toTab(tab, scrollTo, focus) {
				var wind_w = window.innerWidth,
					desktop = wind_w < breakpoint,
					header_h = 0,
					$sticky = $(offsetTop),
					$openTab = $head_li.filter('[data-tab="' + tab + '"]'),
					$scrollTo = $(scrollTo),
					toTab = {};

				if(desktop && $sticky.length) {
					header_h = $sticky.height();
				}

				if(!$openTab.hasClass('active')) {
					toTab = { scrollTop: $tabs.offset().top - header_h };
				}

				$('html, body').stop().animate(toTab, {
					duration: anim_scroll_duration,
					complete: function () {
						_correctBtns($openTab, function () {
							_closeTab($openTab, desktop);

							_openTab($openTab, desktop,
								function($li_act) {
									_replaceBorder($li_act, true);
								},
								function () {
									if ($scrollTo.length) {
										$('html, body').animate({ scrollTop: $scrollTo.offset().top - header_h }, {
											duration: anim_scroll_duration,
											complete: function () {
												var $focus = $(focus);

												if ($focus.length) $focus.focus();
											}
										});
									}
								}
							);
						})
					}
				});
			};

			if($.isArray(goToTab) && goToTab.length) {
				$(goToTab).each(function () {
					var elem = this.elem,
						tab = this.tab,
						scrollTo = this.scrollTo,
						focus = this.focus;

					$(elem).on('click', function (e) {
						_toTab(tab, scrollTo, focus);

						e.preventDefault();
						return false;
					});
				});
			}

			function _btn_disabled(head_pos) {
				var span_pos = {
					l: $head_li.first().find('> span').get(0).getBoundingClientRect().left,
					r: $head_li.last().find('> span').get(0).getBoundingClientRect().right
				};

				if(span_pos.l < head_pos.l) $btn_prev.removeClass('disabled');
				else $btn_prev.addClass('disabled');

				if(span_pos.r > head_pos.r) $btn_next.removeClass('disabled');
				else $btn_next.addClass('disabled');
			};

			function _replace_slider(difference, head_pos, resize, afterReplace) {
				var ul_pos = parseInt($head_ul.css('left'), 10),
					border_pos = parseInt($border.css('left'), 10),
					duration = (!resize) ? anim_tab_duration : 0,
					anim_pos = {
						'left': ul_pos + difference
					};

				if(resize) {
					$head_ul.css(anim_pos);
					_btn_disabled(head_pos);
				} else {
					$border.animate({ 'left': border_pos + difference }, anim_tab_duration);

					$head_ul.animate(anim_pos, {
						duration: duration,
						complete: function () {
							_btn_disabled(head_pos);
							if(afterReplace) afterReplace();
							btn_act = false;
						}
					});
				}
			};

			$tabs.on('click', '.pt-tabs__btn-prev, .pt-tabs__btn-next', function () {
				var $btn = $(this);

				if($btn.hasClass('disabled') || btn_act) return;

				btn_act = true;

				var head_pos = {
						l: $head.get(0).getBoundingClientRect().left,
						r: $head.get(0).getBoundingClientRect().right
					};

				if($btn.hasClass('tt-tabs__btn-next')) {
					$head_span.each(function (i) {
						var $this = $(this),
							this_r = $this.get(0).getBoundingClientRect().right;

						if(this_r > head_pos.r) {
							_replace_slider(Math.ceil(this_r - head_pos.r) * -1, head_pos);
							return false;
						}
					});
				} else if($btn.hasClass('tt-tabs__btn-prev')) {
					$($head_span.get().reverse()).each(function (i) {
						var $this = $(this),
							this_l = $this.get(0).getBoundingClientRect().left;

						if(this_l < head_pos.l) {
							_replace_slider(Math.ceil(head_pos.l - this_l), head_pos);
							return false;
						}
					});
				}
			});
			$(window).on('resize load', function () {
				var wind_w = window.innerWidth,
					desktop = wind_w > breakpoint,
					head_w = $head.innerWidth(),
					li_w = 0;

				$head_li.each(function () {
					li_w += $(this).innerWidth();
				});


				if(desktop && !disableDesctop === true){
					var $li_act = $head_li.filter('.active'),
						$span_act = $li_act.find('> span');

					if(!singleOpen && $span_act.length > 1) {
						var $save_active = $li_act.first();

						_closeTab('', desktop);
						_openTab($save_active, desktop);
					}

					if(li_w > head_w) {
						$head.addClass('slider').append($btn_prev).append($btn_next);

						$head_ul.css({ 'margin-right' : (li_w - $head.innerWidth()) * -1 });

						if($span_act.length) {

							var span_act_r = $span_act.get(0).getBoundingClientRect().right,
								span_last_r = $head_span.last().get(0).getBoundingClientRect().right,
								head_pos = {
									l: $head.get(0).getBoundingClientRect().left,
									r: $head.get(0).getBoundingClientRect().right
								};

							if(span_act_r > head_pos.r) {
								_replace_slider(Math.ceil(span_act_r - head_pos.r) * -1, head_pos, true);
							} else if(span_last_r < head_pos.r) {
								_replace_slider(head_pos.r - span_last_r, head_pos, true);
							}

							_replaceBorder($span_act, false);
						}

					} else {
						$head_ul.removeAttr('style');
						$btn_prev.remove();
						$btn_next.remove();
						$head.removeClass('slider');
						_replaceBorder($span_act, false);
					}

					$head.css({ 'visibility': 'visible' });
				} else {
				  $border.removeAttr('style');
				}
			});

			$head_li.filter('[data-active="true"]').find('> span').trigger('click', ['trigger']);

			return $tabs;
		};

		var tabs = new ptTabs($(this).eq(0));

		return tabs;
	};
	// Tabs Gorizontal
	if ($ptTabsGorizontal.length) {
		  $ptTabsGorizontal.ptTabs({
			singleOpen: true,
			anim_tab_duration: 270,
			anim_scroll_duration: 500,
			toggleOnDesktop: false,
			scrollToOpenMobile: true,
			effect: 'slide',
			offsetTop: '.pt-header[data-sticky="true"]'
		});
	};
	// Tabs Vertical
	if ($ptTabsVertical.length) {
		  $ptTabsVertical.ptTabs({
			singleOpen: false,
			anim_tab_duration: 270,
			anim_scroll_duration: 500,
			toggleOnDesktop: false,
			scrollToOpenMobile: true,
			effect: 'slide',
			disableDesctop: true,
			offsetTop: '.pt-header[data-sticky="true"]'
		});
	  };
})(jQuery);

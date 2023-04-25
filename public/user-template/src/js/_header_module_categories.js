(function($){
	var $ptHeader = $('header'),
			$body = $('body'),
			$stucknav = $ptHeader.find('.pt-stuck-nav'),
			$obj = $(".pt-menu-categories"),
			$window = $(window),
			$objLi = $obj.find('nav > ul > li'),
			$subMenu = $(this).find('.dropdown-menu'),
			mobileCategoriesToggle = $ptHeader.find('.pt-categories-toggle');

		if(!$obj.length) return;

		//event open menu categories
		$body.on('click', '.pt-menu-categories button', function(e){
				e.preventDefault();
				$(this).closest('.pt-menu-categories').toggleClass('opened').find('.pt-dropdown-menu').slideToggle(200);
		});

		//determination sub menu
		(function subMenuCategories(){
				$obj.find('nav > ul > li').each(function(){
						var ptSubmenu = $(this).find('.dropdown-menu');
						if(ptSubmenu.length){
								$(this).closest('li').addClass('pt-submenu');
						}
				});
		})();

		//add active class menu
		(function menuHover(){
				$obj.find(".pt-dropdown-menu li").hover(function(e){
					var $this = $(this),
					ptSubmenu = $(this).find('.dropdown-menu');
					$(this).toggleClass('acitve', e.type === 'mouseenter');
					if(ptSubmenu.length){
							hittingSubmenu($this);
					}
				});
		})();

		//check popup past viewport
		$obj.find('.pt-megamenu-submenu ul li').on("mouseenter", function() {
					var $ul = $(this).find('ul:first');
					if ($ul.length) {
							var windW = window.innerWidth,
									ulW = parseInt($ul.css('width'), 10) + 20,
								thisR = this.getBoundingClientRect().right,
								thisL = this.getBoundingClientRect().left;

						if (windW - thisR < ulW){
								$ul.addClass('right');
						} else if (thisL < ulW) {
							$ul.removeClass('right');
						};
				}
		}).on('mouseleave', function() {
			 $(this).find('ul:first').removeClass('right-popup');
		});

		//check hitting the submenu
		function hittingSubmenu($this){
			var menuItemOffset = $this.offset().top,
					menuPopupObj = $this.find('.dropdown-menu'),
					menuPopupValue = menuPopupObj.offset().top + menuPopupObj.height();

			if(menuItemOffset > menuPopupValue){
					$this.css({
							position: 'relative'
					});
					$this.find('.dropdown-menu').css({
							top: 'inherit',
							bottom: '-13' + 'px'
					});
			}
		};

		//detach
		(function detachCategories(){
				if($stucknav.hasClass('disabled')) return;
				var //desctop
						$ptDesctopParentMenuCategories = $ptHeader.find('.pt-desctop-parent-menu-categories'),
						$ptStuckParentMenuCategories = $ptHeader.find('.pt-stuck-desctop-menu-categories'),
						//mobile
						$ptMobileParentMenuCategories = $ptHeader.find('.pt-mobile-parent-menu-categories'),
						$ptStuckMobileMenuCategories = $ptHeader.find('.pt-stuck-mobile-menu-categories');

				$window.scroll(function(){
						var HeaderTop = $('header').innerHeight();
						if($window.scrollTop() > HeaderTop){
								$ptStuckParentMenuCategories.append($ptDesctopParentMenuCategories.find('.pt-menu-categories').detach());
								$ptStuckMobileMenuCategories.append($ptMobileParentMenuCategories.find('.pt-categories-toggle').detach());
						} else {
								$ptDesctopParentMenuCategories.append($ptStuckParentMenuCategories.find('.pt-menu-categories').detach());
								$ptMobileParentMenuCategories.append($ptStuckMobileMenuCategories.find('.pt-categories-toggle').detach());
						};
				});
		})();

})(jQuery);

(function ($){
		var $window = $(window),
				$html = $('html'),
				$ptHeader = $('header'),

				//header stuck
				$stucknav = $ptHeader.find('.pt-stuck-nav'),
				//header menu
				$ptDesctopMenu = $ptHeader.find('.pt-desctop-menu'),
				$ptDesctopParentMenu = $ptHeader.find('.pt-desctop-parent-menu'),
				$ptMobileParentMenu = $ptHeader.find('.pt-mobile-parent-menu'),
				$ptMobileParentMenuChildren = $ptMobileParentMenu.children(),
				$ptStuckParentMenu = $ptHeader.find('.pt-stuck-parent-menu'),
				//header search
				$ptSearchObj = $ptHeader.find('.pt-search'),
				$ptDesctopParentSearch = $ptHeader.find('.pt-desctop-parent-search'),
				$ptMobileParentSearch = $ptHeader.find('.pt-mobile-parent-search'),
				$ptStuckParentSearch = $ptHeader.find('.pt-stuck-parent-search'),
				$ptSearchObjPopupInput = $ptSearchObj.find('.pt-search-input'),
				$ptSearchObjPopupResults = $ptSearchObj.find('.search-results'),
				//header cart
				$ptcartObj = $ptHeader.find('.pt-cart'),
				$ptDesctopParentCart = $ptHeader.find('.pt-desctop-parent-cart'),
				$ptMobileParentCart = $ptHeader.find('.pt-mobile-parent-cart'),
				$ptStuckParentCart = $ptHeader.find('.pt-stuck-parent-cart');
				//header account
				$ptAccountObj = $ptHeader.find('.pt-account'),
				$ptDesctopParentAccount = $ptHeader.find('.pt-desctop-parent-account'),
				$ptMobileParentAccount = $ptHeader.find('.pt-mobile-parent-account'),
				$ptStuckParentAccount = $ptHeader.find('.pt-stuck-parent-account'),
				//header compare
				$ptCompareObj = $ptHeader.find('.pt-compare'),
				$ptDesctopParentCompare = $ptHeader.find('.pt-desctop-parent-compare'),
				$ptMobileParentCompare = $ptHeader.find('.pt-mobile-parent-compare'),
				$ptStuckParentCompare = $ptHeader.find('.pt-stuck-parent-compare'),
				//header wishlist
				$ptWishlistObj = $ptHeader.find('.pt-wishlist'),
				$ptDesctopParentWishlist = $ptHeader.find('.pt-desctop-parent-wishlist'),
				$ptMobileParentWishlist = $ptHeader.find('.pt-mobile-parent-wishlist'),
				$ptStuckParentWishlist = $ptHeader.find('.pt-stuck-parent-wishlist');


		var ptwindowWidth = window.innerWidth || $window.width();

		// determination ie
		if (getInternetExplorerVersion() !== -1) {
					$html.addClass("ie");
		};
		// header
		initStuck();
		if ($ptDesctopParentSearch.length) {
				mobileParentSearch();
		};
		if ($ptcartObj.length) {
				mobileParentCart();
		};
		var ptCachedWidth = $window.width();
		$window.on('resize', function(){
				var newWidth = $window.width();
				if(newWidth !== ptCachedWidth){
						ptCachedWidth = newWidth;
						var ptwindowWidth = window.innerWidth || $window.width();
						if ($ptDesctopParentSearch.length){
								mobileParentSearch();
						};
						if ($ptcartObj.length){
								mobileParentCart();
						};
						if ($ptDesctopParentAccount.length){
								mobileParentAccount();
						};
						if ($ptDesctopParentWishlist.length){
								mobileParentWishlist();
						};
						if ($ptDesctopParentCompare.length){
								mobileParentCompare();
						};
				}
		});
		function getInternetExplorerVersion(){
				var rv = -1;
				if (navigator.appName === 'Microsoft Internet Explorer') {
					var ua = navigator.userAgent;
					var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
					if (re.exec(ua) != null)
						rv = parseFloat(RegExp.$1);
				} else if (navigator.appName === 'Netscape') {
					var ua = navigator.userAgent;
					var re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
					if (re.exec(ua) != null)
						rv = parseFloat(RegExp.$1);
				}
				return rv;
		};
		/**
		 * Stuck init. Properties: on/off
		 * @value = 'off', default empty
		 */
		function initStuck(value) {
			if($stucknav.hasClass('disabled')) return;

			var value = value || false,
				ie = (getInternetExplorerVersion() !== -1) ? true : false;

			if (value === 'off') return false;
			var n = 0;
			$window.scroll(function() {
				var HeaderTop = $('header').innerHeight();
				if ($window.scrollTop() > HeaderTop) {
					if ($stucknav.hasClass('stuck')) return false;
					$stucknav.hide();
					$stucknav.addClass('stuck');
					window.innerWidth < 1025 ? $ptStuckParentMenu.append($ptMobileParentMenuChildren.detach()) : $ptStuckParentMenu.append($ptDesctopMenu.detach());
					$ptStuckParentCart.append($ptcartObj.detach());
					$ptStuckParentCompare.append($ptCompareObj.detach());
					$ptStuckParentWishlist.append($ptWishlistObj.detach());
					$ptStuckParentAccount.append($ptAccountObj.detach());
					$ptStuckParentSearch.append($ptSearchObj.detach());


					if ($stucknav.find('.pt-stuck-cart-parent > .pt-cart > .dropdown').hasClass('open') || ie)
						$stucknav.stop().show();
					else
						$stucknav.stop().fadeIn(300);

				} else {
					if (!$stucknav.hasClass('stuck')) return false;
					$stucknav.hide();
					$stucknav.removeClass('stuck');
					if (window.innerWidth < 1025) {
						$ptMobileParentMenu.append($ptMobileParentMenuChildren.detach());
						$ptMobileParentCart.append($ptcartObj.detach());
						$ptMobileParentSearch.append($ptSearchObj.detach());
						return false;
					}
					$ptDesctopParentMenu.append($ptDesctopMenu.detach());
					$ptDesctopParentCart.append($ptcartObj.detach());
					$ptDesctopParentCompare.append($ptCompareObj.detach());
					$ptDesctopParentWishlist.append($ptWishlistObj.detach());
					$ptDesctopParentAccount.append($ptAccountObj.detach());
					$ptDesctopParentSearch.append($ptSearchObj.detach());
				}
			});
			$window.resize(function() {
				if (!$stucknav.hasClass('stuck')) return false;
				if (window.innerWidth < 1025) {
					$ptDesctopParentMenu.append($ptDesctopMenu.detach());
					$ptStuckParentMenu.append($ptMobileParentMenuChildren.detach());
				} else {
					$ptMobileParentMenu.append($ptMobileParentMenuChildren.detach());
					$ptStuckParentMenu.append($ptDesctopMenu.detach());
				}
			});
		};
		function mobileParentSearch(){
				if (window.innerWidth < 1025) {
						if ($ptMobileParentSearch.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptMobileParentSearch.append($ptSearchObj.detach());
				} else {
						if ($ptDesctopParentSearch.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptDesctopParentSearch.append($ptSearchObj.detach());
				};
		};
		function mobileParentCart(){
				if (window.innerWidth < 1025) {
						if ($ptMobileParentCart.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptMobileParentCart.append($ptcartObj.detach());
				} else {
						if ($ptDesctopParentCart.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptDesctopParentCart.append($ptcartObj.detach());
				};
		};
		function mobileParentAccount(){
				if (window.innerWidth < 1025) {
						if ($ptMobileParentAccount.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptMobileParentAccount.append($ptAccountObj.detach());
				} else {
						if ($ptDesctopParentAccount.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptDesctopParentAccount.append($ptAccountObj.detach());
				};
		};
		function mobileParentCompare(){
				if (window.innerWidth < 1025) {
						if ($ptMobileParentCompare.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptMobileParentCompare.append($ptCompareObj.detach());
				} else {
						if ($ptDesctopParentCompare.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptDesctopParentCompare.append($ptCompareObj.detach());
				};
		};
		function mobileParentWishlist(){
				if (window.innerWidth < 1025) {
						if ($ptMobileParentWishlist.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptMobileParentWishlist.append($ptWishlistObj.detach());
				} else {
						if ($ptDesctopParentWishlist.children().lenght) return false;
						if ($('.stuck').length) return false;
						$ptDesctopParentWishlist.append($ptWishlistObj.detach());
				};
		};
})(jQuery);











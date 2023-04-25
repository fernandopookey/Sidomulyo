(function($){
	var $ptHeader = $('#pt-header');
	(function initTopPanel(){
			var objTopPanel = $ptHeader.find('.pt-top-panel'),
					objTopPanelLink = objTopPanel.find(".js-toppanel-link-dropdown");
			//close block
			objTopPanel.each(function(){
					$(this).on('click', '.js-removeitem', function(){
							$(this).closest(objTopPanel).slideUp(200);
					});
			});
			//link dropdown
			function ptLinkDropdown(){
					var windW = window.innerWidth || $window.width();

					$(document).on('mouseenter mouseleave click', '.js-toppanel-link-dropdown', function(e){
							var $this = $(this),
									target = e.target,
									windW = window.innerWidth;

							if (e.type === 'mouseenter' && e.relatedTarget && windW > 1024) {
									ttOnHover();
								} else if (e.type === 'mouseleave' && e.relatedTarget && windW > 1024){
									ttOffHover();
							};
							if (e.type === 'click' && windW <= 1024){
									$this.toggleClass('is-active');
							}
							function ttOnHover(e){
									$this.addClass('is-active');
									return false;
							};
							function ttOffHover(e){
									$this.removeClass('is-active');
									return false
							};
					});
			};
			ptLinkDropdown();
			$(window).resize(function(e){
				checkOpenObject();
			});
			function checkOpenObject(){
				objTopPanel.find('.js-toppanel-link-dropdown').each(function(){
						if($(this).hasClass("is-active")){
							$(this).removeClass('is-active');
						};
				});
			};
			$(document).mouseup(function(e){
					if (! objTopPanel.is(e.target) &&  objTopPanel.has(e.target).length === 0){
						 objTopPanelLink.removeClass('is-active');
					}
			});
	}());
})(jQuery);

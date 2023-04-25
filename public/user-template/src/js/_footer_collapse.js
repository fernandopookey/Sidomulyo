/*
	Footer mobile collapse
*/
(function($){
		var footerMobileCollapse = $('#pt-footer .pt-collapse-title');
		if (footerMobileCollapse.length){
					 ptFooterCollapse();
		};
		function ptFooterCollapse() {
				footerMobileCollapse.on('click',function(e){
					e.preventDefault;
					var ptlayout = $(this).next(),
							ptwindowWidth = window.innerWidth || $window.width();

					$(this).toggleClass('pt-open');
					if(ptlayout.css('display') == 'none' &&  ptwindowWidth <= 790){
						ptlayout.animate({height: 'show'}, 300);
					}else if(ptlayout.css('display') == 'block' &&  ptwindowWidth <= 790){
						ptlayout.animate({height: 'hide'}, 300);
					}
				});
		};
})(jQuery);

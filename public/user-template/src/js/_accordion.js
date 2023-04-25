/*
(*page-sizing-guide.html, page-faq.html)
*/
(function($){
	var methods = {
			init: function(options){
					return this.each(function(){
							var obj = $(this),
							objOpen = obj.find('.pt-item.active'),
							objItemTitle = obj.find('.pt-item .pt-accordeon-title');

							objOpen.find('.pt-accordeon-content').slideToggle(100);

							objItemTitle.on('click', function(){
									$(this).next().slideToggle(200).parent().toggleClass('active');
							});
					});
			}
	};
	$.fn.accordeon = function(action){
		 if(methods[action]){
				 return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
		 } else if(typeof action === 'object' || !action){
				 return methods.init.apply(this, arguments);
		 } else {
				 console.info('Action ' +action+ 'not found this plugin');
				 return this;
		 }
	};
	$('#pt-pageContent .pt-accordeon').accordeon();
})(jQuery);

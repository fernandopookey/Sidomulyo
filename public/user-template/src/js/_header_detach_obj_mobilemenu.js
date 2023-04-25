(function($){
	var mobileMenuToggle = $('.pt-menu-toggle');

	var mobileCaterorieMenu = $('#mobile-caterorie-menu'),
			panelMenu = $('.panel-menu');

	if(mobileCaterorieMenu.length){
		var objCategories = mobileCaterorieMenu.find('ul:first-child').detach();
		panelMenu.find('ul:first-child').prepend("<li id='wrap-categories'><a href='index.html'>CATEGIRIES</a></li>");
		panelMenu.find('#wrap-categories').append(objCategories);
	}

	if(mobileMenuToggle.length){
		mobileMenuToggle.initMM({
			enable_breakpoint: true,
			mobile_button: true,
			breakpoint: 1025,
			menu_class: 'mobile-main-menu',
			external_container: true
		});
	};
})(jQuery);

(function($){
		"use strict";

		var settings = {
				entryPointInclude : $('#entrypoint-objects'),
				classWrapperLayout: 'pt-item-wrapper'
		};
		var methods = {
				init: function(options){
						return this.each(function(){
								var objVar = {
										objClass : $(this).attr("class").split(' ')[0],
										objTitle: options.titleObj,
										objAddClass: options.addClassObj || false,
										wrapperAddClass: options.addClassWrapper || false,
										createBlok: options.createBlok,
										objinnerEntryPoint: options.innerEntryPoint
								};
								methods.insertMobile(objVar, options);
						});
				},
				insertMobile: function(objVar,options){
						var setting = $.extend(settings, options);
						setting.entryPointInclude.attr("dataDetach", "true");

						if(objVar.createBlok){
								var checkForExistence = setting.entryPointInclude.find('.' + objVar.createBlok);
								if(!checkForExistence.length){
									setting.entryPointInclude.append("<div class='external-item "+ objVar.createBlok +"'><div class='external-item-title'>" + setting.createBlokTitle + "</div><div class='external-item-content'></div></div>");
								};

								if(typeof objVar.objinnerEntryPoint == "undefined"){
										var objDesktop = $("." + objVar.objClass).children().clone().get(0),
										location = setting.entryPointInclude.find('.' + objVar.createBlok + ' .external-item-content');
								} else {
									var objDesktop = $("." + objVar.objClass).find("." + objVar.objinnerEntryPoint).children().clone().get(0),
									location = setting.entryPointInclude.find('.' + objVar.createBlok + ' .external-item-content');
								};

								location.append(objDesktop);

								return false;
						};

						if(typeof objVar.objinnerEntryPoint == "undefined"){
								var objDesktop = $("." + objVar.objClass).children().clone().get(0);
						} else {
							 var objDesktop = $("." + objVar.objClass).find("." + objVar.objinnerEntryPoint).children().clone().get(0);
						};

						if(typeof objVar.objTitle != "undefined"){
								 setting.entryPointInclude.append("<div class='external-item "+ objVar.objClass +"'><div class='external-item-title'>" + setting.titleObj + "</div><div class='external-item-content'>" + objDesktop.outerHTML + "</div></div>");
						} else {
							setting.entryPointInclude.append("<div class='external-item "+ objVar.objClass +"'><div class='external-item-content'>" + objDesktop.outerHTML + "</div></div>");
						};
						if(typeof objVar.objTitle == "undefined"){
								setting.entryPointInclude.find('.' + objVar.objClass).find('.external-item-content > *:first-child').addClass(objVar.objAddClass);
						};
						if(typeof objVar.objWrapperAddClass != "false"){
							settings.entryPointInclude.addClass(String(options.wrapperAddClass));
						}
				}
		};
		$.fn.movingObjects = function(action){
			 if(methods[action]){
					 return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
			 } else if(typeof action === 'object' || !action){
					 return methods.init.apply(this, arguments);
			 } else {
					 console.info('Action ' +action+ 'not found this plugin');
					 return this;
			 }
		};
		var $header = $('#pt-header');

		$header.find('.single-button').movingObjects({
				wrapperAddClass: 'extra-layout'
		});

		if($header.hasClass('header-mobile-type-02')){
				$header.find('.pt-desctop-parent-account').movingObjects({
						innerEntryPoint: 'pt-dropdown-inner',
						createBlok:'my-account',
						createBlokTitle: 'My Account'
				});
				$header.find('.pt-desctop-parent-compare').movingObjects({
						createBlok:'my-account',
						createBlokTitle: 'My Account'
				});
				$header.find('.pt-desctop-parent-wishlist').movingObjects({
					createBlok:'my-account',
					createBlokTitle: 'My Account'
				});
		};

		$header.find('.pt-desctop-parent-language').movingObjects({
				titleObj: 'Languages',
				innerEntryPoint: 'pt-dropdown-inner'
		});
		$header.find('.pt-desctop-parent-currency').movingObjects({
				titleObj: 'Currency',
				innerEntryPoint: 'pt-dropdown-inner'
		});
		$header.find('.pt-desctop-parent-submenu').movingObjects({
				addClassObj: 'list-icon'
		});
		$header.find('.pt-desctop-parent-account').movingObjects({
			innerEntryPoint: 'pt-dropdown-inner',
			createBlok:'my-account',
			createBlokTitle: 'My Account'
		});
})(jQuery);
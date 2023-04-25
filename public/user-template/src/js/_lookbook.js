(function($){
	var ptLookbook = $('#pt-pageContent .pt-lookbook');
	if(!ptLookbook.length) return;
	(function(){
		//add lookbook popup
		var	$body = $('body');
			objPopup = $('.pt-lookbook-popup'),
			ptwindowWidth = window.innerWidth || $window.width();

		if(!objPopup.length){
			$body.append('<div class="pt-lookbook-popup"><div class="pt-lookbook-container"></div></div>');
		};

		$body.on('mouseenter click', '.pt-hotspot', function(e){
			var $this = $(this),
				target = e.target,
				windW = window.innerWidth;

			if(e.type === 'mouseenter' && windW >= 789){
				onHover();
			};

			if(ptwindowWidth <= 789){
				if ($('.pt-btn-close').is(e.target)){
					closePopupMobile();
					return false;
				};
			};

			function closePopupMobile(){
				if($('.pt-lookbook-container').is(':has(div)')){
				  var checkPopupContent = $('.pt-lookbook-container').find('.pt-hotspot-content').detach();
				  $('.pt-hotspot.active').find('.pt-content-parent').append(checkPopupContent);
				};
				$('.pt-lookbook').find('.pt-hotspot.active').each(function(index) {
				  var $this = $(this),
					valueTop = $this.attr('data-top') + '%',
					valueLeft = $this.attr('data-left') + '%';

				$this.removeClass('active').removeAttr("style").css({
					'top' : valueTop,
					'left' : valueLeft,
				}).find('.pt-btn').removeAttr("style").next().removeAttr("style");
				});
			};

			if(e.type === 'click' && windW < 789 && $('.pt-btn').is(e.target)){
				var valueTop = $this.attr('data-top') + '%',
					valueLeft = $this.attr('data-left') + '%';

				$this.find('.pt-btn').css({
					'top' : valueTop,
					'left' : valueLeft
				});
				$this.css({
					'top' : '0px',
					'left' : '0px',
					'width' : '100%',
					'height' : '100%'
				});
				$this.addClass('active').siblings().removeClass('active');
				$this.find('.pt-content-parent').fadeIn(200);
			};

			function onHover(e){
				checkclosePopupDesktop();
				// detach
				var objTop0 = parseInt($this.offset().top, 10),
					objLeft = $this.offset().left,
					objContent = $this.addClass('active').find('.pt-hotspot-content').detach(),
					ptCenterBtn = $('.pt-btn').innerHeight() / 2,
					objTop = objTop0 + ptCenterBtn,
					ptWidthPopup = $('.pt-hotspot-content').innerWidth();

				$('.pt-lookbook-popup').find('.pt-lookbook-container').append(objContent);

				// show
				var halfWidth =  ptwindowWidth / 2,
					objLeftFinal = 0;

				if(halfWidth < objLeft){
					objLeftFinal = objLeft - ptWidthPopup - 7;
					popupShowLeft(objLeftFinal);
				} else{
					objLeftFinal = objLeft + 45;
					popupShowRight(objLeftFinal);
				};

				function popupShowLeft(objLeftFinal){
					$('.pt-lookbook-popup').css({
						'top' : objTop,
						'left' : objLeftFinal,
						'display' : 'block'
					}, 300).animate({
						marginLeft: 26 + 'px',
						opacity: 1
					}, 300);
				};
				function popupShowRight(objLeftFinal){
					$('.pt-lookbook-popup').css({
						'top' : objTop,
						'left' : objLeftFinal,
						'display' : 'block'
					}).animate({
						marginLeft: -26 + 'px',
						opacity: 1
					});
				};
			};
			function checkclosePopupDesktop(){
				var detachContentPopup = $('.pt-lookbook-popup').removeAttr("style").find('.pt-hotspot-content').detach();
				$('.pt-hotspot.active').removeClass('active').find('.pt-content-parent').append(detachContentPopup);
				return false;
			};
		});
		$(window).resize(debouncer(function(e) {
			var ptwindowWidth = window.innerWidth || $window.width();
			if(ptwindowWidth <= 789){
				closePopupMobile();
			} else {
				closePopupDesctop();
				checkclosePopupMobile();
			};
		}));
		$('body').on('click', '.pt-lookbook-popup .pt-btn-close', function(e){
			e.preventDefault();
			closePopupDesctop();
		});
		$('body').on('click', '.pt-hotspot-content .pt-btn-close', function(e){
			e.preventDefault();
			closePopupDesctop();
		});

		function closePopupMobile(){
			var detachContentPopup = $('.pt-lookbook-popup').removeAttr("style").find('.pt-hotspot-content').detach();
			$('.pt-hotspot.active').removeClass('active').find('.pt-content-parent').append(detachContentPopup);
		};
		function closePopupDesctop(){
			var detachContentPopup = $('.pt-lookbook-popup').removeAttr("style").find('.pt-hotspot-content').detach();
			$('.pt-hotspot.active').removeClass('active').find('.pt-content-parent').append(detachContentPopup);
		};
		function checkclosePopupMobile(){
			$('.pt-hotspot').find('.pt-content-parent').each(function() {
				var $this = $(this);
				if($this.css('display') == 'block'){
					var $thisParent = $this.closest('.pt-hotspot'),
						valueTop = $thisParent.attr('data-top') + '%',
						valueLeft = $thisParent.attr('data-left') + '%';

					$this.removeAttr("style").prev().removeAttr("style");
					$thisParent.removeAttr("style").css({
						'top' : valueTop,
						'left' : valueLeft,
					});
				};
			});
		};
	})();
})(jQuery);

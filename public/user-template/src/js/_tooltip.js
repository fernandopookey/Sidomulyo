(function($){
	var $body = $('body');
	var tooltip = {
		html_i: '#pt-tooltip-popup',
		html_s: '<div id="pt-tooltip-popup"><span>',
		html_e: '</span><i></i></div>',
		tp_attr: '[data-tooltip]',
		tp_mod: false,
		init: function(){
			this.tp_mod = this.get_tp_mod();
			if(!this.tp_mod.length || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) return false;
			this.handler();
		},
		get_tp_attr: function(){
			return this.tp_attr;
		},
		get_tp_mod: function(){
			return $(this.get_tp_attr());
		},
		get_w_width: function(){
			return window.innerWidth || $window.width();
		},
		get_html_obj: function(name){
			return this.html_s + name + this.html_e;
		},
		check_pr_page_swatches: function($obj){
			var swc = $obj.closest('.pt-swatches-container');
			var search = $obj.closest('.pt-search');
			var qv = $obj.closest('.pt-btn-quickview');
			var cc = $obj.closest('.pt-collapse-content');
			var wl = $obj.closest('.wlbutton-js');
			if(!swc.length && !search.length && !qv.length && !cc.length && !wl.length) return false;
			return true;
		},
		handler: function(){
			var _ = this;
			$('body').on('mouseenter mouseleave', this.get_tp_attr(), function(e){
				var ww = _.get_w_width();
				if(ww <= 1024) return false;

				if (e.type === 'mouseenter') _.onHover($(this));
				if (e.type === 'mouseleave') _.offHover($(this));
			});
		},
		onHover: function($obj){
			var _ = this,
					value = $obj.attr('data-tooltip'),
					$o = $(this.get_html_obj(value)),
					tposition = $obj.attr('data-tposition'),
					ftag = $obj.attr('data-findtag');

			if(value == "") return false;

			$body.append($o);

			var $objforsize = typeof ftag != 'undefined' ? $obj.find(ftag).first() : $obj,
					th = $o.innerHeight(),
					tw = $o.innerWidth(),
					oh = $objforsize.innerHeight(),
					ow = $objforsize.innerWidth(),
					v = $objforsize.offset().top,
					h = $objforsize.offset().left;

			tposition = typeof tposition != 'undefined' ? tposition : 'top';

			if(tposition == 'top'){
				v += - th - 20;
				h += parseInt((ow - tw)/2);
			}
			if(tposition == 'bottom'){
				v += oh + 24;
				h += parseInt((ow - tw)/2);
			}
			if(tposition == 'left'){
				v += parseInt((oh-th)/2);
				h += - tw - 24;
			}
			if(tposition == 'right'){
				v += parseInt((oh-th)/2);
				h += ow + 24;
			}

			this.showTooltip($o, h, v, tposition);

			if(!this.check_pr_page_swatches($obj)) return false;
			$obj.on('click.closeTooltip', function(){
				_.offHover($(this));
				$(this).unbind( "click.closeTooltip" );
			})
		},
		offHover: function($obj){
			$body.find(this.html_i).remove();

			if(!this.check_pr_page_swatches($obj)) return false;
			$obj.unbind( "click.closeTooltip" );
		},
		showTooltip: function($o, h, v, tposition){
			var a = {opacity: 1},
					k = tposition;
			if(k == 'bottom') k = 'top';
			if(k == 'right') k = 'left';

			a[k] = tposition == 'bottom' || tposition == 'right' ? '-=10px' : '+=10px';

			$o.css({'top': v, 'left' : h}).addClass('tooltip-' + tposition).animate(a, 200);
		}
	}
	tooltip.init();
})(jQuery);

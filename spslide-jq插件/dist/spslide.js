;$(function(){
	$.fn.spslide = function(options) {
		var $This = $(this);
		var dft = {
			speed : 2000,
			box : '.row',
			eles : 'img',
			move : 'basicMove'
		};
		var ops = $.extend(dft,options);
		$This.wrapInner("<div class='spslide-box'></div>");
		var iH = $This.height();
		var iW = $(ops.box+' '+ops.eles).outerWidth(true) * $(ops.box+' '+ops.eles).length;
		
		$('.spslide-box').css({
			height: iH +'px',
			width: iW +'px'
		})
		var imove = setInterval(function(){
			$('.spslide-box '+ops.eles+':last-child').clone().insertBefore('.spslide-box '+ops.eles+':first-child');
			$('.spslide-box '+ops.eles+':last-child').detach();
		},ops.speed);

		$This.on('mousemove',function(){
			clearInterval(imove);
		}).on('mouseleave',function(){
			imove = setInterval(function(){
				$('.spslide-box '+ops.eles+':last-child').clone().insertBefore('.spslide-box '+ops.eles+':first-child');
				$('.spslide-box '+ops.eles+':last-child').detach();
			},ops.speed);
		});
	}
});
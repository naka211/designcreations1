$(document).ready(function() {
			
	$('.text, .file').focus(function() {
		value=$(this).val();
		$(this).attr("value","");
	});
	$('.text, .file').blur(function() {
		if($(this).val()=="") {
			$(this).val(value);
		}
	});
});

(function($){
 $.fn.extend({
 
 	customStyle : function(options) {
	  if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)){
	  return this.each(function() {
	  
			var currentSelected = $(this).find(':selected');
			$(this).after('<span class="selectbox-decor rounded w210"><span class="selectbox-decor-inner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
			var selectBoxSpan = $(this).next();
			var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));			
			var selectBoxSpanInner = selectBoxSpan.find(':first-child');
			selectBoxSpan.css({display:'block'});
			selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
			var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
			$(this).height(selectBoxHeight).change(function(){
			selectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
			});
			
	  });
	  }
	}
 });
})(jQuery);

(function($) {
    
    $.fn.filestyle = function(options) {
                
        /* TODO: This should not override CSS. */
        var settings = {
            width : 210
        };
                
        if(options) {
            $.extend(settings, options);
        };
                        
        return this.each(function() {
            
            var self = this;
            var wrapper = $("<span>")
                            .css({
                                "width": settings.imagewidth + "px",
                                "height": settings.imageheight + "px",
                                "background": "url(" + settings.image + ") no-repeat "
                            });
                            
            var filename = $('<input class="file">')
                             .addClass($(self).attr("class"))
                             .css({
                                 "width": settings.width + "px"
                             });

            $(self).before(filename);
            $(self).wrap(wrapper);

            $(self).css({
                        "position": "relative",
                        "height": settings.imageheight + "px",
                        "width": settings.width + "px",
                        "display": "inline",
                        "cursor": "pointer",
                        "opacity": "0.0"
                    });

            if ($.browser.mozilla) {
                if (/Win/.test(navigator.platform)) {
                    $(self).css("margin-left", "-142px");                    
                } else {
                    $(self).css("margin-left", "-168px");                    
                };
            } else {
                $(self).css("margin-left", settings.imagewidth - settings.width + "px");                
            };

            $(self).bind("change", function() {
                filename.val($(self).val());
            });
      
        });
        

    };
    
})(jQuery);

function MM_openBrWindow(theURL,winName,features) {
	window.open(theURL,winName,features);
} 





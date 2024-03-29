jQuery(function() {
    var $ = jQuery;
    // ie 6
    var ie6 = ($.browser.msie && $.browser.version < 7);
    // retarder
    $.fn.retarder = function(delay, method){
        var node = this;
        if (node.length){
            if (node[0]._timer_) clearTimeout(node[0]._timer_);
            node[0]._timer_ = setTimeout(function(){ method(node); }, delay);
        }
        return this;
    };
    // base rules
    $('#menu').addClass('js-active');
    $('ul div', '#menu').css('visibility', 'hidden');
    $('.mainMenu>li', '#menu').hover(
        function(){
            var ul = $('div:first', this);
            if (ul.length){
                if (!ul[0].hei) ul[0].hei = ul.height();
                ul.css({height: 0, overflow: 'hidden'}).retarder(300, function(i){
                    //$('a:first', ul[0].parentNode).css('background', '#000');
                    $('#menu').removeClass('js-active');
                    i.css('visibility', 'visible').animate({height: ul[0].hei}, {duration: 300, complete : function(){ ul.css('overflow', 'visible'); }});
                });
            }
            else setTimeout(function(){ $('#menu').removeClass('js-active'); }, 300);
        },
        function(){
            var ul  = $('div:first', this);
            if (ul.length){
                var css = {visibility: 'hidden', height: ul[0].hei};
                //$('a:first', ul[0].parentNode).css('background', 'none');
                ul.stop().retarder(1, function(i){ i.css(css); });                
            }
            $('#menu').addClass('js-active');
        }
    );
    $('ul ul li', '#menu').hover(
        function(){
            var ul = $('div:first', this);
            if (ul.length){
                if (!ul[0].wid) ul[0].wid = ul.width();
                ul.css({width: 0, overflow: 'hidden'}).retarder(50, function(i){
                    i.css('visibility', 'visible').animate({width: ul[0].wid}, {duration: 200, complete : function(){ ul.css('overflow', 'visible'); }});
                });
                if (!ul[0].hei) ul[0].hei = ul.height();
                
            }
        },
        function(){
            var ul  = $('div:first', this);
            if (ul.length){
                var css = {visibility: 'hidden', width: ul[0].wid};
                ul.stop().retarder(1, function(i){ i.css(css); });                
            }
        }
    );
    // lava lamp
    if (ie6){
        $('#menu ul.mainMenu>li').hover(function(){ $(this).addClass('hover'); }, function(){ $(this).removeClass('hover'); });
        $('#menu ul.mainMenu').lavaLamp({speed: 300});
    }
    else $('#menu ul.mainMenu').lavaLamp({fx: 'backout', speed: 300});
    // animation
    $('ul ul a', '#menu').hover(
        function(){ $(this).stop().animate({textIndent: 10}, 300); },
        function(){ $(this).stop().animate({textIndent: 0}, {duration: 300, complete: function(){}}); }
    );
});

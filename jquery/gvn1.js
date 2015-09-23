/*
 * SmartTab
 * a jQuery tab plugin
 * http://tech-laboratory.blogspot.com 
 */
 
(function($){
    $.fn.smartTab = function(options) {
        var options = $.extend({}, $.fn.smartTab.defaults, options);

        return this.each(function() {
                obj = $(this);
                var curTabIdx = options.selected; // Set the current tab index to default tab
                var tabs = $("ul > li > a", obj); // Get all anchors in this array
			          var autoProgressId = null;
                // adjust effect string
                options.transitionEffect = (typeof(options.transitionEffect)=='string' && options.transitionEffect!='') ? options.transitionEffect : 'none';

                $(obj).addClass(options.tabContainerClass); // Set the CSS on top element		       

                hideAllSteps(); // Hide all content on the first load
                
      		      showTab();
      		      
                $(tabs).bind("click", function(e){
                    if(tabs.index(this)==curTabIdx)
                      return false;
                    var prevTabIdx = curTabIdx;
                    curTabIdx = tabs.index(this);
                    hideTab(prevTabIdx);
                    if(options.autoProgress){
                      restartAutoProgress();
                    }
                    return false;
                });
                
                if(options.keyNavigation){
                    $(document).keyup(function(e){
                        if(e.which==39){ // Right Arrow
                          doForwardProgress();
                          if(options.autoProgress){
                            restartAutoProgress();
                          }
                        }else if(e.which==37){ // Left Arrow
                          doBackwardProgress();
                          if(options.autoProgress){
                            restartAutoProgress();
                          }
                        }
                    });
                }
                if(options.autoProgress){
                    startAutoProgress();
                }
                if(options.autoProgress && options.stopOnFocus){
                  $(obj).bind("mouseenter mousemove mouseover", function(e){
                      stopAutoProgress();
                      return true;
                  });
                  $(obj).bind("mouseleave", function(e){
                      startAutoProgress();
                      return true;
                  });
                }
                function hideAllSteps(){
            	    $(tabs, obj).each(function(){
                        $($(this, obj).attr("href"), obj).hide();//slideUp("fast");.fadeOut()
                  });
                }
                function showTab(){
                    var selTab = tabs.eq(curTabIdx); 
                    $(tabs, obj).removeClass("sel");
                    $($(selTab, obj), obj).addClass("sel");
                    if(options.transitionEffect == 'slide'){
                      $($(selTab, obj).attr("href"), obj).slideDown("slow");//slideDown("slow");.fadeIn()
                    } else if(options.transitionEffect == 'fade'){
                      $($(selTab, obj).attr("href"), obj).fadeIn("slow");//slideDown("slow");.fadeIn()
                    } else{
                      $($(selTab, obj).attr("href"), obj).show();
                    }
                    return true;
                }
                function hideTab(idx){
                    var selTab = tabs.eq(idx);
                    if(options.transitionEffect == 'slide'){
                      $($(selTab, obj).attr("href"), obj).slideUp("slow",showTab);//slideDown("slow");.fadeIn()
                    } else if(options.transitionEffect == 'fade'){
                      $($(selTab, obj).attr("href"), obj).fadeOut("slow",showTab);
                    } else{
                      $($(selTab, obj).attr("href"), obj).hide();
                      showTab();
                    }
                    return true;
                }
                // Auto progress
                function startAutoProgress(){
                  if(!autoProgressId){
                    autoProgressId = setInterval(doForwardProgress, options.progressInterval);
                  }
                }
                function restartAutoProgress(){
                    stopAutoProgress();
                    startAutoProgress();
                }
                function stopAutoProgress(){
                  if(autoProgressId){
                    clearInterval(autoProgressId);
                    autoProgressId = null;
                  }
                }
                function doForwardProgress(){
                  var nextTabIdx = curTabIdx+1;
                  var prevTabIdx = curTabIdx;
                  if(tabs.length <= nextTabIdx){
                    nextTabIdx = 0;
                  }
                  curTabIdx = nextTabIdx;
                  hideTab(prevTabIdx);
                }
                function doBackwardProgress(){
                  var nextTabIdx = curTabIdx-1;
                  var prevTabIdx = curTabIdx;
                  if(0 > nextTabIdx){
                    nextTabIdx = tabs.length-1;
                  }
                  curTabIdx = nextTabIdx;
                  hideTab(prevTabIdx);
                }
        });  
    };  
 
    // Defaults jQuery(this).animate({width: 'show'}); jQuery(this).animate({width: 'hide'});
    $.fn.smartTab.defaults = {
          selected: 0,  // Selected Tab, 0 = first step   
          keyNavigation:false, // Enable/Disable key navigation(left and right keys are used if enabled)
          autoProgress:true, // Auto navigate tabs on interval
          progressInterval:5000, // Auto navigate Interval (used only if "autoProgress" is set to true)
          stopOnFocus:true,
          transitionEffect:'slide', // Effect on navigation, none/fade/slide
          tabContainerClass:'stContainer' // tab container css class name
    };

})(jQuery);
(function(a){a.tools=a.tools||{version:"v1.2.6"},a.tools.tabs={conf:{tabs:"a",current:"current",onBeforeClick:null,onClick:null,effect:"default",initialIndex:0,event:"click",rotate:!1,slideUpSpeed:400,slideDownSpeed:400,history:!1},addEffect:function(a,c){b[a]=c}};var b={"default":function(a,b){this.getPanes().hide().eq(a).show(),b.call()},fade:function(a,b){var c=this.getConf(),d=c.fadeOutSpeed,e=this.getPanes();d?e.fadeOut(d):e.hide(),e.eq(a).fadeIn(c.fadeInSpeed,b)},slide:function(a,b){var c=this.getConf();this.getPanes().slideUp(c.slideUpSpeed),this.getPanes().eq(a).slideDown(c.slideDownSpeed,b)},ajax:function(a,b){this.getPanes().eq(0).load(this.getTabs().eq(a).attr("href"),b)}},c,d;a.tools.tabs.addEffect("horizontal",function(b,e){if(!c){var f=this.getPanes().eq(b),g=this.getCurrentPane();d||(d=this.getPanes().eq(0).width()),c=!0,f.show(),g.animate({width:0},{step:function(a){f.css("width",d-a)},complete:function(){a(this).hide(),e.call(),c=!1}}),g.length||(e.call(),c=!1)}});function e(c,d,e){var f=this,g=c.add(this),h=c.find(e.tabs),i=d.jquery?d:c.children(d),j;h.length||(h=c.children()),i.length||(i=c.parent().find(d)),i.length||(i=a(d)),a.extend(this,{click:function(c,d){var i=h.eq(c);typeof c=="string"&&c.replace("#","")&&(i=h.filter("[href*="+c.replace("#","")+"]"),c=Math.max(h.index(i),0));if(e.rotate){var k=h.length-1;if(c<0)return f.click(k,d);if(c>k)return f.click(0,d)}if(!i.length){if(j>=0)return f;c=e.initialIndex,i=h.eq(c)}if(c===j)return f;d=d||a.Event(),d.type="onBeforeClick",g.trigger(d,[c]);if(!d.isDefaultPrevented()){b[e.effect].call(f,c,function(){j=c,d.type="onClick",g.trigger(d,[c])}),h.removeClass(e.current),i.addClass(e.current);return f}},getConf:function(){return e},getTabs:function(){return h},getPanes:function(){return i},getCurrentPane:function(){return i.eq(j)},getCurrentTab:function(){return h.eq(j)},getIndex:function(){return j},next:function(){return f.click(j+1)},prev:function(){return f.click(j-1)},destroy:function(){h.unbind(e.event).removeClass(e.current),i.find("a[href^=#]").unbind("click.T");return f}}),a.each("onBeforeClick,onClick".split(","),function(b,c){a.isFunction(e[c])&&a(f).bind(c,e[c]),f[c]=function(b){b&&a(f).bind(c,b);return f}}),e.history&&a.fn.history&&(a.tools.history.init(h),e.event="history"),h.each(function(b){a(this).bind(e.event,function(a){f.click(b,a);return a.preventDefault()})}),i.find("a[href^=#]").bind("click.T",function(b){f.click(a(this).attr("href"),b)}),location.hash&&e.tabs=="a"&&c.find("[href="+location.hash+"]").length?f.click(location.hash):(e.initialIndex===0||e.initialIndex>0)&&f.click(e.initialIndex)}a.fn.tabs=function(b,c){var d=this.data("tabs");d&&(d.destroy(),this.removeData("tabs")),a.isFunction(c)&&(c={onBeforeClick:c}),c=a.extend({},a.tools.tabs.conf,c),this.each(function(){d=new e(a(this),b,c),a(this).data("tabs",d)});return c.api?d:this}})(jQuery);

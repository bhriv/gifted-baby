!function(){for(var e,n=function(){},t=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],a=t.length,i=window.console=window.console||{};a--;)e=t[a],i[e]||(i[e]=n)}(),$(document).ready(function(){$(".js-menu-trigger").on("click touchstart",function(e){$(".js-menu").toggleClass("is-visible"),$(".js-menu-screen").toggleClass("is-visible"),e.preventDefault()}),$(".js-menu-screen").on("click touchstart",function(e){$(".js-menu").toggleClass("is-visible"),$(".js-menu-screen").toggleClass("is-visible"),e.preventDefault()})}),$("#show_hide_click ul li").click(function(){$("#show_hide_click ul li").removeClass("active"),$(this).addClass("active")}),$(".big_clicks .device").click(function(){var e=$(this).parents().eq(2).attr("id"),n=$(this).attr("id");$('input:radio[name="'+e+'"]').prop("checked",!1),$('input:radio[name="'+e+'"]').filter('[value="'+n+'"]').prop("checked",!0),$("#"+e+" ul li").find(".device").removeClass("selected_choice"),$(this).addClass("selected_choice")}),$("li#choose").click(function(){$(this).addClass("current_step_item"),$("#create_new_choose section").find(".new_project_step").removeClass("current_step"),$("#new_project_choose").addClass("current_step")}),function($){$.fn.animatescroll=function(e){var n=$.extend({},$.fn.animatescroll.defaults,e),t=this.offset().top;jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,n,t,a,i){return jQuery.easing[jQuery.easing.def](e,n,t,a,i)},easeInQuad:function(e,n,t,a,i){return a*(n/=i)*n+t},easeOutQuad:function(e,n,t,a,i){return-a*(n/=i)*(n-2)+t},easeInOutQuad:function(e,n,t,a,i){return(n/=i/2)<1?a/2*n*n+t:-a/2*(--n*(n-2)-1)+t},easeInCubic:function(e,n,t,a,i){return a*(n/=i)*n*n+t},easeOutCubic:function(e,n,t,a,i){return a*((n=n/i-1)*n*n+1)+t},easeInOutCubic:function(e,n,t,a,i){return(n/=i/2)<1?a/2*n*n*n+t:a/2*((n-=2)*n*n+2)+t},easeInQuart:function(e,n,t,a,i){return a*(n/=i)*n*n*n+t},easeOutQuart:function(e,n,t,a,i){return-a*((n=n/i-1)*n*n*n-1)+t},easeInOutQuart:function(e,n,t,a,i){return(n/=i/2)<1?a/2*n*n*n*n+t:-a/2*((n-=2)*n*n*n-2)+t},easeInQuint:function(e,n,t,a,i){return a*(n/=i)*n*n*n*n+t},easeOutQuint:function(e,n,t,a,i){return a*((n=n/i-1)*n*n*n*n+1)+t},easeInOutQuint:function(e,n,t,a,i){return(n/=i/2)<1?a/2*n*n*n*n*n+t:a/2*((n-=2)*n*n*n*n+2)+t},easeInSine:function(e,n,t,a,i){return-a*Math.cos(n/i*(Math.PI/2))+a+t},easeOutSine:function(e,n,t,a,i){return a*Math.sin(n/i*(Math.PI/2))+t},easeInOutSine:function(e,n,t,a,i){return-a/2*(Math.cos(Math.PI*n/i)-1)+t},easeInExpo:function(e,n,t,a,i){return 0==n?t:a*Math.pow(2,10*(n/i-1))+t},easeOutExpo:function(e,n,t,a,i){return n==i?t+a:a*(-Math.pow(2,-10*n/i)+1)+t},easeInOutExpo:function(e,n,t,a,i){return 0==n?t:n==i?t+a:(n/=i/2)<1?a/2*Math.pow(2,10*(n-1))+t:a/2*(-Math.pow(2,-10*--n)+2)+t},easeInCirc:function(e,n,t,a,i){return-a*(Math.sqrt(1-(n/=i)*n)-1)+t},easeOutCirc:function(e,n,t,a,i){return a*Math.sqrt(1-(n=n/i-1)*n)+t},easeInOutCirc:function(e,n,t,a,i){return(n/=i/2)<1?-a/2*(Math.sqrt(1-n*n)-1)+t:a/2*(Math.sqrt(1-(n-=2)*n)+1)+t},easeInElastic:function(e,n,t,a,i){var u=1.70158,r=0,s=a;if(0==n)return t;if(1==(n/=i))return t+a;if(r||(r=.3*i),s<Math.abs(a)){s=a;var u=r/4}else var u=r/(2*Math.PI)*Math.asin(a/s);return-(s*Math.pow(2,10*(n-=1))*Math.sin(2*(n*i-u)*Math.PI/r))+t},easeOutElastic:function(e,n,t,a,i){var u=1.70158,r=0,s=a;if(0==n)return t;if(1==(n/=i))return t+a;if(r||(r=.3*i),s<Math.abs(a)){s=a;var u=r/4}else var u=r/(2*Math.PI)*Math.asin(a/s);return s*Math.pow(2,-10*n)*Math.sin(2*(n*i-u)*Math.PI/r)+a+t},easeInOutElastic:function(e,n,t,a,i){var u=1.70158,r=0,s=a;if(0==n)return t;if(2==(n/=i/2))return t+a;if(r||(r=.3*i*1.5),s<Math.abs(a)){s=a;var u=r/4}else var u=r/(2*Math.PI)*Math.asin(a/s);return 1>n?-.5*s*Math.pow(2,10*(n-=1))*Math.sin(2*(n*i-u)*Math.PI/r)+t:s*Math.pow(2,-10*(n-=1))*Math.sin(2*(n*i-u)*Math.PI/r)*.5+a+t},easeInBack:function(e,n,t,a,i,u){return void 0==u&&(u=1.70158),a*(n/=i)*n*((u+1)*n-u)+t},easeOutBack:function(e,n,t,a,i,u){return void 0==u&&(u=1.70158),a*((n=n/i-1)*n*((u+1)*n+u)+1)+t},easeInOutBack:function(e,n,t,a,i,u){return void 0==u&&(u=1.70158),(n/=i/2)<1?a/2*n*n*(((u*=1.525)+1)*n-u)+t:a/2*((n-=2)*n*(((u*=1.525)+1)*n+u)+2)+t},easeInBounce:function(e,n,t,a,i){return a-jQuery.easing.easeOutBounce(e,i-n,0,a,i)+t},easeOutBounce:function(e,n,t,a,i){return(n/=i)<1/2.75?7.5625*a*n*n+t:2/2.75>n?a*(7.5625*(n-=1.5/2.75)*n+.75)+t:2.5/2.75>n?a*(7.5625*(n-=2.25/2.75)*n+.9375)+t:a*(7.5625*(n-=2.625/2.75)*n+.984375)+t},easeInOutBounce:function(e,n,t,a,i){return i/2>n?.5*jQuery.easing.easeInBounce(e,2*n,0,a,i)+t:.5*jQuery.easing.easeOutBounce(e,2*n-i,0,a,i)+.5*a+t}}),$("html, body").animate({scrollTop:t-n.padding},n.scrollSpeed,n.easing)},$.fn.animatescroll.defaults={easing:"easeInOutQuint",scrollSpeed:1800,padding:0}}(jQuery);
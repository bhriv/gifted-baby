/* Common.js
* - reused functions
* - imported by master.js
* - minified via codekit, minified version is imported
*/

// ===========================
// Avoid `console` errors in browsers that lack a console
// ===========================

(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());


// ===========================
// Flyout Menu Trigger
// ===========================

 $(document).ready(function(){
    $('.js-menu-trigger').on('click touchstart', function(e){
      $('.js-menu').toggleClass('is-visible');
      $('.js-menu-screen').toggleClass('is-visible');
      e.preventDefault();
    });

    $('.js-menu-screen').on('click touchstart', function(e){
      $('.js-menu').toggleClass('is-visible');
      $('.js-menu-screen').toggleClass('is-visible');
      e.preventDefault();
    });
  });


// ===========================
// Nav Show/Hide - Click to Make Active
// ===========================

// $('#show_hide_switch ul li').click(function() {
//   $('#show_hide_switch ul li').removeClass('active');
//   $(this).addClass('active');
// });


// ===========================
// Accordian Tabs - Refills
// ===========================

$(document).ready(function () {
  $('.accordion-tabs').each(function(index) {
    $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
  });

  $('.accordion-tabs').on('click', 'li > a', function(event) {
    if (!$(this).hasClass('is-active')) {
      event.preventDefault();
      var accordionTabs = $(this).closest('.accordion-tabs');
      accordionTabs.find('.is-open').removeClass('is-open').hide();

      $(this).next().toggleClass('is-open').toggle();
      accordionTabs.find('.is-active').removeClass('is-active');
      $(this).addClass('is-active');
    } else {
      event.preventDefault();
    }
  });
});


// ===========================
// Accordian Tabs Minimal - Refills
// ===========================

$(document).ready(function () {
    $('.accordion-tabs-minimal').each(function(index) {
      $(this).children('li').first().children('a').addClass('is-active').next().addClass('is-open').show();
    });

    $('.accordion-tabs-minimal').on('click', 'li > a', function(event) {
      if (!$(this).hasClass('is-active')) {
        event.preventDefault();
        var accordionTabs = $(this).closest('.accordion-tabs-minimal')
        accordionTabs.find('.is-open').removeClass('is-open').hide();

        $(this).next().toggleClass('is-open').toggle();
        accordionTabs.find('.is-active').removeClass('is-active');
        $(this).addClass('is-active');
      } else {
        event.preventDefault();
      }
    });
});


// ===========================
// Navigation - Refills
// ===========================

$(document).ready(function() {
  var menu = $('#mobile-navigation-menu');
  var menuToggle = $('#js-mobile-menu');
  var signUp = $('.sign-up');

  $(menuToggle).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle(function(){
      if(menu.is(':hidden')) {
        menu.removeAttr('style');
      }
    });
  });

  // underline under the active nav item
  $(".nav .nav-link").click(function() {
    $(".nav .nav-link").each(function() {
      $(this).removeClass("active-nav-item");
    });
    $(this).addClass("active-nav-item");
    $(".nav .more").removeClass("active-nav-item");
  });
});



// ===========================
// Centered Navigation - Refills
// ===========================

$(document).ready(function() {
  var menu = $('.centered-navigation-menu');
  var menuToggle = $('.centered-navigation-menu-button');
  var signUp = $('.sign-up');

  $(menuToggle).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle(function(){
      if(menu.is(':hidden')) {
        menu.removeAttr('style');
      }
    });
  });
});


// ===========================
// Selectable Dropdown Menus
// ===========================

// Overview: A unique way to create cross-browser, very stylable dropdown menus
// Use javascript to show the equivalent of Select > Options in a list


// ===========================
// Big Clickable Radio Selectors
// ===========================

// Overview: A pretty way to select radio options

$(".big_clicks .device").click(function() {
  var parent_form_id = $(this).parents().eq(2).attr("id");
  var current_clicked_id = $(this).attr("id");
  $('input:radio[name="'+parent_form_id+'"]').prop("checked", false);
  $('input:radio[name="'+parent_form_id+'"]').filter('[value="'+current_clicked_id+'"]').prop("checked", true);
  $('#' +parent_form_id + " ul li").find('.device').removeClass('selected_choice');
  $(this).addClass('selected_choice');
});


// ===========================
// Form Steps for New Project Process
// ===========================

// Overview: Only show the step the user is working on

$("li#choose").click(function() {
  $(this).addClass('current_step_item');
  $('#create_new_choose section').find('.new_project_step').removeClass('current_step');
  $('#new_project_choose').addClass('current_step');
});


// ===========================
// Find Modal Content Based on Trigger ID
// ===========================

// Overview: A global way to pass modal content based on the ID of a button clicked

// $(".modal_trigger").click(function() {
//   var triggered_modal_id = $(this).attr("id");
//   var triggered_modal_content = $('#' +triggered_modal_id +'.modal_content').html();
//   bootbox.dialog({
//       message: triggered_modal_content
//     });
// });

// ===========================
// Refills Expander
// ===========================

// Overview: Show / Hide expanded content with pointer arrow
// http://refills.bourbon.io/components/

var Expander;

Expander = (function() {
  Expander.selector = '.expander';
  Expander.toggleSelector = '.expander-toggle';
  Expander.contentSelector = '.expander-content';
  Expander.enhancedClass = 'js-expander';
  Expander.expandedClass = 'expanded';

  Expander.enhance = function() {
    var thisClass;
    thisClass = this;
    return $(this.selector).each(function() {
      return new thisClass(this).enhance();
    });
  };

  function Expander(element) {
    this._element = $(element);
    this._toggleElement = this._element.find(this.constructor.toggleSelector);
    this._contentElement = this._element.find(this.constructor.contentSelector);
  }

  Expander.prototype.enhance = function() {
    this._element.addClass(this.constructor.enhancedClass);
    this._buildUI();
    return this._bindEvents();
  };

  Expander.prototype._buildUI = function() {
    return this._contentElement.hide();
  };

  Expander.prototype._bindEvents = function() {
    return this._toggleElement.click((function(_this) {
      return function() {
        return _this._toggleContent();
      };
    })(this));
  };

  Expander.prototype._toggleContent = function() {
    this._contentElement.toggle();
    return this._element.toggleClass(this.constructor.expandedClass);
  };

  return Expander;

})();

$(function() {
  return Expander.enhance();
});


// ===========================
// Scroll Animation
// ===========================

/* Scroll Animation
 * @build : 20-07-2013
 * @author : Ram swaroop
 * @easing effect : easings.net
 * Usage: <a onclick="$('#content_block-3').animatescroll();">
 */
(function($){
    
    $.fn.animatescroll = function(options) {
        
        // fetches options
        var opts = $.extend({},$.fn.animatescroll.defaults,options);
        
        // Get the distance of particular id or class from top
        var offset = this.offset().top;
        
        // defines various easing effects
        jQuery.easing['jswing'] = jQuery.easing['swing'];
        jQuery.extend( jQuery.easing,
        {
                def: 'easeOutQuad',
                swing: function (x, t, b, c, d) {
                        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
                },
                easeInQuad: function (x, t, b, c, d) {
                        return c*(t/=d)*t + b;
                },
                easeOutQuad: function (x, t, b, c, d) {
                        return -c *(t/=d)*(t-2) + b;
                },
                easeInOutQuad: function (x, t, b, c, d) {
                        if ((t/=d/2) < 1) return c/2*t*t + b;
                        return -c/2 * ((--t)*(t-2) - 1) + b;
                },
                easeInCubic: function (x, t, b, c, d) {
                        return c*(t/=d)*t*t + b;
                },
                easeOutCubic: function (x, t, b, c, d) {
                        return c*((t=t/d-1)*t*t + 1) + b;
                },
                easeInOutCubic: function (x, t, b, c, d) {
                        if ((t/=d/2) < 1) return c/2*t*t*t + b;
                        return c/2*((t-=2)*t*t + 2) + b;
                },
                easeInQuart: function (x, t, b, c, d) {
                        return c*(t/=d)*t*t*t + b;
                },
                easeOutQuart: function (x, t, b, c, d) {
                        return -c * ((t=t/d-1)*t*t*t - 1) + b;
                },
                easeInOutQuart: function (x, t, b, c, d) {
                        if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
                        return -c/2 * ((t-=2)*t*t*t - 2) + b;
                },
                easeInQuint: function (x, t, b, c, d) {
                        return c*(t/=d)*t*t*t*t + b;
                },
                easeOutQuint: function (x, t, b, c, d) {
                        return c*((t=t/d-1)*t*t*t*t + 1) + b;
                },
                easeInOutQuint: function (x, t, b, c, d) {
                        if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
                        return c/2*((t-=2)*t*t*t*t + 2) + b;
                },
                easeInSine: function (x, t, b, c, d) {
                        return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
                },
                easeOutSine: function (x, t, b, c, d) {
                        return c * Math.sin(t/d * (Math.PI/2)) + b;
                },
                easeInOutSine: function (x, t, b, c, d) {
                        return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
                },
                easeInExpo: function (x, t, b, c, d) {
                        return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
                },
                easeOutExpo: function (x, t, b, c, d) {
                        return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
                },
                easeInOutExpo: function (x, t, b, c, d) {
                        if (t==0) return b;
                        if (t==d) return b+c;
                        if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
                        return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
                },
                easeInCirc: function (x, t, b, c, d) {
                        return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
                },
                easeOutCirc: function (x, t, b, c, d) {
                        return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
                },
                easeInOutCirc: function (x, t, b, c, d) {
                        if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
                        return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
                },
                easeInElastic: function (x, t, b, c, d) {
                        var s=1.70158;var p=0;var a=c;
                        if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
                        if (a < Math.abs(c)) { a=c; var s=p/4; }
                        else var s = p/(2*Math.PI) * Math.asin (c/a);
                        return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
                },
                easeOutElastic: function (x, t, b, c, d) {
                        var s=1.70158;var p=0;var a=c;
                        if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
                        if (a < Math.abs(c)) { a=c; var s=p/4; }
                        else var s = p/(2*Math.PI) * Math.asin (c/a);
                        return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
                },
                easeInOutElastic: function (x, t, b, c, d) {
                        var s=1.70158;var p=0;var a=c;
                        if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
                        if (a < Math.abs(c)) { a=c; var s=p/4; }
                        else var s = p/(2*Math.PI) * Math.asin (c/a);
                        if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
                        return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
                },
                easeInBack: function (x, t, b, c, d, s) {
                        if (s == undefined) s = 1.70158;
                        return c*(t/=d)*t*((s+1)*t - s) + b;
                },
                easeOutBack: function (x, t, b, c, d, s) {
                        if (s == undefined) s = 1.70158;
                        return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
                },
                easeInOutBack: function (x, t, b, c, d, s) {
                        if (s == undefined) s = 1.70158; 
                        if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
                        return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
                },
                easeInBounce: function (x, t, b, c, d) {
                        return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
                },
                easeOutBounce: function (x, t, b, c, d) {
                        if ((t/=d) < (1/2.75)) {
                                return c*(7.5625*t*t) + b;
                        } else if (t < (2/2.75)) {
                                return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
                        } else if (t < (2.5/2.75)) {
                                return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
                        } else {
                                return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
                        }
                },
                easeInOutBounce: function (x, t, b, c, d) {
                        if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
                        return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
                }
        });

        // Scroll the page to the desired position
        $("html, body").animate({ scrollTop: offset-opts.padding }, opts.scrollSpeed, opts.easing);
        
    };
    
    // default options
    $.fn.animatescroll.defaults = {        
        easing:"easeInOutQuint",
        scrollSpeed:1800,
        padding:0
    };   
    
}(jQuery));


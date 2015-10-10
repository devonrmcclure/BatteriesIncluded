(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$(function() {

	$('#carousel-item').first().addClass('active');
	$('.carousel-indicators').children().first().addClass('active');
	$('.carousel-img').attr('class', 'first-slide');

	$

});
},{}],2:[function(require,module,exports){
$(function() {
	$('.delete').click(function(e) {
		e.preventDefault();

		var id = $(this).parent().data('id');
		var name = $(this).parent().data('name');
		var path = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

		if(path == "catalog") {
			path = "products";
		}

    	$('<p>Are you sure you want to delete "<b>' + name + '</b>"?</p>').appendTo('.modal-body');
    	$('.confirmDelete').parent().parent().attr('action', '/admin/' + path + '/' + id);
	});
});

$(function() {
	$('.cancelDelete').click(function(e) {
		e.preventDefault();
		$('.modal-title').empty();
		$('.modal-body').empty();
	});
});

$(function() {
	$('.confirmDelete').click(function(e) {
		$('form#deleteForm').submit();
	});
});
},{}],3:[function(require,module,exports){
/**
 * Created by Kupletsky Sergey on 16.09.14.
 *
 * Hierarchical timing
 * Add specific delay for CSS3-animation to elements.
 */

(function($) {
    var speed = 2000;
    var container =  $('.display-animation');
    container.each(function() {
        var elements = $(this).children();
        elements.each(function() {
            var elementOffset = $(this).offset();
            var offset = elementOffset.left*0.8 + elementOffset.top;
            var delay = parseFloat(offset/speed).toFixed(2);
            $(this)
                .css("-webkit-animation-delay", delay+'s')
                .css("-o-animation-delay", delay+'s')
                .css("animation-delay", delay+'s')
                .addClass('animated');
        });
    });
})(jQuery);

/**
 * Created by Kupletsky Sergey on 04.09.14.
 *
 * Ripple-effect animation
 * Tested and working in: ?IE9+, Chrome (Mobile + Desktop), ?Safari, ?Opera, ?Firefox.
 * JQuery plugin add .ink span in element with class .ripple-effect
 * Animation work on CSS3 by add/remove class .animate to .ink span
*/

(function($) {
    $(".ripple-effect").click(function(e){
        var rippler = $(this);

        // create .ink element if it doesn't exist
        if(rippler.find(".ink").length == 0) {
            rippler.append("<span class='ink'></span>");
        }

        var ink = rippler.find(".ink");

        // prevent quick double clicks
        ink.removeClass("animate");

        // set .ink diametr
        if(!ink.height() && !ink.width())
        {
            var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
            ink.css({height: d, width: d});
        }

        // get click coordinates
        var x = e.pageX - rippler.offset().left - ink.width()/2;
        var y = e.pageY - rippler.offset().top - ink.height()/2;

        // set .ink position and add class .animate
        ink.css({
            top: y+'px',
            left:x+'px'
        }).addClass("animate");
    })
})(jQuery);


// For floating action button
$(function () {
    materialRipple();
});

function materialRipple() {
    $(".fab:not(.disabled)").on("mousedown", function (e) {
        recycler();
        var offset = $(this).offset();
        var XCoord = (e.pageX - offset.left);
        var YCoord = (e.pageY - offset.top);

        if ($(this).outerWidth() < 199) {
            $(this).children().append($("<div class='ripple ripple-active'></div>").css({
                left: XCoord - 4.5,
                top: YCoord - 2,
                height: $(this).width() * .20,
                width: $(this).width() * .20
            })).on("mouseup", function () {
                $(this).children('div').removeClass('ripple-active');
            });
        } else {
            $(this).children().append($("<div class='ripple ripple-active'></div>").css({
                left: XCoord - 4.5,
                top: YCoord - 2,
                height: $(this).width() * .05,
                width: $(this).width() * .05
            })).on("mouseup", function () {
                $(this).children('div').removeClass('ripple-active');
            });
        }
    });
}

function recycler() {
    $('html').find('.ripple:not(.active)').remove();
}
},{}],4:[function(require,module,exports){
$(function() {

  $("label.bg-danger").hide();
  $("form").removeClass("noscript");
  $(".submit-button").click(function() {
    // validate and process form here
    var to;
    var location = $("select#location").val();
    var name     = $("input#name").val();
    var phone    = $("input#phone").val();
    var email    = $("input#email").val();
    var subject  = $("input#subject").val();
    var message  = $("textarea#message").val();
    // alert(location + name +  phone + email + subject + message); // Used for testing purposes.

    switch(location){
      case "surrey":
        to = "guildford@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "richmond":
        to = "lansdowne@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "white rock":
        to = "whiterock@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "nanaimo":
        to = "nanaimo@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      default:
        to = null;
        $("label#location-error").show();
        return false;
      }

    if (name == "") {
      $("label#name-error").show();
      $("input#name").focus();
      return false;
    } else {
      $("label#name-error").hide();
    }

    if ($.isNumeric(phone) != true || phone.length != 10 || phone == "") {
      $("label#phone-error").show();
      $("input#phone").focus();
      return false;
    } else {
      $("label#phone-error").hide();
    }

    if (email.match(/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/) || email == "") {
      $("label#email-error").show();
      $("input#email").focus();
      return false;
    } else {
      $("label#email-error").hide();
    }

    if (subject == "") {
      $("label#subject-error").show();
      $("input#subject").focus();
      return false;
    } else {
      $("label#subject-error").hide();
    }

    if (message == "" || message.length < 20) {
      $("label#message-error").show();
      $("input#message").focus();
      return false;
    } else {
      $("label#message-error").hide();
    }

    });

    //return false; // avoid to execute the actual submit of the form.
});
},{}],5:[function(require,module,exports){
$(".sidebar-toggle").click(function(e) {
    e.preventDefault();
    $(".sidebar").toggleClass("toggled");
    $(".content").toggleClass("col-md-offset-2");
    $(".content").toggleClass("col-md-offset-1");

});

$(".fab-toggle").click(function(e) {
	e.preventDefault();
	$(".fab-item").toggleClass("hidden");
});
},{}],6:[function(require,module,exports){
$(document).ready(function(){
	$(".toast").fadeIn(1000);
	$(".toast").delay(3000).fadeOut(1000);
});
},{}]},{},[1,2,3,4,5,6]);

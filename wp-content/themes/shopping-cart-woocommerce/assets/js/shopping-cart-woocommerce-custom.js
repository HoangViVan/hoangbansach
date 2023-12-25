/**
  * Theme Js file.
**/

jQuery(function($){
  "use strict";

  jQuery('.search-box button').click(function(){
    jQuery(".search_outer").toggle();
  });

  jQuery('.search_inner input.search-field').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('.search_inner button.search-submit').focus();
    }
  });

  jQuery('.search_inner .search-submit').on('keydown', function (e) {
    if (jQuery("this:focus") && (e.which === 9)) {
      e.preventDefault();
      jQuery(this).blur();
      jQuery('button.search_btn').focus();
    }
  });
});

jQuery('document').ready(function($){
  setTimeout(function () {
    jQuery(".loader").fadeOut("slow");
  },1000);
});

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

// ===== Mobile responsive Menu ====

function shopping_cart_woocommerce_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function shopping_cart_woocommerce_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.innermenuboxupper').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.innermenuboxupper').addClass("stick_head");
    } else {
      jQuery('.innermenuboxupper').removeClass("stick_head");
    }
  }
});

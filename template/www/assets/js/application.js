/**
 * DAWYN APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 31/08/2016
 *
 * Type:
 * Javascript
 * 
 * Description:
 * Site javascript
 */

/**
 * Show, off canvas menu
 */
$('.toggle-nav').click(function(event) {
	event.preventDefault();
  $('.wrap').toggleClass('show-mobile');
});

/**
 * Vertical menu
 */
$(document).on('click', '.subpage-links li.have-subpage > a, .mobile-menu li.have-submenu > a', function(event) {
  event.preventDefault();
  $(this).next('ul').slideToggle();
});

$('.cms-menu .selector').on('click', function(event) {
  event.preventDefault();

  $(this).toggleClass('open');
  if ( $(this).hasClass('open') ) {
    if ( $('.subpage-links-mobile').length > 0 ) {
      $('.subpage-links-mobile').show();
    }
    else {
      /*
      var page_menu_html = document.querySelector('.subpage-links');
      $('.cms-menu').append(page_menu_html);
      */
      $('.subpage-links').clone().appendTo('.menu-container');
      $('.cms-menu .subpage-links').removeClass('hidden-xs').addClass('subpage-links-mobile');
    }
  }
  else {
    $('.subpage-links-mobile').hide();
  }

});

$(function() {
  /**
   * Vertical aligment for slider text
   */
  var slider_text = $('.swiper-slide a > span > span');
  slider_text.css({
    'top': '50%',
    'margin-top': '-' + (slider_text.height() / 2) + 'px'
  });

  /**
   * Brochure sidebar button
   */
  $('img[data-hover]').hover(function() {
    $(this).attr('src', $(this).data('hover'));
  }, function() {
    $(this).attr('src', $(this).data('orig'));
  });
});


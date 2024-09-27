// Product page tabs
$('.productTabName').each(function() {

    $(this).click(function() {
      
      var contentName = $(this).data('targetid');
      
      // Make this element active
      $(this).parent().parent().children().children('#'.contentName).addClass('active');     
      
      // Make other tabs unactive
      $('.productTabName').not(this).each(function() {
          $(this).removeClass('active');
      });
  
      $('.productTabContent').not('#'+contentName).each(function() {
          $(this).removeClass('active');
      });
    });

});


// Mobile slideout
$('#mobileMenuButton').click(function() {
  $('#mobileSlideoutBackground').fadeIn();
  $('#mobileSlideout').fadeIn(10);
  $('#mobileSlideout').animate({
    left: '20vw' 
  }, 200);
});
$('#mobileMenuCloseButton').click(function() {
  $('#mobileSlideout').animate({
    left: '100vw' 
  }, 200);
  $('#mobileSlideout').fadeOut(10);
  $('#mobileSlideoutBackground').fadeOut();
});

$('#searchButton').click(function() {
  var element = $('#navSearchForm');

  if(element.hasClass('active')) {
    element.fadeOut();
    element.removeClass('active');
  } else {
    element.fadeIn();
    element.addClass('active');
  }
});

$(document).on({
  mouseenter: function() {
    $(this).children('.categoryHomepageText').children('span').slideDown(200);
  },
  mouseleave: function() {
    $(this).children('.categoryHomepageText').children('span').slideUp(200);
  }
}, '.categoryHomepage.width-2');

var fired = false;
$(window).scroll(function() {
  var position = $(this).scrollTop();
  var changeAt = ($(this).height() * 0.20) - 500;
  changeAt = 130;

  if(position >= changeAt && !fired) {
    $('.navItems').addClass('active');
    fired = true;
  } 
  
  if(position <= (changeAt - 10) && fired){
    $('.navItems').removeClass('active');
    fired = false;
  } 
});

// Sliders
var brandsSwiper = new Swiper('#brandsSlider', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,

    autoplay: {
        delay: 1000
    },

    breakpoints: {
      1024: {
        slidesPerView: 5,
        spaceBetween: 0
      }
    }
});

var homepageSlider = new Swiper('#homepageSlider', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,

    autoplay: {
        delay: 5000
    }
});

var highlightedSlider = new Swiper('.highlightedProducts', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 0,

    autoplay: {
        delay: 5000
    },

    breakpoints: {
      1024: {
        slidesPerView: 4
      },
      768: {
        slidesPerView: 3
      } 
    }
});

var productImageThumbs = new Swiper('.productThumbs', {
  slidesPerView: 4,
  spaceBetween: 20

});
var productImageSlider = new Swiper('.productImageSlider', {
  slidesPerView: 1,

  thumbs: {
    swiper: productImageThumbs
  }
});

$(function() {
	$('.productText').matchHeight();
// 	$('.product').matchHeight();
});
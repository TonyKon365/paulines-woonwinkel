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

$( document ).ready(function() {
  $("#pagination").change(function(){
    window.location = '//' + window.location.hostname + window.location.pathname + '?' + this.value
  });
});

$( document ).ready(function() {
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
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

var productImageThumbs = new Swiper('.productThumbs', {
  slidesPerView: 4,
  spaceBetween: 20,
  navigation: {
    nextEl: '.swiper-button-next-nav',
    prevEl: '.swiper-button-prev-nav'
  }
});
var productImageSlider = new Swiper('.productImageSlider', {
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next-main',
    prevEl: '.swiper-button-prev-main'
  },
  thumbs: {
    swiper: productImageThumbs
  }
});
var highlightedSlider = new Swiper('.highlightedProducts', {
  spaceBetween: 0,
  centeredSlides: true,
  loop:true,
  direction: 'horizontal',
  loopedSlides: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  resizeObserver:true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      620: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1000: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    }
});
var banner = new Swiper('.homepageSlider', {
  spaceBetween: 0,
  centeredSlides: true,
  loop:true,
  direction: 'horizontal',
  loopedSlides: 1,
  resizeObserver:true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  }

});

$(function() {
	$('.productText').matchHeight();
// 	$('.product').matchHeight();
});

$('#mobileSlideoutItems button').on( "click", function() {
  $(this).toggleClass('active');
  $(this).siblings('.navDropdown-mob').toggleClass('collapse');
});

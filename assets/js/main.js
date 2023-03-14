(function($) { "use strict";
// mobile-drop-down
jQuery('.dropdown-icon').on('click',function(){
  // alert()
  // $(this).next('.mob-submenu').slideToggle();
  jQuery(this).toggleClass('active').next('ul').slideToggle();
  jQuery(this).parent().siblings().children('ul').slideUp();
  jQuery(this).parent().siblings().children('.active').removeClass('active');
});


//Preloder
jQuery(window).on('load', function () {
  $(".egns-preloader").delay(1600).fadeOut("slow");
});

 // niceSelect
 $('select').niceSelect();


// sticky header

window.addEventListener('scroll',function(){
  const header = document.querySelector('header.style-1, header.style-2, header.style-3, header.style-4, header.style-5');
  header.classList.toggle("sticky",window.scrollY > 0);
});

// mobile-search-area

$('.search-btn').on("click", function(){
  $('.mobile-search').addClass('slide');
});

$('.search-cross-btn').on("click", function(){
  $('.mobile-search').removeClass('slide');
});
// sidebar-area

$('.sidebar-btn').on("click", function(){
  $('.hero-sidebar').addClass('slide');
});

$('.sidebar-close-btn').on("click", function(){
  $('.hero-sidebar').removeClass('slide');
});
// h4 side bar

$('.deshboar').on("click", function(){
  $('.author-side-bar').addClass('slide');
});

$('.close-btn').on("click", function(){
  $('.author-side-bar').removeClass('slide');
});

// scroll button
$(window).on('scroll',function() {
  if ($(window).scrollTop() > 300) {
    $('.scroll-btn').addClass('show');
  } else {
    $('.scroll-btn').removeClass('show');
  }
});
$('.scroll-btn').on('click',function(e){
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

// mobile-menu

$('.mobile-menu-btn').on("click",function(){
  $('.main-menu').addClass('show-menu');
});

$('.menu-close-btn').on("click",function(){
  $('.main-menu').removeClass('show-menu');
});


// Magnific Popup video
$('.popup-youtube').magnificPopup({
  type: 'iframe'
});
$('.popup-img').magnificPopup({
  type: 'iframe'
});

// tab-active
$(".nav-tabs .nav-item .nav-link").on("click", function() {
  $(".nav-tabs .nav-item .nav-link").removeClass("active");
  $(this).addClass("active");
});

// Feature slider
var swiper = new Swiper(".feature-slider", {
  pagination: {
    el: ".swiper-pagination",
  },
});

// Testimonial Slider2
var swiper = new Swiper(".testimonial-slider2", {
loop: true,
loopFillGroupWithBlank: true,
speed:2000,
autoplay: {
delay: 5000,
},
navigation: {
nextEl: ".swiper-button-next-g",
prevEl: ".swiper-button-prev-g",
},
});

//  testimonil slider1
var swiper = new Swiper(".testimonial-slider-1", {
slidesPerView: 2,
spaceBetween: 60,
slidesPerGroup: 1,
loop: true,
loopFillGroupWithBlank: true,
speed:2000,
  autoplay: {
    delay: 5000,
  },
navigation: {
  nextEl: ".swiper-button-next-e",
  prevEl: ".swiper-button-prev-e",
},
breakpoints: {
    280:{
      slidesPerView: 1
    },
    480:{
      slidesPerView: 1
    },
    768:{
      slidesPerView: 1
    },
    992:{
      slidesPerView: 2
    },
    1200:{
      slidesPerView: 2
    },
    1400:{
      slidesPerView:2
    },
    1600:{
      slidesPerView: 2
    },
  }
});

// Room Suits slider
var swiper = new Swiper(".room-suits-slider", {
slidesPerView: 3,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
// speed:1500,
//   autoplay: {
//     delay: 2000,
//   },
  pagination: {
    el: ".pagination-style1",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 1
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView:3
  },
  1600:{
    slidesPerView: 3
  },
}
});

// Offer Slider 1
var $swiper = $(".offer-slider1");
var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
// into a fixed position for animation purposes
var $bottomSlideContent = null; // Slide content that gets passed between the
// panning slide stack and the position 'behind'
// the stack, needed for correct animation style

var mySwiper = new Swiper(".offer-slider1", {
spaceBetween: 1,
slidesPerView: 3,
centeredSlides: true,
roundLengths: true,
loop: true,
loopAdditionalSlides: 30,
spaceBetween: 20,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next-f",
    prevEl: ".swiper-button-prev-f",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 1
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView:3
  },
  1600:{
    slidesPerView: 3
  },
}

});


// Blog Slider 01
var swiper = new Swiper(".blog-slider1", {
slidesPerView: 2,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  // autoplay: {
  //   delay: 2000,
  // },
  pagination: {
    el: ".pagination-style2",
    clickable: 'true',
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 1
  },
  768:{
    slidesPerView: 1
  },
  992:{
    slidesPerView: 2
  },
  1200:{
    slidesPerView: 2
  },
  1400:{
    slidesPerView:2
  },
  1600:{
    slidesPerView: 2
  },
}
});

// Room Suits Slider 03
var mySwiper = new Swiper(".room-suits-slider3", {
slidesPerView: 3,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next-g",
    prevEl: ".swiper-button-prev-g",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 2
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView:3
  },
  1600:{
    slidesPerView: 3
  },
}
});


// Facility Slider
var mySwiper = new Swiper(".facility-slider", {
slidesPerView: 4,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  // autoplay: {
  //   delay: 2000,
  // },
  pagination: {
    el: ".pagination-style3",
    clickable: 'true',
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 2
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 4
  },
  1400:{
    slidesPerView:4
  },
  1600:{
    slidesPerView: 4
  },
}
});

// Home Three Offer Slider
var mySwiper = new Swiper(".h3-offer-slider", {
slidesPerView: 4,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: 'true',
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 2
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 2
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView: 3
  },
  1600:{
    slidesPerView: 3
  },
}
});

// Gueest Review 
var swiper = new Swiper(".gueest-review", {
loop: true,
loopFillGroupWithBlank: true,
speed:2000,
spaceBetween: 110,
slidesPerView: 1,
autoplay: {
  delay: 5000,
},
navigation: {
  nextEl: ".swiper-button-next-g",
  prevEl: ".swiper-button-prev-g",
},
});

// Home Four Banner Slider
new Swiper('.banner4', {
  slidesPerView: 1,
  speed: 1500,
  loop: true,
  spaceBetween: 10,
  loop: true,
  centeredSlides: true,
  roundLengths: true,
  parallax: true,
  effect: 'fade',
  navigation: {
    nextEl: ".swiper-button-next-g",
    prevEl: ".swiper-button-prev-g",
  },
  fadeEffect: {
    crossFade: true,
  },

  autoplay: {
    delay: 4000
  },

});
// Home Four Banner Slider
new Swiper('.banner-author-slider', {
  slidesPerView: 1,
  speed: 1500,
  loop: true,
  spaceBetween: 10,
  loop: true,
  roundLengths: true,
  speed:1500,
  autoplay: {
    delay: 2000
  },

});

// Home Four Offer Slider
var mySwiper = new Swiper(".h4-offer-slider", {
slidesPerView: 4,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: 'true',
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 2
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView: 3
  },
  1600:{
    slidesPerView: 3
  },
}
});

// Home Four Testimonial Slider
var mySwiper = new Swiper(".h4-testimonial-slider", {
slidesPerView: 4,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next-i",
    prevEl: ".swiper-button-prev-i",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 1
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView: 3
  },
  1600:{
    slidesPerView: 3
  },
}
});

// Home Five Room & Suites
var mySwiper = new Swiper(".h5-room-suites", {
slidesPerView: 3,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next-k",
    prevEl: ".swiper-button-prev-k",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 2
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView:3
  },
  1600:{
    slidesPerView: 3
  },
}
});

// Home Five Testimonial
var swiper = new Swiper(".testimonial-slider-5", {
loop: true,
loopFillGroupWithBlank: true,
speed:2000,
spaceBetween: 110,
slidesPerView: 1,
autoplay: {
  delay: 5000,
},
navigation: {
  nextEl: ".swiper-button-next-l",
  prevEl: ".swiper-button-prev-l",
},
});

// Home Five Eoom Slider
var swiper = new Swiper(".room-details-slider", {
loop: true,
loopFillGroupWithBlank: true,
speed:2000,
autoplay: {
  delay: 5000,
},
navigation: {
  nextEl: ".swiper-button-next-m",
  prevEl: ".swiper-button-prev-m",
},
});

// Room Details Slider
var mySwiper = new Swiper(".room-dt-slider", {
slidesPerView: 4,
spaceBetween: 30,
loop: true,
loopFillGroupWithBlank: true,
speed:1500,
  autoplay: {
    delay: 2000,
  },
  navigation: {
    nextEl: ".swiper-button-next-n",
    prevEl: ".swiper-button-prev-n",
  },
breakpoints: {
  280:{
    slidesPerView: 1
  },
  480:{
    slidesPerView: 1
  },
  768:{
    slidesPerView: 2
  },
  992:{
    slidesPerView: 3
  },
  1200:{
    slidesPerView: 3
  },
  1400:{
    slidesPerView: 3
  },
  1600:{
    slidesPerView: 3
  },
}
});


  $(".counter-item").each(function() {
    $(this).isInViewport(function(status) {
        if (status === "entered") {
            for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                var el = document.querySelectorAll('.odometer')[i];
                el.innerHTML = el.getAttribute("data-odometer-final");
            }
        }
    });
});

jQuery('#datepicker').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
  
});
jQuery('#datepicker1').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker2').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker3').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker4').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker5').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker6').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker7').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});

jQuery('#datepicker8').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker9').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker10').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker11').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker12').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker13').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker14').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker15').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});
jQuery('#datepicker16').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
 
});
jQuery('#datepicker17').datepicker({
  format: 'dd-mm-yyyy',
  startDate: '+1d',
  minDate: 0
});

}(jQuery));

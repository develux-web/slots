$(document).ready(function () {
 setTimeout(function(){

  /*timer*/
 $('[data-countdown]').each(function () {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function (event) {
   $this.html(event.strftime('<li>%H <span>hours</span></li> <li>:</li> <li>%M <span>min</span></li> <li>:</li> <li>%S <span>sec</span></li>'));
  });
 });

 /*section-content_list*/
 if (matchMedia('only screen and (min-width: 1200px)').matches) {
  $('.section-content_list a').click(function () {
   $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top - 40
   }, {
    duration: 2000,
    easing: 'swing'
   });
   return false;
  });
 }
 if (matchMedia('only screen and (max-width: 1200px)').matches) {
  $('.section-content_list a').click(function () {
   $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top - 100
   }, {
    duration: 2000,
    easing: 'swing'
   });
   $('.section-content').removeClass('active');
   $('.section-content_list').slideUp();
   return false;
  });
 }
 (function ($, window, document) {
  var lastId,
   topMenu = $(".section-content_list"),
   topMenuHeight = topMenu.outerHeight() + 15,
   menuItems = topMenu.find("a"),
   scrollItems = menuItems.map(function () {
    var item = $(this).attr("href");
    if (item != '#') { return $(item) }
   });
  $(window).scroll(function () {
   var fromTop = $(this).scrollTop() + topMenuHeight;
   var cur = scrollItems.map(function () {
    if ($(this).offset().top < fromTop)
     return this;
   });
   cur = cur[cur.length - 1];
   var id = cur && cur.length ? cur[0].id : "";
   if (lastId !== id) {
    lastId = id;
    menuItems
     .parent().removeClass("active")
     .end().filter("[href='#" + id + "']").parent().addClass("active");
   }
  });
 })(jQuery, window, document);

 /*section-content_title*/
 if (matchMedia('only screen and (max-width: 1200px)').matches) {
  $('.section-content_title').click(function () {
   $(this).parent().toggleClass('active');
   $(this).next().slideToggle();
  });
 }

 /*section-scroll*/
 $(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
   $('.section-scroll').addClass('active');
  } else {
   $('.section-scroll').removeClass('active');
  }
 });
 $('.section-scroll').click(function () {
  $("html, body").animate({ scrollTop: 0 }, 600);
  return false;
 });

 /*header-search_label*/
 $('.header-search_input').on('change paste keyup', function () {
  $('.header-search_box').fadeIn();
 });
 $(document).click(function (e) {
  if (!$(e.target).closest('.header-search').length) {
   $('.header-search_box').fadeOut();
  }
  e.stopPropagation();
 });

 /*header-search_btn*/
 $('.header-search_btn').click(function () {
  $(this).toggleClass('active');
  $('.header-search_wrap').fadeToggle();
 });

 /*form-search*/
 $('.form-search_point').on('change paste keyup', function () {
  $('.form-search_box').fadeIn();
 });
 $(document).click(function (e) {
  if (!$(e.target).closest('.form-search').length) {
   $('.form-search_box').fadeOut();
  }
  e.stopPropagation();
 });

 /*header-nav*/
 $('.header-burger').click(function () {
  $(this).toggleClass('active');
  $('.header-nav').fadeToggle();
  return false;
 });

 /*section-more*/
 $('.section-more').click(function () {
  $(this).prev().addClass('active');
  $(this).addClass('active');
 });

 /*filter-reset*/
 $('.filter-reset').click(function () {
  $('input, select').not(':button, :submit, :reset, :hidden')
   .val('')
   .removeAttr('checked')
   .removeAttr('selected');
 });

 /*filter-add*/
 $('.filter-add').click(function () {
  $('.filter-add, .filter-hide').toggleClass('active');
 });

 /*casino-more*/
 $('.casino-more').click(function () {
  $('.casino-more, .casino-content').toggleClass('active');
 });

 /*faq-list*/
 $('.faq-list_point:nth-child(1)').eq(0).addClass('active');
 $('.faq-list_point:nth-child(1) .faq-list_bottom').eq(0).show();
 $('.faq-list_top').click(function () {
  $(this).parent().toggleClass('active');
  $(this).next().slideToggle();
  return false;
 });
 }, 0);

});

/*plus-slider*/
var plusSwiper = new Swiper('.plus-slider', {
 observer: true,
 observeParents: true,
 slidesPerView: 1,
 spaceBetween: 15,
 speed: 800,
 keyboard: {
  enabled: true,
 },
 breakpoints: {
  1200: {
   slidesPerView: 4,
   spaceBetween: 30,
  },
  800: {
   slidesPerView: 2,
   spaceBetween: 15,
  },
 },
});

$( document ).ready(function() {
//IFRAME
$('.game-demo').click(function (e) {
 e.preventDefault();
 $('.game-content').hide();
 $('.game-descr').hide();
 $('.game-info_wrap').addClass('active');
});

 //TABLE OF CONTENT
 const container = document.querySelector('.section-content');
 if (container) {
  const tpl = '<ol class="section-content_list">{{contents}}</ol>';
  let contents = '';
  const elHeaders = document.querySelectorAll('.wrapper h2');
  elHeaders.forEach((el, index) => {
   const url = ($(el).closest('section')).attr('id');
   console.log();
   contents += `<li>
            <a href="#${url}">${el.textContent}</a>
            </li>`;
  });
  container.insertAdjacentHTML('beforeend', tpl.replace('{{contents}}', contents));
 }
//TABLE OF CONTENT
});
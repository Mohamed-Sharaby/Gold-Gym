/*************Start-Swiper**************/
var mySwiper = new Swiper(".swiper-container", {
  loop: true,
  spaceBetween: 50,
  speed: 1000,
  effect: "fade",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
});

$(document).ready(function () {
  var o;
  /**************loader*************/
  jQuery(window).load(function () {
    $("#preloader").fadeOut(5000, function () {
      $("body").removeClass("loading");
    });
  }),
    /**************loader*************/
    $(".navbar a, .header a, .footer a, .top-nav a").click(function (o) {
      $("html, body").animate(
        {
          scrollTop: $($(this).attr("href")).offset().top,
        },
        1e3
      ),
        o.preventDefault();
    }),
    $("#nav-icon1").click(function () {
      $(this).toggleClass("open"),
        $(".navy").toggleClass("back-nav"),
        $(".nav-r").toggleClass("fixed-r"),
        $("body").toggleClass("body-mob");
    }),
    $(".navy ul.nav > li > a ").click(function () {
      $(this).toggleClass("open"),
        $("#nav-icon1").toggleClass("open"),
        $(".navy").toggleClass("back-nav"),
        $(".nav-r").toggleClass("fixed-r");
      $("body").toggleClass("body-mob");
    }),
    (o = $("#scroll-top")),
    $(window).scroll(function () {
      $(this).scrollTop() >= 500 ? o.show() : o.hide();
    }),
    $("#scroll-top").click(function () {
      $("html,body").animate(
        {
          scrollTop: 0,
        },
        600
      );
    });
  ///////////// Font awesome 5 on pseudo elements
  window.FontAwesomeConfig = {
    searchPseudoElements: true,
  };
  ///////////// current year
  document.getElementById("currentYear").innerHTML = new Date().getFullYear();

  /**************** Fixed Navbar ****************/
  $(window).scroll(function () {
    var st = $(window).scrollTop();
    if (st > 80) {
      $(".navbar").addClass("fixd_navbar");
    } else {
      $(".navbar").removeClass("fixd_navbar");
    }
  });

  /*********scrollspy navbar**********/
  $('[data-spy="scroll"]').each(function () {
    var $spy = $(this).scrollspy("refresh");
  });
});

/***************wow .js***************/
new WOW().init();
/***************wow .js***************/

/***************Work-Slider***************/
$("#work-slider").owlCarousel({
  stagePadding: 200,
  loop: true,
  margin: 10,
  nav: false,
  items: 1,
  lazyLoad: true,
  autoplay: true,
  autoplayTimeout: 3000,
  responsive: {
    0: {
      items: 1,
      stagePadding: 60,
    },
    600: {
      items: 1,
      stagePadding: 100,
    },
    1000: {
      items: 1,
      stagePadding: 200,
    },
    1200: {
      items: 1,
      stagePadding: 250,
    },
    1400: {
      items: 1,
      stagePadding: 300,
    },
    1600: {
      items: 1,
      stagePadding: 350,
    },
    1800: {
      items: 1,
      stagePadding: 400,
    },
  },
});
/***************Work-Slider***************/

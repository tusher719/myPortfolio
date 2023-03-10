$(document).ready(function () {
  "use strict";

  // website loading
  // var preloader = document.getElementById('loading');
  // function myFunction() {
  //     preloader.style.display = 'none';
  // }

  var window_width = $(window).width(),
    window_height = window.innerHeight,
    header_height = $(".default-header").height(),
    header_height_static = $(".site-header.static").outerHeight(),
    fitscreen = window_height - header_height;

  $(".fullscreen").css("height", window_height);
  $(".fitscreen").css("height", fitscreen);

  //------- Wow JS Initialized --------//
  new WOW().init();

  //------- tooltip JS Initialized --------//
  $('[data-toggle="tooltip"]').tooltip();

  //------- Go to Top --------//
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      $("#header1").addClass("header-scrolled1");
      $("#back-top").addClass("back-top-animation");
    } else {
      $("#header1").removeClass("header-scrolled1");
      $("#back-top").removeClass("back-top-animation");
    }
  });

  /* ---------------------------------------------
        scroll body to 0px on click
     --------------------------------------------- */
  $("#back-top a").on("click", function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      1000
    );
    return false;
  });

  /* ---------------------------------------------
       funny text
     --------------------------------------------- */
  /*$(document).ready(function() {
        $('.mySelector').funnyText({
            speed: 700,
            borderColor: 'black',
            activeColor: 'white',
            color: 'black',
            fontSize: '7em',
            direction: 'both'
        });
    });*/

  //------- Niceselect  js --------//

  // if (document.getElementById("default-select")) {
  //     $('select').niceSelect();
  // };
  // if (document.getElementById("service-select")) {
  //     $('select').niceSelect();
  // };

  //------- Pre Loader --------//
  // $(window).on('load', function () {
  //     $(".preloader-area").delay(200).fadeOut(500);
  // })

  //------- Lightbox  js --------//
  // $('.img-gal').magnificPopup({
  //     type: 'image',
  //     gallery: {
  //         enabled: true
  //     }
  // });

  // $('.play-btn').magnificPopup({
  //     type: 'iframe',
  //     mainClass: 'mfp-fade',
  //     removalDelay: 160,
  //     preloader: false,
  //     fixedContentPos: false
  // });

  //------- Filter  js --------//
  // $(window).on("load", function () {
  //     $('.filters ul li').on("click", function () {
  //         $('.filters ul li').removeClass('active');
  //         $(this).addClass('active');

  //         var data = $(this).attr('data-filter');
  //         $grid.isotope({
  //             filter: data
  //         })
  //     });

  //     if (document.getElementById("work")) {
  //         var $grid = $(".grid").isotope({
  //             itemSelector: ".all",
  //             percentPosition: true,
  //             masonry: {
  //                 columnWidth: ".all"
  //             }
  //         })
  //     };
  // });

  //------- Accordion  js --------//

  // jQuery(document).ready(function ($) {

  //     if (document.getElementById("accordion")) {

  //         var accordion_1 = new Accordion(document.getElementById("accordion"), {
  //             collapsible: false,
  //             slideDuration: 500
  //         });
  //     }
  // });

  //------- Superfist nav menu  js --------//

  $(".nav-menu").superfish({
    animation: {
      opacity: "show",
    },
    speed: 400,
  });

  //------- Mobile Nav  js --------//

  if ($("#nav-menu-container").length) {
    var $mobile_nav = $("#nav-menu-container").clone().prop({
      id: "mobile-nav",
    });
    $mobile_nav.find("> ul").attr({
      class: "",
      id: "",
    });
    $("body").append($mobile_nav);
    $("body").prepend(
      '<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>'
    );
    $("body").append('<div id="mobile-body-overly"></div>');
    $("#mobile-nav")
      .find(".menu-has-children")
      .prepend('<i class="lnr lnr-chevron-down"></i>');

    $(document).on("click", ".menu-has-children i", function (e) {
      $(this).next().toggleClass("menu-item-active");
      $(this).nextAll("ul").eq(0).slideToggle();
      $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
    });

    $(document).on("click", "#mobile-nav-toggle", function (e) {
      $("body").toggleClass("mobile-nav-active");
      $("#mobile-nav-toggle i").toggleClass("lnr-cross lnr-menu");
      $("#mobile-body-overly").toggle();
    });

    $(document).click(function (e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($("body").hasClass("mobile-nav-active")) {
          $("body").removeClass("mobile-nav-active");
          $("#mobile-nav-toggle i").toggleClass("lnr-cross lnr-menu");
          $("#mobile-body-overly").fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  //------- Smooth Scroll  js --------//

  $(".nav-menu a, #mobile-nav a, .scrollto").on("click", function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($("#header").length) {
          top_space = $("#header").outerHeight();

          if (!$("#header").hasClass("header-fixed")) {
            top_space = top_space;
          }
        }

        $("html, body").animate(
          {
            scrollTop: target.offset().top - top_space,
          },
          1500,
          "easeInOutExpo"
        );

        if ($(this).parents(".nav-menu").length) {
          $(".nav-menu .menu-active").removeClass("menu-active");
          $(this).closest("li").addClass("menu-active");
        }

        if ($("body").hasClass("mobile-nav-active")) {
          $("body").removeClass("mobile-nav-active");
          $("#mobile-nav-toggle i").toggleClass("lnr-times lnr-bars");
          $("#mobile-body-overly").fadeOut();
        }
        return false;
      }
    }
  });

  $(document).ready(function () {
    $("html, body").hide();

    if (window.location.hash) {
      setTimeout(function () {
        $("html, body").scrollTop(0).show();

        $("html, body").animate(
          {
            scrollTop: $(window.location.hash).offset().top - 108,
          },
          1000
        );
      }, 0);
    } else {
      $("html, body").show();
    }
  });

  //------- Header Scroll Class  js --------//

  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $("#header").addClass("header-scrolled");
    } else {
      $("#header").removeClass("header-scrolled");
    }
  });

  //------- Owl Carusel  js --------//
  if ($(".active-brand-carusel").length) {
    $(".active-brand-carusel").owlCarousel({
      items: 5,
      loop: true,
      autoplayHoverPause: true,
      autoplay: true,
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 3,
        },
        991: {
          items: 4,
        },
        1024: {
          items: 5,
        },
      },
    });
  }

  if ($(".testi_slider").length) {
    $(".testi_slider").owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      nav: false,
      autoplay: 2500,
      smartSpeed: 1500,
      dots: true,
      responsiveClass: true,
    });
  }
});

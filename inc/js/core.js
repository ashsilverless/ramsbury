//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

    $("html").delay(100).queue(function(next) {
        $(this).addClass("loaded");

        next();
    });

    $(document).ready(function( $ ) {
      $( ".toggle" ).first().addClass( "active" );
    });

/* GET HEIGHT OF NAV*/
    
    $(document).ready(function() {
        var element = document.getElementById('nav');
        var navHeight = element.offsetHeight;
        //Use height var to set padding of page content
        $(".content.no-hero").css("padding-top", navHeight);   
    });
    
/* ADD CLASS ON SCROLL*/

	$(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });
 
//Smooth Scroll

    $('nav a, a.button, a.next-section').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top -100
        }, 500);
        return false;
    });

// ========== Controller for lightbox elements

    $(document).ready(function() {

        $('.lightbox-gallery').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
    });
 
// GLOBAL OWL CAROUSEL SETTINGS

    $('.carousel').owlCarousel({
        animateOut: 'fadeOut',
        loop:true,
        margin:10,
        nav:true,
    	navClass: ['owl-prev', 'owl-next'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.testimonial-slider').owlCarousel({
        autoplay:true,
        autoplayTimeout:10000,
        loop:true,
        margin:10,
        nav: false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            2000:{
                items:1
            }
        }
    })

/* CLASS AND FOCUS ON CLICK */

    $('.menu-trigger').click(function() {
        $('.hamburger').toggleClass('is-active');
        $(".nav-menu").toggleClass("menu-open");
    });

    $('.multi-panel__trigger').click(function() {
        $(".multi-panel__trigger.active").removeClass("active");
        $(this).addClass('active');
    });

    $('.menu-item a').click(function() {
        $(".nav-wrapper").removeClass("menu-open");
        $(".nav-wrapper__trigger.is-active").removeClass("is-active");
    });

    $(".openTrigger").click(function(event) {
      $('.content__hidden').addClass("show");
      $(this).addClass("hide");
    });

    $(".closeTrigger").click(function(event) {
      $('.content__hidden').removeClass("show");
      $('.openTrigger').removeClass("hide");
    });

    $(".trigger-copy-expand").click(function(event) {
      $('.collapsed-content').addClass("expand");
      $(this).hide();
       $('.trigger-copy-collapse').show();     
    });

    $(".trigger-copy-collapse").click(function(event) {
        $('.collapsed-content').removeClass("expand");
        $(this).hide();
        $('.trigger-copy-expand').show();     
    });


    $(".trigger-expand").click(function(event) {
        $(this).closest('.expanding-copy').addClass("expand");
    });

    $(".trigger-collapse").click(function(event) {
        $(this).closest('.expanding-copy').removeClass("expand");
    });

    $(".toggle").click(function() {   
      	$('.toggle.active').removeClass("active"); 
        $(this).addClass("active");   
    });

// ========== Filtering controller (mixitup)

if($('#mixitup-camps').length) {

var campsMixer = mixitup('#mixitup-camps', {
    load: {
        filter: 'all'
    },
    selectors: {
        control: '.mixitup-control'
    },
    pagination: {
        limit: 6,
        maintainActivePage: false,
        loop: true,
        hidePageListIfSinglePage: true
    },
    callbacks: {
        onMixEnd: function() {
            jQuery(window).trigger('resize').trigger('scroll');
        }
    }
});
}

if($('#mixitup-camps-villas').length) {

    var campsVillasMixer = mixitup('#mixitup-camps-villas', {
        load: {
            filter: 'all'
        },
        selectors: {
            control: '.mixitup-control'
        },
        pagination: {
            limit: 18,
            maintainActivePage: false,
            loop: true,
            hidePageListIfSinglePage: true
        },
        callbacks: {
            onMixEnd: function() {
                jQuery(window).trigger('resize').trigger('scroll');
            }
        }
    });
}

if($('#mixitup-posts-from-past').length) {

    var postMixer = mixitup('#mixitup-posts-from-past', {
        load: {
            filter: 'all'
        },
        selectors: {
            control: '.mixitup-control'
        },
        pagination: {
            limit: 6,
            maintainActivePage: false,
            loop: true,
            hidePageListIfSinglePage: true
        },
        callbacks: {
            onMixEnd: function() {
                jQuery(window).trigger('resize').trigger('scroll');
            }
        }
    });
}

});//Don't remove ---- end of jQuery wrapper

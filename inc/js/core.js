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
    
/* LOAD MAP*/
    
    $(document).ready(function() {
	    var points = JSON.parse($("#map-contact").attr("points"));
	    
        mapboxgl.accessToken = 'pk.eyJ1IjoiYW5nZWxsYXNpbHZlcmxlc3MiLCJhIjoiY2p1OWpqejNpMjhzaTQ0bnI4OHV1bWxmZiJ9.vley8saF98a3rzT-AsE-YQ';
        
		var map = new mapboxgl.Map({
		    container:  'map-contact',
		    style:      'mapbox://styles/mapbox/navigation-guidance-day-v2',
		    center:     [-1.729931, 51.420942],
		    zoom:       15,
		    scrollZoom: false
		});
		
		map.addControl(new mapboxgl.NavigationControl(), 'top-right');
		
		var geocoder = new MapboxGeocoder({
			accessToken: mapboxgl.accessToken,
			marker: {
				color: 'grey'
			},
			countries: 'gb',
			mapboxgl: mapboxgl
		});
		
		map.addControl(geocoder, 'top-left');
		
		var geojson = {
			type: 'FeatureCollection',
			features: points
		};
		
		var coorPoints = [];
		
		geojson.features.forEach(function(marker) {

			var el = document.createElement('div');
			el.className = 'marker';
			
			new mapboxgl.Marker(el)
				.setLngLat(marker.geometry.coordinates)
				.setPopup(new mapboxgl.Popup({ offset: 25 })
				.setHTML(
			    	'<div class="name">'    + marker.properties.name     + '</div>' +
			    	'<div class="address">' + marker.properties.address  + '</div>' +
			    	'<div class="address">' + marker.properties.postcode + '</div>' +
			    	'<div class="phone">'   + marker.properties.phone    + '</div>' +
			    	'<div class="buttons-popup">' +
				    	'<a target="_blank" href="https://www.google.com/maps/dir//' + 
				    	marker.properties.directions + '/@' + marker.geometry.coordinates[1] + ',' + marker.geometry.coordinates[0] + ',15z' +
				    	'">Get Directions</a>' +
						'<a target="_blank" href="' + marker.properties.website + '">Visit Website</a>' +
					'</div>'))
				.addTo(map);
			
			el.addEventListener('click', function(e){
				map.flyTo({
				    center: marker.geometry.coordinates,
				    zoom: 15
			    });
			});
			
			coorPoints.push(new mapboxgl.LngLat(marker.geometry.coordinates[0], marker.geometry.coordinates[1]));
		});
		
		geocoder.on("result", function(e) {
			var distance = [];
			var searchPoint = new mapboxgl.LngLat(e.result.geometry.coordinates[0], e.result.geometry.coordinates[1]);
			
			coorPoints.forEach(function(markerPoint) {
				distance.push({
					'point': markerPoint,
					'distance': distanceBetweenPoints(searchPoint, markerPoint)
				});
			});
			
			var minDistance = distance.reduce(function(prev, curr) {
			    return prev.distance < curr.distance ? prev : curr;
			});
			
			var bounds = new mapboxgl.LngLatBounds();

			bounds.extend(minDistance.point);
			bounds.extend(searchPoint);
			
			map.fitBounds(bounds, { padding: 100 });
		});
		
		$(window).bind('mousewheel DOMMouseScroll', function(event) {
		    if(event.ctrlKey == true) {
		        map['scrollZoom'].enable();
		    }
		    else {
		        map['scrollZoom'].disable();
		    }
		});
		
		function distanceBetweenPoints(point1, point2) {
			var R = 6371e3; // metres
			var φ1 = point1.lat.toRadians();
			var φ2 = point2.lat.toRadians();
			var Δφ = (point2.lat-point1.lat).toRadians();
			var Δλ = (point2.lng-point1.lng).toRadians();
			
			var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
			        Math.cos(φ1) * Math.cos(φ2) *
			        Math.sin(Δλ/2) * Math.sin(Δλ/2);
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
			
			var d = R * c;
			return d;
		}
		
		function getMiddlePoint(point1, point2) {
			var lat = (point1.lat + point2.lat) / 2;
			var lng = (point1.lng + point2.lng) / 2;
			return [lng, lat];
		}
		
		Number.prototype.toRadians = function() {
			return this * Math.PI / 180;
		};
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

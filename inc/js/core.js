//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend mixitup.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function( $ ) {

/* ADD CLASS ON LOAD*/

    $("html").delay(1500).queue(function(next) {
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

/* ADJUST NAV ON SCROLL*/

$(function() {
    //caches a jQuery object containing the header element
    var header = $("nav");
    
    $(document).ready(function( $ ) {
		var scroll = $(window).scrollTop();
		
		if (scroll >= 10) {
			header.addClass("dark");
		} else {
			header.removeClass("dark");
		}
    });
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            header.addClass("dark");
        } else {
            header.removeClass("dark");
        }
    });
});
 
//Smooth Scroll

    $('nav a, a.button, a.next-section').click(function(){
	    if($(this).attr('href') != "#") {
	        $('html, body').animate({
	            scrollTop: $( $(this).attr('href') ).offset().top -100
	        }, 500);
	        return false;
	    }
    });
    
/* Tour Booking Control */
	
	$(document).ready(function() {
		if($("#tour-datepicker").length) {
		
			$.ajax({
				'type' :     'POST',
				'dataType':  'JSON',
				'data':      {'action':'available_dates'},
				'url':       ajax_object.ajax_url,
				'success': function(response) {
					loadTourBooking(response);
				}
			});

			function loadTourBooking(dates_all) {
				$("#tour-datepicker").datepicker({
					firstDay: 0,
					minDate: 0,
					dateFormat: 'yy-mm-dd',
					beforeShowDay: function(date) {
						var result = false;
						
						for(var i = 0; i < dates_all.length; i++) {
							
							if(dates_all[i].recurrence == "once") {
								result = formatDate(date) == dates_all[i]["date"];
							}
							else if(dates_all[i].recurrence == "weekly") {
								result = new Date(dates_all[i]["date"]).getDay() == date.getDay() && formatDate(date) >= dates_all[i]["date"];
							}
							else if(dates_all[i].recurrence == "monthly") {
								result = new Date(dates_all[i]["date"]).getDate() == date.getDate() && formatDate(date) >= dates_all[i]["date"];
							}
							
							if(result)
								return [result, ''];
						}
						
						return [result, ''];
					},
					onSelect: function(date) {
						clearInfo(["time", "number", "error", "total"]);
						$.ajax({
							type: 'POST',
							dataType: 'JSON',
							data: {
								action:'available_hours',
								date: date
							},
							url: ajax_object.ajax_url,
							success: function(response){
								$("#time-booking").html(response);
								$("#tour-datepicker").attr("date-booking", date);
								$("#time-booking").val("");
								$("#quantity-booking").val("");
								$(".spots-remaining").html("");
								$(".summary span.sum-date").text(date.split("-").reverse().join("/"));
								$(".tour-total").attr("cost", undefined);
							}
						});
					}
				});
				
				$("#tour-datepicker").find('a.ui-state-highlight').removeClass('ui-state-highlight');
				$("#tour-datepicker").find('a.ui-state-active').removeClass('ui-state-active');
				
				$("#tour-datepicker").val("");
				$("#tour-datepicker").show();
				
				$(".input-tour select").on("change", function() {
					var date = $("#tour-datepicker").attr("date-booking");
					if(!date) {
						$(".tour-error").text("Please select a date");
						return false;
					}
					
					var time = $("#time-booking").find(":selected").val();
					if(!time) {
						$(".tour-error").text("Please select a time");
						return false;
					}
					
					var data = {
						"action": "get_availability",
						"date": date,
						"time": time
					};
					
					clearInfo(["number", "error", "total"]);
					$.post(ajax_object.ajax_url, data, function(response) {
						response = JSON.parse(response);
						if(response.success) {
							$("#quantity-booking").val("");
							$("#quantity-booking").attr("max", response.success.availability.quantity);
							$(".spots-remaining").html(response.success.availability.description);
							$(".summary span.sum-time").text(time);
							$(".tour-total").attr("cost", response.success.cost);
							getTotal(false);
						} else if(response.error) {
							$(".tour-error").text(response.error);
						}
					});
				});
				
				$(".input-tour input#quantity-booking").on("input", function() {
					quantityChange();
				});
				
				$(".input-tour input#quantity-booking").on("change", function() {
					quantityChange();
				});
				
				$(".input-tour button.book-tour").on("click", function() {
					var date = $("#tour-datepicker").attr("date-booking");
					if(!date) {
						$(".tour-error").text("Please select a date");
						return false;
					}
					
					var time = $("#time-booking").find(":selected").val();
					if(!time) {
						$(".tour-error").text("Please select a time");
						return false;
					}
					
					var quantity = parseInt($("#quantity-booking").val());
					if(!quantity) {
						$(".tour-error").text("Please provide number of visitors'");
						return false;
					}
					
					$.ajax({
						type: 'POST',
						dataType: 'JSON',
						data: {
							action:'add_to_cart',
							date: date,
							time: time,
							quantity: quantity
						},
						url: ajax_object.ajax_url,
						success: function(response){
							window.location.href = ajax_object.checkout_url;
						}
					});
				});
				
				$(".input-tour select").on("click", function() {
					var date = $("#tour-datepicker").attr("date-booking");
					if(!date) {
						$(".tour-error").text("Please select a date");
						return false;
					}
				});
				
				$(".minus-custom").on("click", function() {
					var value = $("#quantity-booking").val();
					value = value ? value : 0;
					value--;
					$("#quantity-booking").val(value);
					$("#quantity-booking").trigger("change");
				});
				
				$(".plus-custom").on("click", function() {
					var value = $("#quantity-booking").val();
					value = value ? value : 0;
					value++;
					$("#quantity-booking").val(value);
					$("#quantity-booking").trigger("change");
				});
				
			}
			
			function getTotal(set) {
				if(set) {
					var number = Number($("input#quantity-booking").val());
					var cost = $(".tour-total").attr("cost");
					
					if((cost || cost === "0") && Number.isInteger(number)) {
						$(".tour-total span").html("&#163;&#160;" + (cost * number));
					}
				} else {
					clearInfo("total");
				}
					
			}
			
			function quantityChange() {
				field = $("#quantity-booking");
				
				var min = parseInt($(field).attr("min"));
				var max = parseInt($(field).attr("max"));
				var val = parseInt($(field).val());
				
				val = val < 0 ? 0 : val;
				
				if(!val) {
					$(field).val("");
					$(".summary span.sum-number").text("");
				} else { 
			        if(val < min)
			            val = min;
			        else if(val > max)
			            val = max;
			            
			        $(field).val("");
					$(field).val(val);
			        
			        
					$(".summary span.sum-number").text(val);
					clearInfo(["error", "total"]);
					
					getTotal(true);
				}
			}
			
			function formatDate(date) {
			    var d = new Date(date),
			        month = '' + (d.getMonth() + 1),
			        day   = '' + d.getDate(),
			        year  = d.getFullYear();
			
			    if (month.length < 2) month = '0' + month;
			    if (day.length   < 2) day   = '0' + day;
			
			    return [year, month, day].join('-');
			}
			
			function clearInfo(info) {
				if(!(info instanceof Array))
					info = [info];
					
				if(info.includes("date"))
					$(".summary span.sum-date").text("");
					
				if(info.includes("time"))
					$(".summary span.sum-time").text("");
					
				if(info.includes("number"))
					$(".summary span.sum-number").text("");
				
				if(info.includes("error"))
					$(".tour-error").text("");
				
				if(info.includes("total"))
					$(".tour-total span").text("");
			}
		}

	});

    
/* LOAD MAP */
    
    $(document).ready(function() {
			
		if($("#map-contact").length > 0 && JSON.parse($("#map-contact").attr("points"))) {
		    var points = JSON.parse($("#map-contact").attr("points"));
		    
	        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
	        
			var map = new mapboxgl.Map({
			    container:  'map-contact',
			    style:      'mapbox://styles/silverless/cjvnw465y0bl91cmionu5nqmo',
			    center:     [-1.729931, 51.420942],
			    zoom:       11, 
			    scrollZoom: false
			});
			
			map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
			
			var geocoder = new MapboxGeocoder({
				accessToken: mapboxgl.accessToken,
				marker: {
					color: 'grey'
				},
				countries: 'gb',
				mapboxgl: mapboxgl,
				flyTo: false
			});
			
			map.addControl(geocoder, 'bottom-left');
			
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
					position = marker.geometry.coordinates[1] + 0.0030;
					map.flyTo({
					    center: [marker.geometry.coordinates[0], position],
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
		}
		
    });

    $(document).ready(function() {
			
		if($("#brewery-map-contact").length > 0 && JSON.parse($("#brewery-map-contact").attr("points"))) {
		    var points = JSON.parse($("#brewery-map-contact").attr("points"));
		    
	        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
	        
			var map = new mapboxgl.Map({
			    container:  'brewery-map-contact',
			    style:      'mapbox://styles/silverless/cjvnw465y0bl91cmionu5nqmo',
			    center:     [-1.65569, 51.45109],
			    zoom:       11,
			    scrollZoom: false
			});
			
			map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
			
			var geocoder = new MapboxGeocoder({
				accessToken: mapboxgl.accessToken,
				marker: {
					color: 'grey'
				},
				countries: 'gb',
				mapboxgl: mapboxgl,
				flyTo: false
			});
			
			map.addControl(geocoder, 'bottom-left');
			
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
				    	'<div class="name">Ramsbury Brewery & Distillery</div>' +
				    	'<div class="address">' + marker.properties.address  + '</div>' +
				    	'<div class="phone">'   + marker.properties.phone    + '</div>'))
					.addTo(map);
				
				el.addEventListener('click', function(e){
					position = marker.geometry.coordinates[1] + 0.0030;
					map.flyTo({
					    center: [marker.geometry.coordinates[0], position],
					    zoom: 13
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
		}
		
    });






/* PLAY AND PAUSE VIDEO HOME */
	
	$(document).ready(function() {
		
		$(".modal-toggle.play-video").on("click", function() {
			$('.modal .video')[0].currentTime = 0;
			$('.modal .video')[0].play();
			$('.modal').toggleClass('is-visible');
			$('html').toggleClass('no-scroll');
		});
		
		$(".modal-toggle.pause-video").on("click", function() {
			$('.modal .video')[0].pause();
			$('.modal').toggleClass('is-visible');
			$('html').toggleClass('no-scroll');
		});
		
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

    $('.large-carousel').owlCarousel({
        loop:true,
        nav:false,
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

    $('.small-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplaySpeed: 9000,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        nav:false,
    	    navClass: ['owl-prev', 'owl-next'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1000:{
                items:7
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

    $('.about-carousel').owlCarousel({
        loop:false,
        nav:false,
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

/* CLASS AND FOCUS ON CLICK */

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
	    $(this).closest('.expanding-copy').find('.trigger-expand').hide()
        $(this).closest('.expanding-copy').addClass("expand");
	    $(this).closest('.expanding-copy').find('.trigger-collapse').show()
    });

    $(".trigger-collapse").click(function(event) {
	    var that = this;
        $(this).closest('.expanding-copy').removeClass("expand");
        setTimeout(function() {
	        $(that).closest('.expanding-copy').find('.trigger-collapse').hide()
	        $(that).closest('.expanding-copy').find('.trigger-expand').show();
	    }, 500);
    });

    $(".toggle").click(function() {   
      	$('.toggle.active').removeClass("active"); 
        $(this).addClass("active");   
    });

    $(".search-trigger").click(function() {
        $('#searchform').addClass("expand");
        $(this).hide();
    });
    
// ==========Add AJAX functions to quantity buttons on product pages

$(document).on('click', '.plus', function(e) { // replace '.quantity' with document (without single quote)
    $input = $(this).prev('input.qty');
    var val = parseInt($input.val());
    var step = $input.attr('step');
    step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
    $input.val( val + step ).change();
});
$(document).on('click', '.minus',  // replace '.quantity' with document (without single quote)
    function(e) {
    $input = $(this).next('input.qty');
    var val = parseInt($input.val());
    var step = $input.attr('step');
    step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
    if (val > 0) {
        $input.val( val - step ).change();
    }
});

});//Don't remove ---- end of jQuery wrapper

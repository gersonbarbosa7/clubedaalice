(function(){
	'use strict';

	$ = jQuery.noConflict();


	$('.menu-responsivo').click( function() {
	    $(".menu-responsivo").toggleClass("ativo");
	    $(".menu-categorias").toggleClass("visible");
	});

	$('.expandir').click(function(){
		$('.cats').toggle();
		$(this).toggleClass('ativado');
	});

	$('.chamada').click( function() {
	    $(".chamada").toggleClass("ativo");
	    $(".menu-dropdown").toggleClass("visible");
	});

	

	$("#main-nav li").hover(function () {
    	$(this).toggleClass("active");
 	});

	$("#top-bar li").hover(function () {
    	$(this).toggleClass("active");
 	});

 	$('.categorias-empresas').owlCarousel({
	    loop : false,
	    margin : 0,
	    nav : true,
	    dots: false,
	    navText : ['<svg width="35px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><g><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>', '<svg width="35px" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><g><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>'],
	    responsive:{
	        0:{
	            items:3
	        },
	        600:{
	            items:8
	        },
	        1000:{
	            items:11,
	            dots : true,
	            nav : false
	        }
	    }
	});

	$('.galeria').owlCarousel({
	    loop : true,
	    margin : 20,
	    nav : false,
	    autoplay: true,
	    responsive:{
	        0:{
	            items:2
	        },
	        600:{
	            items:4
	        },
	        1000:{
	            items:5
	        }
	    }
	});

	$('.slide-home').owlCarousel({
	    loop : true,
	    margin : 0,
	    nav : false,
	    dots: true,
	    autoplay: true,
	    items: 1
	});

	$('#banner_destaque').owlCarousel({
	    loop : false,
	    margin : 0,
	    nav : false,
	    dots: true,
	    autoplay: true,
	    items: 1
	});
})();
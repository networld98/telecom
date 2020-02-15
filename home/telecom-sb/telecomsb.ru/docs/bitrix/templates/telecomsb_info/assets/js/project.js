(function(window){
"use strict";


/*************************************************************************


      P   R   E   P   A   R   I   N   G       S   C   R   I   P   T


*************************************************************************/


/*************************************************************************

                              B A S I C S

*************************************************************************/


var Engine = window.Engine,
	Codevia = window.Codevia,
	$document = $(window.document),
	$window = $(window),
	query = Codevia.queryServer;


var onWndResize = Codevia.onWndResize,
	onScreenScroll = Codevia.onScreenScroll;


var requestAnimationFrame = Codevia.requestAnimationFrame;


var scrollTop = Codevia.scrollTop;


var animate = Codevia.animate;


var absolute_offset = Codevia.absoluteOffset;


var afterEvents = Codevia.afterEvents;


var let_string = Codevia.let_string,
	clean_spaces = Codevia.clean_spaces;



/*************************************************************************
          
                           P R O M I S E S

*************************************************************************/


var documentReady = Engine.documentReady,
	documentComplete = Engine.documentComplete;



/*************************************************************************


          D   O   C   U   M   E   N   T       R   E   A   D   Y


*************************************************************************/


$(document).ready(function(){


if(!$('.page-content:first').hasClass('project-page')) return;




/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var swiper = null;


let to = null;


function resize(){

	if(swiper){
		swiper.destroy();
		swiper = null;
	}

	$('.project-page .nav-section .nav>*').removeClass('disabled').first().addClass('disabled');

	if($('.project-page .gallery-section .list .slides .swiper-slide').length>1){

		$('.project-page .nav-section .nav').removeClass('hidden');

		$('.project-page .gallery-section .list .slides').removeClass('inactive');

		$('.project-page .counter-section').removeClass('hidden');

		swiper = new Swiper($('.project-page .gallery-section .list .slides')[0],{

			spaceBetween: 120,

			centeredSlides: true,

			slidesPerView: 'auto',


			breakpoints: {

				1280:{

					spaceBetween: 100

				},

				1024:{

					spaceBetween: 80

				},

				960:{

					spaceBetween: 64

				},

				640:{
					slidesPerView: 1,
					centeredSlides: false,
					spaceBetween: 40,

					autoHeight: true,
				}

			},

			on: {

				slideChange(){

					if(!swiper) return;

					$('.counter-section .counter>*').first().text(swiper.realIndex+1);

					if(swiper.isBeginning){

						$('.project-page .nav-section .nav>*').first().addClass('disabled');

					}else{

						$('.project-page .nav-section .nav>*').first().removeClass('disabled');

					}

					if(swiper.isEnd){

						$('.project-page .nav-section .nav>*').last().addClass('disabled');

					}else{

						$('.project-page .nav-section .nav>*').last().removeClass('disabled');

					}

				}

			}

		});

	}else{

		$('.project-page .nav-section .nav').addClass('hidden');

		$('.project-page .gallery-section .list .slides').addClass('inactive');

		$('.project-page .counter-section').addClass('hidden');

	}

	if(to){
		clearTimeout(to);
		to = null;
	}

	to = setTimeout(function(){

		to = null;

		if(swiper) swiper.update();

	},1000);

}

onWndResize(resize);

resize();


$('.project-page .nav-section .nav .prev').click(function(){
	
	if(!swiper) return;
	
	swiper.slidePrev();
	
});


$('.project-page .nav-section .nav .next').click(function(){
	
	if(!swiper) return;
	
	swiper.slideNext();
	
});



})();





});



})(window);
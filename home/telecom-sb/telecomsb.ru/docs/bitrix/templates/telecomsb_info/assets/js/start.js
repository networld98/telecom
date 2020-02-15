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


if(!$('.page-content:first').hasClass('start-page')) return;




/*************************************************************************

                               I M A G E S

*************************************************************************/



(function(){


var swiper = null;


$('.start-page .top-section .news .nav .prev').click(function(){

	if(!swiper) return;

	swiper.slidePrev();

});


$('.start-page .top-section .news .nav .next').click(function(){

	if(!swiper) return;

	swiper.slideNext();

});


var to = null;


function resize(){

	if(swiper){
		swiper.destroy();
		swiper = null;
	}

	$('.start-page .top-section .news .nav>*').removeClass('disabled').first().addClass('disabled');

	const
		ww = $window.outerWidth(),
		slidesCount = $('.start-page .top-section .news .list .swiper-slide').length,
		useSwiper = ww>1024&&slidesCount>2||ww<=1024&&slidesCount>1;

	console.log(ww,slidesCount,useSwiper)

	if(useSwiper){

		$('.start-page .top-section .news .nav').removeClass('hidden');

	}else{

		$('.start-page .top-section .news .nav').addClass('hidden');

	}

	if(useSwiper) swiper = new Swiper($('.start-page .top-section .news .list')[0],{

		slidesPerColumn: 2,

		spaceBetween: 20,

		breakpoints: {

			1024: {

				slidesPerColumn: 1

			}

		},

		on:{

			slideChange(){

				if(!swiper) return;

				if(swiper.isBeginning){

					$('.start-page .top-section .news .nav>*').first().addClass('disabled');

				}else{

					$('.start-page .top-section .news .nav>*').first().removeClass('disabled');

				}

				if(swiper.isEnd){

					$('.start-page .top-section .news .nav>*').last().addClass('disabled');

				}else{

					$('.start-page .top-section .news .nav>*').last().removeClass('disabled');

				}

			}

		}

	});

	if(to) clearTimeout(to);

	to = setTimeout(function(){

		if(swiper) swiper.update();

	},1000);

}


onWndResize(resize);

resize();



})();




});



})(window);
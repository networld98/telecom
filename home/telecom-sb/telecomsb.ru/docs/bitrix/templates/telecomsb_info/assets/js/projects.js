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


if(!$('.page-content:first').hasClass('projects-page')) return;




/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var swiper = null;


function resize(){

	if(swiper) swiper.destroy();

	const $items = $('.projects-page .gallery-section .list .slides .swiper-wrapper .item:not(.dup)').toArray().map(function(el){

		const $el = $(el);

		$el.detach();

		return $el;

	});


	$('.projects-page .gallery-section .list .slides .swiper-wrapper').empty();


	if($window.outerWidth()>640){

		for(let index=0;index<$items.length;index+=2){

			const $slide = $('<div class="swiper-slide"></div>');

			$('.projects-page .gallery-section .list .slides .swiper-wrapper').append($slide.append($items[index]))

			if(index>=($items.length-1)) continue;

			$slide.append($items[index+1]);

		}

		if($('.projects-page .gallery-section .list .slides .swiper-slide:last>*').length==1) $('.projects-page .gallery-section .list .slides .swiper-slide:last').append('<div class="item dup"></div>');


		$('.projects-page .gallery-section .nav>*').removeClass('disabled').first().addClass('disabled');


		if($('.projects-page .gallery-section .list .slides .swiper-slide').length>1){

			$('.projects-page .gallery-section .nav').removeClass('hidden');
			
			swiper = new Swiper($('.projects-page .gallery-section .list .slides')[0],{

				spaceBetween: 120,

				breakpoints: {

					1280: {
						
						spaceBetween: 100
						
					},

					1024: {
						
						spaceBetween: 80
						
					},

					960: {
						
						spaceBetween: 64
						
					}

				},

				on:{

					slideChange(){

						if(!swiper) return;

						if(swiper.isBeginning){

							$('.projects-page .gallery-section .nav>*').first().addClass('disabled');

						}else{

							$('.projects-page .gallery-section .nav>*').first().removeClass('disabled');

						}

						if(swiper.isEnd){

							$('.projects-page .gallery-section .nav>*').last().addClass('disabled');

						}else{

							$('.projects-page .gallery-section .nav>*').last().removeClass('disabled');

						}

					}

				}

			});

		}else{

			$('.projects-page .gallery-section .nav').addClass('hidden');

		}


	}else{

		
		for(const $item of $items){

			$('.projects-page .gallery-section .list .slides .swiper-wrapper').append($('<div class="swiper-slide"></div>').append($item))

		}

		if($('.projects-page .gallery-section .list .slides .swiper-slide').length>1){

			$('.projects-page .gallery-section .nav').removeClass('hidden');
			
			swiper = new Swiper($('.projects-page .gallery-section .list .slides')[0],{
				spaceBetween: 20
			});

		}else{

			$('.projects-page .gallery-section .nav').addClass('hidden');

		}


	}


}



$('.projects-page .gallery-section .nav>*.prev').click(function(){

	if(swiper) swiper.slidePrev();

});


$('.projects-page .gallery-section .nav>*.next').click(function(){

	if(swiper) swiper.slideNext();

});



Codevia.onValueChange('projects-page-gallery-section',function(){

	return [$window.outerWidth()>640]

})(resize);

resize();


})();





});



})(window);
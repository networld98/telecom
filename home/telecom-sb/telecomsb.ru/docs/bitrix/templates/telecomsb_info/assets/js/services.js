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


if(!$('.page-content:first').hasClass('services-page')) return;




/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var swiper = null;


function resize(){

	const $list = $('.services-page .top-section .list');

	const $items = $list.find('.swiper-slide').toArray().map(el=>$(el));

	for(const $item of $items) $item.removeClass('first-line last-line last-of-line last-of-max-line');

	if($window.outerWidth()>640){
		
		if(swiper){

			swiper.destroy();

			swiper = null;

		}

		const ww = $window.outerWidth();

		const ITEMS_PER_LINE = ww>960?5:2;

		console.log(ITEMS_PER_LINE);

		if($items.length<=ITEMS_PER_LINE){

			$list.addClass('one-line');

			for(const $item of $items) $item.addClass('first-line last-line');

			$items[$items.length-1].addClass('last-of-line');

		if(($items.length%ITEMS_PER_LINE)==0) $items[$items.length-1].addClass('last-of-max-line');

		}else{

			$list.removeClass('one-line');

			for(let index=0;index<ITEMS_PER_LINE;index++) $items[index].addClass('first-line');

			for(let base=0;base<$items.length;base+=ITEMS_PER_LINE){

				let index = Math.min(base+ITEMS_PER_LINE,$items.length)-1;

				$items[index].addClass('last-of-line');

				if((index+1)%ITEMS_PER_LINE==0) $items[index].addClass('last-of-max-line');

			}

			for(let index = $items.length - (($items.length%ITEMS_PER_LINE)||ITEMS_PER_LINE);index<$items.length;index++){

				$items[index].addClass('last-line');

			}

		}

	}else{

		if(swiper) return;

		$('.services-page .top-section .nav>*').removeClass('disabled').first().addClass('disabled');

		swiper = new Swiper($('.services-page .top-section .list')[0],{

			on:{

				slideChange(){

					if(!swiper) return;

					if(swiper.isBeginning){

						$('.services-page .top-section .nav>*').first().addClass('disabled');

					}else{

						$('.services-page .top-section .nav>*').first().removeClass('disabled');

					}

					if(swiper.isEnd){

						$('.services-page .top-section .nav>*').last().addClass('disabled');

					}else{

						$('.services-page .top-section .nav>*').last().removeClass('disabled');

					}

				}

			}

		});

	}

}


onWndResize(resize);

resize();



$('.services-page .top-section .nav>*.prev').click(function(){

	if(!swiper) return;

	swiper.slidePrev();

});


$('.services-page .top-section .nav>*.next').click(function(){

	if(!swiper) return;

	swiper.slideNext();

});



})();




});



})(window);
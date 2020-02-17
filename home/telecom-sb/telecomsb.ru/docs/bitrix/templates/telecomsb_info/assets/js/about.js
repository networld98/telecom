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


if(!$('.page-content:first').hasClass('about-page')) return;


$('.page-header').addClass('transparent');


/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var $slider = $('.about-page .history-section .nav .controller'),
	$slides = $('.about-page .history-section .nav .controller .swiper-wrapper'),
	$firstSlide = $('.about-page .history-section .nav .controller .swiper-wrapper .swiper-slide:not(.dup)').first(),
	$view = $('.about-page .history-section .nav .view-wrapper .view>*'),
	$viewItems = $view.children().toArray().map(function(el){
		return $(el);
	});

var SPACE = 48;

var ITEMS_PER_SCREEN = 8;

var BIG_ITEM_FRACTION = .4;


var infoSwiper = null,
	swiper = null;

var to = null;


function resize(){
	
	if(infoSwiper) infoSwiper.destroy();

	if(swiper) swiper.destroy();

	var ww = $window.outerWidth();


	infoSwiper = null;

	swiper = null;


	SPACE = (ww>1024?48:ww>960?32:24);

	ITEMS_PER_SCREEN = (ww>1440?8:ww>960?6:5);

	BIG_ITEM_FRACTION = (ww>1440?.4:.5);



	$viewItems = $view.children().toArray().map(function(el){
		return $(el);
	});


	
	$('.about-page .history-section .nav .controller .dup').slice(1).remove();

	$('.about-page .history-section .nav .controller .swiper-wrapper').first().append('<div class="swiper-slide dup"></div>'.repeat(ITEMS_PER_SCREEN - 2));


	$('.about-page .history-section .nav .view-wrapper .dup').slice(1).remove();

	$('.about-page .history-section .nav .view-wrapper .swiper-wrapper').first().append('<div class="dup"></div>'.repeat(ITEMS_PER_SCREEN - 2));



	if(ww>=640) swiper = new Swiper($('.about-page .history-section .nav .controller')[0],{

		initialSlide: $('.about-page .history-section .nav .view-wrapper .view>*>*:not(.dup)').length - ITEMS_PER_SCREEN + 1,

		slidesPerView: ITEMS_PER_SCREEN,

		on: {

			slideChange(){

				if(!infoSwiper||!swiper) return;

				infoSwiper.slideTo(swiper.realIndex);

			}

		}

	});

	$('.about-page .history-section .info .slide-to>*').removeClass('disabled');

	infoSwiper = new Swiper($('.about-page .history-section .info .slides')[0],{

		initialSlide: $('.about-page .history-section .nav .view-wrapper .view>*>*:not(.dup)').length - ITEMS_PER_SCREEN + 1,

		on: {

			slideChange(){

				if(infoSwiper&&swiper) swiper.slideTo(infoSwiper.realIndex);

				if(!infoSwiper) return;

				if(infoSwiper.isBeginning){

					$('.about-page .history-section .info .slide-to>*').first().addClass('disabled');

				}else{

					$('.about-page .history-section .info .slide-to>*').first().removeClass('disabled');

				}

				if(infoSwiper.isEnd){

					$('.about-page .history-section .info .slide-to>*').last().addClass('disabled');

				}else{

					$('.about-page .history-section .info .slide-to>*').last().removeClass('disabled');

				}


			}

		}

	});

	render();


	if(infoSwiper) infoSwiper.update();

	if(swiper) swiper.update();

	if(to){

		clearTimeout(to);

		to = null;

	}

	to = setTimeout(function(){

		to = null;

		if(infoSwiper) infoSwiper.update();

		if(swiper) swiper.update();

	},1000);

}


function render(){

	var ww = $window.outerWidth();

	if(ww<=640){

		$('.about-page .history-section .nav').removeAttr('style');

		$('.about-page .history-section .info').removeAttr('style');

		$('.about-page .history-section .info .slide-to').removeAttr('style');

		return;
	}

	const pos = ($slider.offset().left - $slides.offset().left)/$firstSlide.outerWidth();

	const bigItemWidth = $slider.outerWidth()*BIG_ITEM_FRACTION;

	const itemWidth = ($slider.outerWidth()*(1 - BIG_ITEM_FRACTION) - (ITEMS_PER_SCREEN - 1)*SPACE)/(ITEMS_PER_SCREEN-1);

	const itemFontSize = Math.floor(itemWidth*(ww>1280?40/88:ww>1024?40/86:32/70));

	const bigItemFontSize = Math.floor(bigItemWidth*(ww>1280?280/643:ww>1024?220/530:ww>960?180/440:145/354));

	const paddingBottom = (ww>1024?48:ww>960?32:24);
	
	const itemLineHeight = .7; // .7

	const bigItemLineHeight = .63;
	
	const itemColor = [196,196,196];

	const bigItemColor = [122,128,223];

	var index = Math.floor(pos)+1;

	const frac = index - pos;

	$('.about-page .history-section .nav').outerHeight(bigItemLineHeight*bigItemFontSize+20+paddingBottom);

	$('.about-page .history-section .info').css({

		'max-width': (itemWidth+SPACE+bigItemWidth+SPACE/2)+'px',

		'padding-left': (itemWidth+SPACE)+'px'

	});

	$('.about-page .history-section .info .slide-to').css('right',-(SPACE/2 + $('.about-page .history-section .info .slide-to').outerWidth())+'px');

	// console.log(index,frac);

	for(var i=0;i<$viewItems.length;i++) $viewItems[i].css({

		'width': itemWidth+'px',

		'font-size': itemFontSize+'px',
		
		'line-height': itemLineHeight+'em',

		'color': 'rgb('+itemColor.join(',')+')'

	});

	$view.css('left',-(
		
		(index - 1)*frac + index*(1 - frac)
		
	)*(itemWidth + SPACE)+'px');

	if(index>=0&&index<$viewItems.length) $viewItems[index].css({

		'width': (bigItemWidth*frac+itemWidth*(1 - frac))+'px',

		'font-size': (bigItemFontSize*frac+itemFontSize*(1 - frac))+'px',

		'line-height': (bigItemLineHeight*frac + itemLineHeight*(1 - frac))+'em',

		'color': 'rgb('+itemColor.map(function(_,index){

			return Math.round(bigItemColor[index]*frac + itemColor[index]*(1 - frac))%256;

		}).join(',')+')'

	});

	index++;

	if(index>=0&&index<$viewItems.length) $viewItems[index].css({

		'width': (bigItemWidth*(1 - frac)+itemWidth*frac)+'px',

		'font-size': (bigItemFontSize*(1 - frac)+itemFontSize*frac)+'px',

		'line-height': (bigItemLineHeight*(1 - frac) + itemLineHeight*frac)+'em',

		'color': 'rgb('+itemColor.map(function(_,index){

			return Math.round(bigItemColor[index]*(1 - frac) + itemColor[index]*frac)%256;

		}).join(',')+')'

	});

}



Codevia.onValueChange('telecomsb-about-page-history-section',function(){

	return [$slides.offset().left,$slider.offset().left,$firstSlide.outerWidth()];

})(render);


onWndResize(resize);

resize();


$('.about-page .history-section .info .slide-to>*.prev').click(function(){

	if(infoSwiper) infoSwiper.slidePrev();

});


$('.about-page .history-section .info .slide-to>*.next').click(function(){

	if(infoSwiper) infoSwiper.slideNext();

});



})();



/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var swiper = null;



function resize(){

	if(swiper){
		swiper.destroy();
		swiper = null;
	}

	var ww = $window.outerWidth();

	const ITEM_WIDTH = (ww>1280?200:ww>1024?180:ww>960?140:160);

	const containerWidth = $('.about-page .customers-section .list').outerWidth();


	
	const useSwiper = containerWidth<((ITEM_WIDTH + 20)*$('.about-page .customers-section .list .slides .swiper-slide').length - 20);

	$('.about-page .customers-section .list .nav>*').removeClass('disabled').first().addClass('disabled');


	if(useSwiper){

		$('.about-page .customers-section .list .nav').removeClass('hidden');

		let count = Math.floor(containerWidth/ITEM_WIDTH);

		while(

			(containerWidth - count*ITEM_WIDTH)/(count - 1)<20

		){

			if(count<=2){
				count = 2;
				break;
			}else count--;

		}


		swiper = new Swiper($('.about-page .customers-section .list .slides')[0],{

			slidesPerView: (ww>640?count:1),

			spaceBetween: (ww>640?(containerWidth - count*ITEM_WIDTH)/(count - 1):20),

			on:{

				slideChange(){

					if(!swiper) return;

					if(swiper.isBeginning){

						$('.about-page .customers-section .list .nav>*').first().addClass('disabled');

					}else{

						$('.about-page .customers-section .list .nav>*').first().removeClass('disabled');

					}

					if(swiper.isEnd){

						$('.about-page .customers-section .list .nav>*').last().addClass('disabled');

					}else{

						$('.about-page .customers-section .list .nav>*').last().removeClass('disabled');

					}

				}

			}

		});

	}else{

		$('.about-page .customers-section .list .nav').addClass('hidden');

	}


}


$('.about-page .customers-section .list .nav>*.prev').click(function(){

	if(swiper) swiper.slidePrev();

});


$('.about-page .customers-section .list .nav>*.next').click(function(){

	if(swiper) swiper.slideNext();

});


onWndResize(resize);


resize();


})();



/*************************************************************************

                               I M A G E S

*************************************************************************/


(function(){


var swiper = null;


function resize(){

	var ww = $window.outerWidth();


	if(ww>640){

		if(!swiper) return;

		swiper.destroy();

	}else{

		if(swiper) return;

		$('.about-page .partners-section .list .nav>*').removeClass('disabled').first().addClass('disabled');

		swiper = new Swiper($('.about-page .partners-section .list .slides')[0],{

			/**/

			on:{

				slideChange(){

					if(!swiper) return;

					if(swiper.isBeginning){

						$('.about-page .partners-section .list .nav>*').first().addClass('disabled');

					}else{

						$('.about-page .partners-section .list .nav>*').first().removeClass('disabled');

					}

					if(swiper.isEnd){

						$('.about-page .partners-section .list .nav>*').last().addClass('disabled');

					}else{

						$('.about-page .partners-section .list .nav>*').last().removeClass('disabled');

					}

				}

			}

		});

	}


}



$('.about-page .partners-section .list .prev').click(function(){

	if(swiper) swiper.slidePrev();

});


$('.about-page .partners-section .list .next').click(function(){

	if(swiper) swiper.slideNext();

});


onWndResize(resize);

resize();


})();



// $('.about-page .partners-section .list .slides>*>*').click(function(){
//
// 	$('.partner-popup').first().addClass('shown');
//
// });
//
//
// $('.about-page .customers-section .list .slides>*>*').click(function(){
//
// 	$('.partner-popup').last().addClass('shown');
//
// });




});



})(window);
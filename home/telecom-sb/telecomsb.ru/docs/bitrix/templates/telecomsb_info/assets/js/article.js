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


if(!$('.page-content:first').hasClass('article-page')) return;




/*************************************************************************

                               I M A G E S

*************************************************************************/


const urlCreator = window.URL || window.webkitURL;


$('.text-section .slider').each(function(){

	const $slider = $(this);

	Promise.all($slider.find('.swiper-slide').toArray().map(el=>new Promise((resolve,reject)=>{

		const $el = $(el);

		const xhr = new XMLHttpRequest;

		xhr.open("GET", $el.data('src'));

		xhr.responseType = "blob";

		xhr.onload = function(e){

			const url = urlCreator.createObjectURL(this.response);

			const img = new Image;

			img.src = url;

			const checkSize = ()=>{

				if(img.naturalWidth!=0||img.naturalHeight!=0){

					resolve({

						url,

						width: img.naturalWidth,

						height: img.naturalHeight,

					});

					return;

				}

				requestAnimationFrame(checkSize);

			};

			requestAnimationFrame(checkSize);

		};

		xhr.send();

	}))).then(images=>{


		images.forEach((image,index)=>{

			const $slide = $slider.find(`.swiper-slide:eq(${index})`);

			$slide.css('background-image',`url(${image.url})`);
			
			if(image.width<image.height) $slide.addClass('contain'); else $slide.addClass('cover');

		});


		if($slider.find('.slides:first .swiper-slide').length<2) return;


		const resize = function(){

			const
				ww = $window.outerWidth(),
				containerWidth = $slider.outerWidth(),
				containerHeight = $slider.outerHeight();

			const imageWidth = images.reduce((max,image)=>Math.max(max,containerHeight*image.width/image.height),0);

			const offset = (ww>1280?
					Math.max(0,(containerWidth - imageWidth)/2) + 24
				:
					Math.max(0,containerWidth - imageWidth) + 16
			);

			$slider.find('.nav:first').css('right',offset+'px');

		};

		onWndResize(resize);

		resize();


		const swiper = new Swiper($slider.find('.slides:first')[0],{

			spaceBetween: 20,

			on: {

				slideChange(){

					if(!swiper) return;

					if(swiper.isBeginning){

						$slider.find('.nav:first .prev').addClass('disabled');

					}else{

						$slider.find('.nav:first .prev').removeClass('disabled');

					}

					if(swiper.isEnd){

						$slider.find('.nav:first .next').addClass('disabled');

					}else{

						$slider.find('.nav:first .next').removeClass('disabled');

					}

				}

			}

		});


		$slider.find('.nav:first .prev').click(function(){

			if(!swiper) return;

			swiper.slidePrev();

		});

		$slider.find('.nav:first .next').click(function(){

			if(!swiper) return;

			swiper.slideNext();

		});


	});

});



$('.text-section .text table').each(function(){

	const $table = $(this);


	$table.removeAttr('border');

	$table.attr('cellpadding',0);

	$table.attr('cellspacing',0);

	$table.removeAttr('style');


	$table.find('caption').remove();

	$table.addClass('table');


	let state = 'table';


	$table.addClass('state-table');


	let $list = null;


	const resize = ()=>{

		const ww = $window.outerWidth();

		if(ww>640){

			if(state=='table') return;

			state = 'table';

			$list.replaceWith($table);

		}else{


			if(state=='list') return;

			state = 'list';

			if(!$list){

				$list = $('<div class="table state-list"></div>');

				const header = $table.find('thead:first th').toArray().map(el=>$(el).html());

				$table.find('tbody:first tr').each(function(){

					const $row = $('<div></div>');

					$list.append($row);

					$(this).children('td').each(function(index){

						$row.append($('<div></div>')

							.append($('<div class="title"></div>').html(header[index]))

							.append($('<div class="value"></div>').html($(this).html()))

						);

					});

				});

			}

			$table.replaceWith($list);

		}

	};


	onWndResize(resize);

	resize();


});


$('.text-section .text figure').each(function(){

	const $figure = $(this);

	if($figure.find('img').length!=1) return;

	$figure.children().not('img,figcaption').remove();


	$figure.addClass('image');


});




});



})(window);
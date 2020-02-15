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


if(!$('.page-content:first').hasClass('contacts-page')) return;



/*************************************************************************

                               I M A G E S

*************************************************************************/


ymaps.ready(()=>{


	const map = new ymaps.Map($('.contacts-page .info-section .map>*')[0],{

		center: [
			55.765459,
			37.739279
		],

		zoom: 10

	});

	var marker = null;

	// marker.events.add('click',()=>{markerClick(marker);});

	function resize(){

		const ww = $window.outerWidth();

		if(marker) map.geoObjects.remove(marker);

		marker = new ymaps.Placemark([
			55.824674,
			37.660084
		],undefined/*{
			balloonContentBody:``
		}*/,{
			iconLayout: 'default#image',
			iconImageHref: '/assets/img/marker.png',
			iconImageSize: (ww>1440?[48, 54]:[32, 36]),
		});

		map.geoObjects.add(marker);

	}


	onWndResize(resize);

	resize();


});



/*************************************************************************

                               I M A G E S

*************************************************************************/


(()=>{


$('.contacts-page .form-section .form input[name=form_text_2]').mask('+7 (000) 000-00-00');



$('.contacts-page form textarea,.contacts-page form input').each(function(){


	const
		$this = $(this),
		$input = $this.parents('.input:first');


	if($input.length!=1) return;


	if($this.is('textarea')){

		$input.addClass('input-text');

	}else if($this.attr('type')=='submit'){

		return;

	}else if($this.attr('type')=='file'){

		$input.addClass('input-file');

	}else{

		$input.addClass('input-line');

	}


});



$document.on('change','.contacts-page .input-file input[type=file]',function(){

	let file = this.files&&this.files[0]?this.files[0]:null;

	if(!file||!(file instanceof File)) file = null;

	const container = $(this).parents('.input-file:first')[0];

	for(const node of container.childNodes) if(node.nodeType==3) container.removeChild(node);


	container.appendChild(document.createTextNode(file?file.name:'Прикрепить файл'));

});
/*

$('.contacts-page form input[type=submit]').click(function(e){

	e.preventDefault();

	const
		$container = $('.contacts-page .form-section'),
		$form = $container.find('.form');

	const
		$name = $form.find('input[name=form_text_1]').parents('.input-line:first'),
		name = clean_spaces($name.find('input').val()),
		$phone =$form.find('input[name=form_text_2]').parents('.input-line:first'),
		phone = $phone.find('input').val().replace(/\D+/g,'').slice(1).slice(-10),
		$email = $form.find('input[name=form_email_3]').parents('.input-line:first'),
		email = clean_spaces($email.find('input').val());

	let failed = false;


	if(!name){
		
		failed = true;
		
		$name.addClass('failed');
		
	}

	if(phone.length!=10){
		
		failed = true;
		
		$phone.addClass('failed');
		
	}

	if(!/@/.test(email)||/\s/.test(email)){
		
		failed = true;
		
		$email.addClass('failed');
		
	}


	if(!failed){

		$name.removeClass('filled').find('input').val('');

		$phone.removeClass('filled').find('input').val('');

		$email.removeClass('filled').find('input').val('');

		$form.find('textarea[name=form_textarea_4]').parents('.input-text:first').removeClass('filled').find('textarea').val('');

		// $form.find('.attach').removeClass('filled').children().empty();

		$container.addClass('sent');

		setTimeout(()=>{

			$container.removeClass('sent');

		},4000);

	}


});
*/

})();



});



})(window);
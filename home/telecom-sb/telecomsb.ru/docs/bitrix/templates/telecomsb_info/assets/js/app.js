(function(window){
"use strict";


/*************************************************************************


      P   R   E   P   A   R   I   N   G       S   C   R   I   P   T


*************************************************************************/


/*************************************************************************

                              B A S I C S

*************************************************************************/


var Engine = window.Engine = {},
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



(function(){


Engine.pageParams = window.location.search.slice(1).split('&').reduce((params,rec)=>{

	const p = rec.indexOf('=');

	if(p>=0){

		const
			n = rec.slice(0,p),
			v = decodeURIComponent(rec.slice(p+1));

		if(n){
			
			if(v==(v|0)) params[n] = v|0; else

			if(v==+v) params[n] = +v; else
			
			if(v==='true'||v==='false') params[n] = v==='true'; else
			
			if(v) params[n] = v;

		}

	}else{

		if(rec) params[decodeURIComponent(rec)] = true;

	}

	return params;

},{});


})();



/*************************************************************************
          
                           P R O M I S E S

*************************************************************************/


var documentReady = Engine.documentReady = $.Deferred(),
	documentComplete = Engine.documentComplete = $.Deferred();


$document.ready(function(){

	setTimeout(function(){

		documentComplete.resolve();

	},2000)

	documentReady.resolve();

    $document.on('click','.partner-popup .close',function(){

        $(this).parents('.partner-popup:first').removeClass('shown');

    });

});


(function(){

var onDocumentStateChanged = Codevia.onValueChange('ondocumentstatechanged',function(){

	return [
		(document.readyState||'')+''
	];

});

onDocumentStateChanged(function(){
	
	if(document.readyState=='complete'){
		documentComplete.resolve();
		$document.trigger('custom-complete');
	}

});

})();



/*************************************************************************


          D   O   C   U   M   E   N   T       R   E   A   D   Y


*************************************************************************/



$(document).ready(function(){


	if($('html:first').hasClass('is-ios')) document.addEventListener("touchstart", function() {},false);

	if(Engine.isTouch=(window.ontouchstart!==undefined)) $('html:first').addClass('is-touch'); else  $('html:first').addClass('is-not-touch');



(function(){


function scroll(){

	if(scrollTop.get()>0) $('body:first').addClass('scrolled'); else $('body:first').removeClass('scrolled');

}


onScreenScroll(scroll);

scroll();


})();



(function(){

delete sessionStorage['telecomsb-scroll-top'];

let busy = false;

$('.nav-button').click(function(){

	if(Engine.isTouch){

		if(busy) return;
		
		busy = true;

		if($('body').hasClass('nav-expanded')){

			const st = +sessionStorage['telecomsb-scroll-top'];

			$('body').css('overflow','auto');

			if(isFinite(st)&&st>=0){

				setTimeout(function(){
					scrollTop.set(Math.round($('body').outerHeight()*st));
					busy = false;
				},100);

			}

		}else{

			sessionStorage['telecomsb-scroll-top'] = scrollTop.get()/$('body').outerHeight();

			setTimeout(function(){
				$('body').css('overflow','hidden');
				busy = false;
			},200);

		}

	}


	$('body').toggleClass('nav-expanded');

});


})();



/*************************************************************************

                               I N P U T

*************************************************************************/


(function(){


$document.on('focus','.input-line:not(.focus) input,.input-text:not(.focus) textarea',function(e){

	$('.input-line.focus,.input-text.focus').removeClass('focus');

	$(this).parents('.input-line,.input-text').first().addClass('focus');

});


$document.on('blur','.input-line.focus input,.input-text.focus textarea',function(e){

	$(this).parents('.input-line,.input-text').first().removeClass('focus');

});


$document.on('click','.input-line,.input-text',function(e){

	var $this = $(this),
		$input = $(this).find('input,textarea');

	if(e.target==$input[0]) return;

	$input.focus();

	$input[0].selectionStart = $input[0].selectionEnd = $input.val().length;

});


function changed($input){

	var $inputObject = $input.parents('.input-line,.input-text').first();

	if($input.val().replace(/\s+/g,'').length>0){

		$inputObject.addClass('filled');

	}else{

		$inputObject.removeClass('filled');

	}

	const bg_duplicate = $input.parents('.input-line,.input-text').first().data('bg-duplicate');

	if(bg_duplicate instanceof Function) $input.siblings('.bg-duplicate').html(bg_duplicate($inputObject));

	$inputObject.trigger('value-changed');

}


$document.on('keyup','.input-line input,.input-text textarea',function(){

	var $this = $(this);

	$this.parents('.input-line,.input-text').first().removeClass('failed');

	changed($this);

});


$document.on('drop','.input-line input,.input-text textarea',function(e){

	var $input = $(this);

	setTimeout(function(){

		$('.input-line input,.input-text textarea').each(function(){
			changed($(this));
		});

	},30);

});



})();



/*************************************************************************

                            C O M B O B O X

*************************************************************************/


(()=>{


$document.click(function(e){

	const
		target = e.target,
		$target = $(target);

	$('.combobox').each(function(){

		const $combobox = $(this);

		if($target.is($combobox)||$.contains($combobox[0],target)) return;

		$combobox.removeClass('expanded');

	});

});


$('.combobox .value').click(function(){

	$(this).parent().toggleClass('expanded');

});


$('.combobox').on('click','.variants>*',function(){

	const
		$variant = $(this),
		$combobox = $variant.parent().parent();

	if($variant.hasClass('active')){

		$combobox.removeClass('expanded');

		return;

	}

	$combobox.data('id',$variant.data('id')).removeClass('expanded').addClass('filled');

	$combobox.find('.value:first').text($variant.text());

	$variant.addClass('active').siblings().removeClass('active');

	$combobox.trigger('value-changed');

});


})();



/*************************************************************************

                                 B A C K

*************************************************************************/


$('.body .page-header .back').click(function(){

	if(window.history&&(window.history.go instanceof Function)){
		window.history.go(-1);
		return;
	}

	window.location.href='/';

});



/*************************************************************************

                               F O O T E R

*************************************************************************/


(()=>{


const
	$nav = $('.page-footer .nav'),
	$items = $nav.children().first().children().toArray().map(el=>$(el)),
	$social = $nav.children().last().children().toArray().map(el=>$(el));


$nav.empty();

const $cols = [$('<div></div>'),$('<div></div>'),$('<div></div>')];

for(const $col of $cols) $col.appendTo($nav);


let index = 0;

for(const $item of $items){

	$cols[index%$cols.length].append($item);

	index++;

}




while((index%$cols.length)!=0){

console.log('!!!');
	$cols[index%$cols.length].append('<div>&nbsp;</div>');
	
	index++;

}


index = 0;

for(const $item of $social){

	$cols[index%$cols.length].append($item);

	index++;

}


})();



/************************************************************************/



});



})(window);
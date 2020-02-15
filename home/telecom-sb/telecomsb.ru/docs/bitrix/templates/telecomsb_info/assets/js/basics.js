(function(window){
"use strict";


/*************************************************************************


       C   L   I   E   N   T       F   R   A   M   E   W   O   R   K


*************************************************************************/


/*************************************************************************

                             B A S I C S

*************************************************************************/


if(!window.Codevia) window.Codevia={};


var Codevia = window.Codevia,
	$window = $(window),
	document = window.document,
	$document = $(document);



/*************************************************************************

                         F I L E   D I A L O G

*************************************************************************/


var fileDialog = Codevia.fileDialog = function fileDialog(fn){

	var $input = $('.file-dialog-input');

	$input.css({
		'display':'block',
		'z-index': '10000'
	});

	$input.click();

	$input.unbind('change');

	$input.one('change',function(){

		if(fn instanceof Function) fn($input[0].files[0]||null);

		$input.replaceWith($('<input type="file" class="file-dialog-input" style="display:none;width: 1px; height: 1px; top: 1px; left:1px; position: fixed; z-index:1000; background: transparent;" />'));

	});

};


$document.ready(function(){

	$('body:first').append('<input type="file" class="file-dialog-input" style="display:none;width: 1px; height: 1px; top: 1px; left:1px; position: fixed; z-index:1000; background: transparent;" />');

});



/*************************************************************************

                          S C R O L L   T O P

*************************************************************************/


var setScrollTop = function(){},
	getScrollTop = function(){},
	incScrollTop = function(){},
	decScrollTop = function(){};


var scrollTopAPIReady = $.Deferred();

Codevia.scrollTop = {
	
	set: setScrollTop,

	get: getScrollTop,

	inc: incScrollTop,

	dec: decScrollTop,

	ready: function(cb){

		scrollTopAPIReady.then(cb);

	}

};


(function(){


$document.ready(function(){


	if(window.scrollTo){
		
		Codevia.scrollTop.set = setScrollTop = function(x){
			window.scrollTo(0,x);
		}

		Codevia.scrollTop.get = getScrollTop = function(){
			return window.scrollY||window.pageYOffset;
		}

		Codevia.scrollTop.inc = incScrollTop = function(x){
			window.scrollTo(0,getScrollTop()+x);
		}

		Codevia.scrollTop.dec = decScrollTop = function(x){
			window.scrollTo(0,getScrollTop()-x);
		}
	}else{
		
		Codevia.scrollTop.set = setScrollTop = function(x){
			document.body.scrollTop=x;
		}

		Codevia.scrollTop.get = getScrollTop = function(){
			return document.body.scrollTop;
		}

		Codevia.scrollTop.inc = incScrollTop = function(x){
			document.body.scrollTop+=x;
		}

		Codevia.scrollTop.dec = decScrollTop = function(x){
			document.body.scrollTop-=x;
		}

	}

	scrollTopAPIReady.resolve(true);


});


})();



/*************************************************************************

                      A N I M A T I O N   F R A M E

*************************************************************************/


var requestAnimationFrame = Codevia.requestAnimationFrame = Codevia.animationFrame = window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(callback){setTimeout(function(){callback(Date.now());}, 1000 / 60);};



/*************************************************************************

                           A N I M A T I O N

*************************************************************************/


var animate = Codevia.animate = function animate(m,f,t,e){
	
	var lt,k,st=-1;

	var exec = function(ts){

		if(st<0){

			st=ts;

			requestAnimationFrame(exec);

		}else{

			lt=Math.min(ts-st,t);

			f(m(lt/t));

			if(lt>=t){

				if(e) e();

			}else requestAnimationFrame(exec);

		}

	};

	requestAnimationFrame(exec);

};


Codevia.animateScrollTop = function animateScrollTop(s2,duration){
	
	var s1 = getScrollTop();

	animate(function(x){

		return x*x*x*x;

	},function(t){

		setScrollTop(s1*(1-t)+s2*t);

	},duration);


};



/*************************************************************************

                      A B S O L U T E   O F F S E T

*************************************************************************/


var absoluteOffset = Codevia.absoluteOffset = (function(){

	var px = function(x){return Math.round((+x)||0)};

	return function absoluteOffset($el,offs){

		var current_offs = $el.offset();

		if(Math.round(Math.abs(current_offs.top-offs.top))==0&&Math.round(Math.abs(current_offs.left-offs.left))==0) return;

		var dst = {};


		if(offs.top!==undefined){
			
			var
				css_top = parseInt($el.css('top')),
				target_top = (offs.top==(+offs.top)?offs.top:current_offs.top);
			
			dst.top = px(target_top - current_offs.top + css_top)+'px';

		}


		if(offs.left!==undefined){
			
			var
				css_left = parseInt($el.css('left')),
				target_left = (offs.left==(+offs.left)?offs.left:current_offs.left);
			
			dst.left = px(target_left - current_offs.left + css_left)+'px';

		}


		$el.css(dst);

	}

})();



/*************************************************************************

                         A F T E R   E V E N T S

*************************************************************************/


/*Codevia.afterEvents = (function(){

	
	var tasks = new Map,
		eventTypes = new Set(['click','focus','keydown']);


	function bindEventType(type){

		$document.on(type,function(e){

			var info = tasks.get(e.target);

			if(info){

				tasks.delete(e.target);

				requestAnimationFrame(function(){info.cb(info.e)});

			}

		});

	}

	
	eventTypes.forEach(function(type){
		bindEventType(type);
	});


	function afterEvents(e,cb){

		if(typeof(e)=='function'){

			return function(_e){return afterEvents(_e,e)};

		}else{

			var type = e.type;

			if(!(e instanceof $.Event)) throw new Error('Codevia.AdminPanel: Event object must be instance of window.AdminPanel.jQuery.Event.');

			if(typeof(type)!='string'||!type) throw new Error('Codevia.AdminPanel: Invalid jQuery.Event type: '+type);
			
			if(typeof(cb)!='function') return;

			var _e = {
				target: e.target,
				currentTarget:  e.currentTarget,
			};

			_e.__proto__ = e;

			if(eventTypes.has(type)){

				tasks.set(e.target,{e:_e,cb:cb,ts:Date.now()});

			}else{

				eventTypes.add(type);

				requestAnimationFrame(function(){return cb(_e);});

			}

		}

	}

	return afterEvents;

})();

*/

/*************************************************************************

                            O B S E R V E R S

*************************************************************************/


var onValueChange = Codevia.onValueChange = function onValueChange(name,change,dur){

	var en = name+'_values_change', cache, repeat = null;

	function watcher(){

		var new_vals=change();

		if(!cache||new_vals.some(function(e,i){

			return e!=cache[i];

		})){

			cache=new_vals;

			if(repeat) clearTimeout(repeat);

			repeat = setTimeout(function(){

				repeat = null;

				cache = change();

				$(document).trigger(en);

			},50);

			$(document).trigger(en);

		}

		requestAnimationFrame(watcher);

	}

	requestAnimationFrame(watcher);

	return function(cb){

		if(cb) $(document).on(en,cb); else{

			cache = change();

			$(document).trigger(en);

		}

	}

}


var onWndResize = Codevia.onWndResize = onValueChange('windowsize',function(){

	return [
		$(window).outerWidth(),
		$(window).outerHeight()	
	];

});


var onScreenScroll = Codevia.onScreenScroll = onValueChange('screenscroll',function(){

	return [
		$(window).outerWidth(),
		$(window).outerHeight(),
		getScrollTop()
	];

});



/*************************************************************************

                                S V G

*************************************************************************/


Codevia.SVG = {

	createElement: function(tag, attrs){

		var el= document.createElementNS('http://www.w3.org/2000/svg', tag);

		if(attrs instanceof Object) for(var k in attrs){
			
			if(/^xlink:/.test(k)){

				el.setAttributeNS('http://www.w3.org/1999/xlink', k, attrs[k]);

			}else el.setAttribute(k, attrs[k]);
		}

		return el;
	},

	setAttributes: function(el, attrs){

		for(var k in attrs){
			
			if(/^xlink:/.test(k)){

				el.setAttributeNS('http://www.w3.org/1999/xlink', k, attrs[k]);

			}else el.setAttribute(k, attrs[k]);
		}

		return el;
	}

};



/*************************************************************************

                                 M I S C

*************************************************************************/


Codevia.let_string = function let_string(x){
	return (x||'')+'';
};


Codevia.clean_spaces = function clean_spaces(x){
	return x.replace(/^\s+/,'').replace(/\s+$/,'').replace(/\s{2,}/g,' ');
};



/*************************************************************************

                              E S   N E X T

*************************************************************************/


if(!Array.prototype.find) Array.prototype.find = function(cb){

	for(var i=0,len = this.length;i<len;i++){

		var el = this[i];

		if(cb(el)) return el;

	}

	return undefined;

}

if(!Array.prototype.findIndex) Array.prototype.findIndex = function(cb){

	for(var i=0,len = this.length;i<len;i++){

		var el = this[i];

		if(cb(el)) return i;

	}

	return -1;

}



/*************************************************************************

                         S E R V E R   Q U E R Y

*************************************************************************/


Codevia.queryServer = function(fn,data,cb){

	$.ajax({

		url:'/'+fn+'.fn',

		type:'POST',

		cache:true,

		ifModified:true,

		data:JSON.stringify(((typeof(data)!='function')?data:{}) || {}),

		contentType:'application/json',

		dataType:'json',

		success:function(res,textStatus,jqXHR){

			if(res.error) console.log(res.error.stack);

			if(typeof cb == 'function') cb.apply(Codevia.AdminPanel,[res]); else

			if(typeof data == 'function') data.apply(Codevia.AdminPanel,[res]);

		},

		error:function(opts,err){

			var res={fatal:true,error:{code:0,text:'undefined function'}};

			if(typeof cb == 'function') cb.apply(Codevia.AdminPanel,[res]); else

			if(typeof data == 'function') data.apply(Codevia.AdminPanel,[res]);

		}

	});


};



/*************************************************************************

                     P R E L O A D   R E S O U R C E

*************************************************************************/


Codevia.preloadResource = (function(){

	var URL = window.URL || window.webkitURL || window.mozURL || window.msURL;

	if(!URL){
		
		var preload = function(files){

			var done = $.Deferred();

			done.resolve(files);
			
			return done;

		};

		preload.fallback = true;

		return preload;

	}else{

		var cache = {};

		var preload = function preload(files){

			var done = $.Deferred();

			if((files instanceof Array)&&file.length<1||files===undefined||files===''){
				done.resolve(files);
				return done;
			}

			var counter = (files instanceof Array?files.length:1),
				preloaded = new Array(counter);
			
			function dec(){
				if((--counter)==0) done.resolve((files instanceof Array?preloaded:preloaded[0]));
			}

			(files instanceof Array?files:[files]).forEach(function(url,index){


				if(url in cache){

					preloaded[index] = cache[url];

					dec();

					return;

				}


				var req = new XMLHttpRequest();

				req.open('GET', url, true);

				req.responseType = 'blob';


				req.onload=function(e){

					preloaded[index] = URL.createObjectURL(e.target.response);

					dec();

				};


				req.onerror = function(e){

					preloaded[index] = url;

					dec();

				};

				req.send();

			});

			return done;

		};

		preload.fallback = false;

		return preload;

	}

})();



if(window.String&&!window.String.prototype.repeat){

	window.String.prototype.repeat = function(n){

		console.log(this);

		var s = (this)+'';

		if(n<1) return '';

		var r = '';

		while((n--)>0) r+=s;

		return r;

	};

}


/************************************************************************/



})(window);
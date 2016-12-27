// Garden Gnome Software - Skin
// Object2VR 3.1.1/10756
// Filename: Pepsi Fortune Skin_V1.ggsk
// Generated Tue Dec 27 15:34:51 2016

function object2vrSkin(player,base) {
	var me=this;
	var flag=false;
	var nodeMarker=new Array();
	var activeNodeMarker=new Array();
	this.player=player;
	this.player.skinObj=this;
	this.divSkin=player.divSkin;
	var basePath="";
	// auto detect base path
	if (base=='?') {
		var scripts = document.getElementsByTagName('script');
		for(var i=0;i<scripts.length;i++) {
			var src=scripts[i].src;
			if (src.indexOf('skin.js')>=0) {
				var p=src.lastIndexOf('/');
				if (p>=0) {
					basePath=src.substr(0,p+1);
				}
			}
		}
	} else
	if (base) {
		basePath=base;
	}
	this.elementMouseDown=new Array();
	this.elementMouseOver=new Array();
	var cssPrefix='';
	var domTransition='transition';
	var domTransform='transform';
	var prefixes='Webkit,Moz,O,ms,Ms'.split(',');
	var i;
	for(i=0;i<prefixes.length;i++) {
		if (typeof document.body.style[prefixes[i] + 'Transform'] !== 'undefined') {
			cssPrefix='-' + prefixes[i].toLowerCase() + '-';
			domTransition=prefixes[i] + 'Transition';
			domTransform=prefixes[i] + 'Transform';
		}
	}
	
	this.player.setMargins(0,0,0,0);
	
	this.updateSize=function(startElement) {
		var stack=new Array();
		stack.push(startElement);
		while(stack.length>0) {
			var e=stack.pop();
			if (e.ggUpdatePosition) {
				e.ggUpdatePosition();
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
	}
	
	parameterToTransform=function(p) {
		var hs='translate(' + p.rx + 'px,' + p.ry + 'px) rotate(' + p.a + 'deg) scale(' + p.sx + ',' + p.sy + ')';
		return hs;
	}
	
	this.findElements=function(id,regex) {
		var r=new Array();
		var stack=new Array();
		var pat=new RegExp(id,'');
		stack.push(me.divSkin);
		while(stack.length>0) {
			var e=stack.pop();
			if (regex) {
				if (pat.test(e.ggId)) r.push(e);
			} else {
				if (e.ggId==id) r.push(e);
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
		return r;
	}
	
	this.preloadImages=function() {
		var preLoadImg=new Image();
		preLoadImg.src=basePath + 'images/left__o.png';
		preLoadImg.src=basePath + 'images/right__o.png';
		preLoadImg.src=basePath + 'images/down__o.png';
		preLoadImg.src=basePath + 'images/zoom_in__o.png';
		preLoadImg.src=basePath + 'images/zoom_out__o.png';
		preLoadImg.src=basePath + 'images/auto_rotate__o.png';
		preLoadImg.src=basePath + 'images/fullscreen__o.png';
		preLoadImg.src=basePath + 'images/up__o.png';
	}
	
	this.addSkin=function() {
		this._toolbar=document.createElement('div');
		this._toolbar.ggId="toolbar";
		this._toolbar.ggParameter={ rx:0,ry:0,a:0,sx:0.75,sy:0.75 };
		this._toolbar.ggVisible=true;
		this._toolbar.className='ggskin ggskin_rectangle';
		this._toolbar.ggType='rectangle';
		this._toolbar.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				var w=this.parentNode.offsetWidth;
				this.style.left=Math.floor(-138 + w/2) + 'px';
				var h=this.parentNode.offsetHeight;
				this.style.top=Math.floor(-38 + h) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -138px;';
		hs+='top:  -38px;';
		hs+='width: 277px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 100%;';
		hs+=cssPrefix + 'transform: ' + parameterToTransform(this._toolbar.ggParameter) + ';';
		hs+='visibility: inherit;';
		hs+='background: #000000;';
		hs+='background: rgba(0,0,0,0.00392157);';
		hs+='border: 0px solid #000000;';
		this._toolbar.setAttribute('style',hs);
		this._toolbar.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._toolbar.style[domTransition]='none';
			} else {
				me._toolbar.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._toolbar.ggParameter.sx=0.85;me._toolbar.ggParameter.sy=0.85;
			me._toolbar.style[domTransform]=parameterToTransform(me._toolbar.ggParameter);
		}
		this._toolbar.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._toolbar.style[domTransition]='none';
			} else {
				me._toolbar.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._toolbar.ggParameter.sx=0.75;me._toolbar.ggParameter.sy=0.75;
			me._toolbar.style[domTransform]=parameterToTransform(me._toolbar.ggParameter);
		}
		this._left=document.createElement('div');
		this._left.ggId="left";
		this._left.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._left.ggVisible=true;
		this._left.className='ggskin ggskin_button';
		this._left.ggType='button';
		hs ='position:absolute;';
		hs+='left: -20px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._left.setAttribute('style',hs);
		this._left__img=document.createElement('img');
		this._left__img.className='ggskin ggskin_button';
		this._left__img.setAttribute('src',basePath + 'images/left.png');
		this._left__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._left__img.className='ggskin ggskin_button';
		this._left__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._left__img);
		this._left.appendChild(this._left__img);
		this._left.onclick=function () {
			me.player.changePanLog(1,true);
		}
		this._left.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._left.style[domTransition]='none';
			} else {
				me._left.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._left.style.opacity='1';
			me._left.style.visibility=me._left.ggVisible?'inherit':'hidden';
			me._left__img.src=basePath + 'images/left__o.png';
		}
		this._left.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._left.style[domTransition]='none';
			} else {
				me._left.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._left.style.opacity='0.5';
			me._left.style.visibility=me._left.ggVisible?'inherit':'hidden';
			me._left__img.src=basePath + 'images/left.png';
		}
		this._toolbar.appendChild(this._left);
		this._right=document.createElement('div');
		this._right.ggId="right";
		this._right.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._right.ggVisible=true;
		this._right.className='ggskin ggskin_button';
		this._right.ggType='button';
		hs ='position:absolute;';
		hs+='left: 20px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._right.setAttribute('style',hs);
		this._right__img=document.createElement('img');
		this._right__img.className='ggskin ggskin_button';
		this._right__img.setAttribute('src',basePath + 'images/right.png');
		this._right__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._right__img.className='ggskin ggskin_button';
		this._right__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._right__img);
		this._right.appendChild(this._right__img);
		this._right.onclick=function () {
			me.player.changePanLog(-1,true);
		}
		this._right.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._right.style[domTransition]='none';
			} else {
				me._right.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._right.style.opacity='1';
			me._right.style.visibility=me._right.ggVisible?'inherit':'hidden';
			me._right__img.src=basePath + 'images/right__o.png';
		}
		this._right.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._right.style[domTransition]='none';
			} else {
				me._right.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._right.style.opacity='0.5';
			me._right.style.visibility=me._right.ggVisible?'inherit':'hidden';
			me._right__img.src=basePath + 'images/right.png';
		}
		this._toolbar.appendChild(this._right);
		this._down=document.createElement('div');
		this._down.ggId="down";
		this._down.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._down.ggVisible=true;
		this._down.className='ggskin ggskin_button';
		this._down.ggType='button';
		hs ='position:absolute;';
		hs+='left: 100px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._down.setAttribute('style',hs);
		this._down__img=document.createElement('img');
		this._down__img.className='ggskin ggskin_button';
		this._down__img.setAttribute('src',basePath + 'images/down.png');
		this._down__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._down__img.className='ggskin ggskin_button';
		this._down__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._down__img);
		this._down.appendChild(this._down__img);
		this._down.onclick=function () {
			me.player.changeTiltLog(-1,true);
		}
		this._down.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._down.style[domTransition]='none';
			} else {
				me._down.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._down.style.opacity='1';
			me._down.style.visibility=me._down.ggVisible?'inherit':'hidden';
			me._down__img.src=basePath + 'images/down__o.png';
		}
		this._down.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._down.style[domTransition]='none';
			} else {
				me._down.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._down.style.opacity='0.5';
			me._down.style.visibility=me._down.ggVisible?'inherit':'hidden';
			me._down__img.src=basePath + 'images/down.png';
		}
		this._toolbar.appendChild(this._down);
		this._zoom_in=document.createElement('div');
		this._zoom_in.ggId="zoom in";
		this._zoom_in.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._zoom_in.ggVisible=true;
		this._zoom_in.className='ggskin ggskin_button';
		this._zoom_in.ggType='button';
		hs ='position:absolute;';
		hs+='left: 140px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._zoom_in.setAttribute('style',hs);
		this._zoom_in__img=document.createElement('img');
		this._zoom_in__img.className='ggskin ggskin_button';
		this._zoom_in__img.setAttribute('src',basePath + 'images/zoom_in.png');
		this._zoom_in__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._zoom_in__img.className='ggskin ggskin_button';
		this._zoom_in__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._zoom_in__img);
		this._zoom_in.appendChild(this._zoom_in__img);
		this._zoom_in.onclick=function () {
			me.player.changeFovLog(-3,true);
		}
		this._zoom_in.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._zoom_in.style[domTransition]='none';
			} else {
				me._zoom_in.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._zoom_in.style.opacity='1';
			me._zoom_in.style.visibility=me._zoom_in.ggVisible?'inherit':'hidden';
			me._zoom_in__img.src=basePath + 'images/zoom_in__o.png';
		}
		this._zoom_in.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._zoom_in.style[domTransition]='none';
			} else {
				me._zoom_in.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._zoom_in.style.opacity='0.5';
			me._zoom_in.style.visibility=me._zoom_in.ggVisible?'inherit':'hidden';
			me._zoom_in__img.src=basePath + 'images/zoom_in.png';
		}
		this._toolbar.appendChild(this._zoom_in);
		this._zoom_out=document.createElement('div');
		this._zoom_out.ggId="zoom out";
		this._zoom_out.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._zoom_out.ggVisible=true;
		this._zoom_out.className='ggskin ggskin_button';
		this._zoom_out.ggType='button';
		hs ='position:absolute;';
		hs+='left: 180px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._zoom_out.setAttribute('style',hs);
		this._zoom_out__img=document.createElement('img');
		this._zoom_out__img.className='ggskin ggskin_button';
		this._zoom_out__img.setAttribute('src',basePath + 'images/zoom_out.png');
		this._zoom_out__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._zoom_out__img.className='ggskin ggskin_button';
		this._zoom_out__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._zoom_out__img);
		this._zoom_out.appendChild(this._zoom_out__img);
		this._zoom_out.onclick=function () {
			me.player.changeFovLog(3,true);
		}
		this._zoom_out.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._zoom_out.style[domTransition]='none';
			} else {
				me._zoom_out.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._zoom_out.style.opacity='1';
			me._zoom_out.style.visibility=me._zoom_out.ggVisible?'inherit':'hidden';
			me._zoom_out__img.src=basePath + 'images/zoom_out__o.png';
		}
		this._zoom_out.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._zoom_out.style[domTransition]='none';
			} else {
				me._zoom_out.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._zoom_out.style.opacity='0.5';
			me._zoom_out.style.visibility=me._zoom_out.ggVisible?'inherit':'hidden';
			me._zoom_out__img.src=basePath + 'images/zoom_out.png';
		}
		this._toolbar.appendChild(this._zoom_out);
		this._auto_rotate=document.createElement('div');
		this._auto_rotate.ggId="auto rotate";
		this._auto_rotate.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._auto_rotate.ggVisible=true;
		this._auto_rotate.className='ggskin ggskin_button';
		this._auto_rotate.ggType='button';
		hs ='position:absolute;';
		hs+='left: 220px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._auto_rotate.setAttribute('style',hs);
		this._auto_rotate__img=document.createElement('img');
		this._auto_rotate__img.className='ggskin ggskin_button';
		this._auto_rotate__img.setAttribute('src',basePath + 'images/auto_rotate.png');
		this._auto_rotate__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._auto_rotate__img.className='ggskin ggskin_button';
		this._auto_rotate__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._auto_rotate__img);
		this._auto_rotate.appendChild(this._auto_rotate__img);
		this._auto_rotate.onclick=function () {
			me.player.toggleAutorotate();
		}
		this._auto_rotate.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._auto_rotate.style[domTransition]='none';
			} else {
				me._auto_rotate.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._auto_rotate.style.opacity='1';
			me._auto_rotate.style.visibility=me._auto_rotate.ggVisible?'inherit':'hidden';
			me._auto_rotate__img.src=basePath + 'images/auto_rotate__o.png';
		}
		this._auto_rotate.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._auto_rotate.style[domTransition]='none';
			} else {
				me._auto_rotate.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._auto_rotate.style.opacity='0.5';
			me._auto_rotate.style.visibility=me._auto_rotate.ggVisible?'inherit':'hidden';
			me._auto_rotate__img.src=basePath + 'images/auto_rotate.png';
		}
		this._toolbar.appendChild(this._auto_rotate);
		this._fullscreen=document.createElement('div');
		this._fullscreen.ggId="fullscreen";
		this._fullscreen.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._fullscreen.ggVisible=true;
		this._fullscreen.className='ggskin ggskin_button';
		this._fullscreen.ggType='button';
		hs ='position:absolute;';
		hs+='left: 260px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._fullscreen.setAttribute('style',hs);
		this._fullscreen__img=document.createElement('img');
		this._fullscreen__img.className='ggskin ggskin_button';
		this._fullscreen__img.setAttribute('src',basePath + 'images/fullscreen.png');
		this._fullscreen__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._fullscreen__img.className='ggskin ggskin_button';
		this._fullscreen__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._fullscreen__img);
		this._fullscreen.appendChild(this._fullscreen__img);
		this._fullscreen.onclick=function () {
			me.player.toggleFullscreen();
		}
		this._fullscreen.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._fullscreen.style[domTransition]='none';
			} else {
				me._fullscreen.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._fullscreen.style.opacity='1';
			me._fullscreen.style.visibility=me._fullscreen.ggVisible?'inherit':'hidden';
			me._fullscreen__img.src=basePath + 'images/fullscreen__o.png';
		}
		this._fullscreen.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._fullscreen.style[domTransition]='none';
			} else {
				me._fullscreen.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._fullscreen.style.opacity='0.5';
			me._fullscreen.style.visibility=me._fullscreen.ggVisible?'inherit':'hidden';
			me._fullscreen__img.src=basePath + 'images/fullscreen.png';
		}
		this._toolbar.appendChild(this._fullscreen);
		this._up=document.createElement('div');
		this._up.ggId="up";
		this._up.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._up.ggVisible=true;
		this._up.className='ggskin ggskin_button';
		this._up.ggType='button';
		hs ='position:absolute;';
		hs+='left: 60px;';
		hs+='top:  0px;';
		hs+='width: 33px;';
		hs+='height: 33px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._up.setAttribute('style',hs);
		this._up__img=document.createElement('img');
		this._up__img.className='ggskin ggskin_button';
		this._up__img.setAttribute('src',basePath + 'images/up.png');
		this._up__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._up__img.className='ggskin ggskin_button';
		this._up__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._up__img);
		this._up.appendChild(this._up__img);
		this._up.onclick=function () {
			me.player.changeTiltLog(1,true);
		}
		this._up.onmouseover=function () {
			if (me.player.transitionsDisabled) {
				me._up.style[domTransition]='none';
			} else {
				me._up.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._up.style.opacity='1';
			me._up.style.visibility=me._up.ggVisible?'inherit':'hidden';
			me._up__img.src=basePath + 'images/up__o.png';
		}
		this._up.onmouseout=function () {
			if (me.player.transitionsDisabled) {
				me._up.style[domTransition]='none';
			} else {
				me._up.style[domTransition]='all 500ms ease-out 0ms';
			}
			me._up.style.opacity='0.5';
			me._up.style.visibility=me._up.ggVisible?'inherit':'hidden';
			me._up__img.src=basePath + 'images/up.png';
		}
		this._toolbar.appendChild(this._up);
		this.divSkin.appendChild(this._toolbar);
		this._container_1=document.createElement('div');
		this._container_1.ggId="Container 1";
		this._container_1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._container_1.ggVisible=true;
		this._container_1.className='ggskin ggskin_container';
		this._container_1.ggType='container';
		this._container_1.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				var w=this.parentNode.offsetWidth;
				this.style.left=Math.floor(-116 + w/2) + 'px';
				var h=this.parentNode.offsetHeight;
				this.style.top=Math.floor(-68 + h/2) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -116px;';
		hs+='top:  -68px;';
		hs+='width: 224px;';
		hs+='height: 65px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._container_1.setAttribute('style',hs);
		this._rectangle_1=document.createElement('div');
		this._rectangle_1.ggId="Rectangle 1";
		this._rectangle_1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._rectangle_1.ggVisible=true;
		this._rectangle_1.className='ggskin ggskin_rectangle';
		this._rectangle_1.ggType='rectangle';
		this._rectangle_1.ggUpdatePosition=function() {
			this.style[domTransition]='none';
			if (this.parentNode) {
				var w=this.parentNode.offsetWidth;
				this.style.left=Math.floor(-113 + w/2) + 'px';
				var h=this.parentNode.offsetHeight;
				this.style.top=Math.floor(-28 + h/2) + 'px';
			}
		}
		hs ='position:absolute;';
		hs+='left: -113px;';
		hs+='top:  -28px;';
		hs+='width: 214px;';
		hs+='height: 63px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='background: #9de5ff;';
		hs+='border: 0px solid #000000;';
		hs+='border-radius: 10px;';
		hs+=cssPrefix + 'border-radius: 10px;';
		this._rectangle_1.setAttribute('style',hs);
		this._container_1.appendChild(this._rectangle_1);
		this._loading_text=document.createElement('div');
		this._loading_text__text=document.createElement('div');
		this._loading_text.className='ggskin ggskin_textdiv';
		this._loading_text.ggTextDiv=this._loading_text__text;
		this._loading_text.ggId="loading text";
		this._loading_text.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading_text.ggVisible=true;
		this._loading_text.className='ggskin ggskin_text';
		this._loading_text.ggType='text';
		hs ='position:absolute;';
		hs+='left: 12px;';
		hs+='top:  14px;';
		hs+='width: 198px;';
		hs+='height: 20px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._loading_text.setAttribute('style',hs);
		hs ='position:absolute;';
		hs+='left: 0px;';
		hs+='top:  0px;';
		hs+='width: 198px;';
		hs+='height: 20px;';
		hs+='border: 0px solid #000000;';
		hs+='color: #00b1e6;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;';
		hs+='overflow: hidden;';
		this._loading_text__text.setAttribute('style',hs);
		this._loading_text.ggUpdateText=function() {
			var hs="<b>Loading... "+(me.player.getPercentLoaded()*100.0).toFixed(0)+"%<\/b>";
			if (hs!=this.ggText) {
				this.ggText=hs;
				this.ggTextDiv.innerHTML=hs;
			}
		}
		this._loading_text.ggUpdateText();
		this._loading_text.appendChild(this._loading_text__text);
		this._container_1.appendChild(this._loading_text);
		this._loading_bar=document.createElement('div');
		this._loading_bar.ggId="loading bar";
		this._loading_bar.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading_bar.ggVisible=true;
		this._loading_bar.className='ggskin ggskin_rectangle';
		this._loading_bar.ggType='rectangle';
		hs ='position:absolute;';
		hs+='left: 5px;';
		hs+='top:  45px;';
		hs+='width: 200px;';
		hs+='height: 12px;';
		hs+=cssPrefix + 'transform-origin: 0% 50%;';
		hs+='visibility: inherit;';
		hs+='background: #00b1e6;';
		hs+='border: 0px solid #000000;';
		this._loading_bar.setAttribute('style',hs);
		this._container_1.appendChild(this._loading_bar);
		this._loading_close=document.createElement('div');
		this._loading_close.ggId="loading close";
		this._loading_close.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading_close.ggVisible=true;
		this._loading_close.className='ggskin ggskin_image';
		this._loading_close.ggType='image';
		hs ='position:absolute;';
		hs+='left: 186px;';
		hs+='top:  10px;';
		hs+='width: 18px;';
		hs+='height: 19px;';
		hs+=cssPrefix + 'transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._loading_close.setAttribute('style',hs);
		this._loading_close__img=document.createElement('img');
		this._loading_close__img.className='ggskin ggskin_image';
		this._loading_close__img.setAttribute('src',basePath + 'images/loading_close.png');
		this._loading_close__img.setAttribute('style','position: absolute;top: 0px;left: 0px;-webkit-user-drag:none;');
		this._loading_close__img.className='ggskin ggskin_image';
		this._loading_close__img['ondragstart']=function() { return false; };
		me.player.checkLoaded.push(this._loading_close__img);
		this._loading_close.appendChild(this._loading_close__img);
		this._loading_close.onclick=function () {
			me._container_1.style[domTransition]='none';
			me._container_1.style.visibility='hidden';
			me._container_1.ggVisible=false;
		}
		this._container_1.appendChild(this._loading_close);
		this.divSkin.appendChild(this._container_1);
		this.preloadImages();
		this.divSkin.ggUpdateSize=function(w,h) {
			me.updateSize(me.divSkin);
		}
		this.divSkin.ggViewerInit=function() {
		}
		this.divSkin.ggLoaded=function() {
			me._container_1.style[domTransition]='none';
			me._container_1.style.visibility='hidden';
			me._container_1.ggVisible=false;
		}
		this.divSkin.ggReLoaded=function() {
		}
		this.divSkin.ggLoadedLevels=function() {
		}
		this.divSkin.ggReLoadedLevels=function() {
		}
		this.divSkin.ggEnterFullscreen=function() {
		}
		this.divSkin.ggExitFullscreen=function() {
		}
		this.skinTimerEvent();
	};
	this.hotspotProxyClick=function(id) {
	}
	this.hotspotProxyOver=function(id) {
	}
	this.hotspotProxyOut=function(id) {
	}
	this.changeActiveNode=function(id) {
		var newMarker=new Array();
		var i,j;
		var tags=me.player.userdata.tags;
		for (i=0;i<nodeMarker.length;i++) {
			var match=false;
			if ((nodeMarker[i].ggMarkerNodeId==id) && (id!='')) match=true;
			for(j=0;j<tags.length;j++) {
				if (nodeMarker[i].ggMarkerNodeId==tags[j]) match=true;
			}
			if (match) {
				newMarker.push(nodeMarker[i]);
			}
		}
		for(i=0;i<activeNodeMarker.length;i++) {
			if (newMarker.indexOf(activeNodeMarker[i])<0) {
				if (activeNodeMarker[i].ggMarkerNormal) {
					activeNodeMarker[i].ggMarkerNormal.style.visibility='inherit';
				}
				if (activeNodeMarker[i].ggMarkerActive) {
					activeNodeMarker[i].ggMarkerActive.style.visibility='hidden';
				}
				if (activeNodeMarker[i].ggDeactivate) {
					activeNodeMarker[i].ggDeactivate();
				}
			}
		}
		for(i=0;i<newMarker.length;i++) {
			if (activeNodeMarker.indexOf(newMarker[i])<0) {
				if (newMarker[i].ggMarkerNormal) {
					newMarker[i].ggMarkerNormal.style.visibility='hidden';
				}
				if (newMarker[i].ggMarkerActive) {
					newMarker[i].ggMarkerActive.style.visibility='inherit';
				}
				if (newMarker[i].ggActivate) {
					newMarker[i].ggActivate();
				}
			}
		}
		activeNodeMarker=newMarker;
	}
	this.skinTimerEvent=function() {
		setTimeout(function() { me.skinTimerEvent(); }, 10);
		this._loading_text.ggUpdateText();
		var hs='';
		if (me._loading_bar.ggParameter) {
			hs+=parameterToTransform(me._loading_bar.ggParameter) + ' ';
		}
		hs+='scale(' + (1 * me.player.getPercentLoaded() + 0) + ',1.0) ';
		me._loading_bar.style[domTransform]=hs;
	};
	this.addSkin();
};
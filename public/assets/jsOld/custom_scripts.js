	
var customJS;

jQuery(document).ready(function($){

	customJS = {
		
		common : {
			commonJS : function(){

				$('.loginCall').on('click',function() {
					$('.loginModal, .overlay').show();
				});

				$('.regCall').on('click',function() {
					$('.regModal, .overlay').show();
				});

				$('.btnModalClose').on('click',function() {
					$('.modal_wrapper, .overlay').hide();
				});

				if(document.getElementById("spot") != "" && document.getElementById("spot") != null )
					dragElement(document.getElementById("spot"));

					function dragElement(elmnt) {

						var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
						if (document.getElementById(elmnt.id + "header")) {
							/* if present, the header is where you move the DIV from:*/
							document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
						} else {
							/* otherwise, move the DIV from anywhere inside the DIV:*/
							elmnt.onmousedown = dragMouseDown;
						}

						function dragMouseDown(e) {
							e = e || window.event;
							// e.preventDefault();
							// get the mouse cursor position at startup:
							pos3 = e.clientX;
							pos4 = e.clientY;
							document.onmouseup = closeDragElement;
							// call a function whenever the cursor moves:
							document.onmousemove = elementDrag;
						}

						function elementDrag(e) {
							e = e || window.event;
							e.preventDefault();
							// calculate the new cursor position:
							pos1 = pos3 - e.clientX;
							pos2 = pos4 - e.clientY;
							pos3 = e.clientX;
							pos4 = e.clientY;
							// set the element's new position:
							elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
							elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
						}

						function closeDragElement() {
							/* stop moving when mouse button is released:*/
							document.onmouseup = null;
							document.onmousemove = null;
						}
					}
			
				$('.bannerSlider').slick({
					dots: false,
					autoplay: true,
					arrows: false,
					speed: 800,
					fade: true,
					adaptiveHeight: true
				});
				

				$(window).scroll(function () {
					var scroll = $(window).scrollTop();
					if(scroll > 50) {
						$('.mainHeader').addClass('headerV1');
					}
					else {
						$('.mainHeader').removeClass('headerV1');
					}
				});

				













			},
			
			html5Tags : function(){
				document.createElement('header');  
				document.createElement('section');  
				document.createElement('nav');  
				document.createElement('footer');  
				document.createElement('menu');  
				document.createElement('hgroup');  
				document.createElement('article');  
				document.createElement('aside');  
				document.createElement('details'); 
				document.createElement('figure');
				document.createElement('time');
				document.createElement('mark');
			},
						
			commonInput : function(){
				
				
				var $inputText = $('.queryInput input, .queryInput textarea');
				$inputText.each(function(){
					var $thisHH = $(this);
					if(!$(this).val()){
						$(this).parent().find('label').show();
					}else{
						setTimeout(function(){
						$thisHH.parent().find('label').hide();
						},100);
					}
					
				});
				$inputText.focus(function(){
					if(!$(this).val()){
						$(this).parent().find('label').addClass('showLab');
					}
				});
				$inputText.keydown(function(){
					if(!$(this).val()){
						$(this).parent().find('label').hide();
					}
				});
				$inputText.on("blur",function(){
					var $thisH = $(this);
					if(!$(this).val()){
						$(this).parent().find('label').show().removeClass('showLab');
					}else{
						$thisH.parent().find('label').hide();
					}
					
				});
				
			}
			
		}//end commonJS
			
	};
	
	
	customJS.common.commonJS();
	customJS.common.html5Tags();
	customJS.common.commonInput();

});

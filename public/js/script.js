(function(){

	$(document).ready(function(){
		$('#homeSlideshow').slick();
	  //MODULE ACCORDION
	  function close_accordion(element,currentAttrValue){
		    $(element).removeClass('active');
		    $('.accordion ' + currentAttrValue).slideUp(300).removeClass('open');
		}

		function open_accordion(e){
			e.preventDefault();

			// Grab current anchor value
		    var currentAttrValue = $(this).attr('href');
		    var isOpen = $(this).hasClass('active');
		    if(isOpen == true){
		    	close_accordion(this,currentAttrValue);
		    }else{
		    	$(this).addClass('active');
	    		$('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 		    	
		    }

			
		}
		var accordionTitle = document.getElementsByClassName('accordion-section-title');
		for (var i = 0; i < accordionTitle.length; i++) {
		    accordionTitle[i].addEventListener('click', open_accordion, false);
		}




	});
})()
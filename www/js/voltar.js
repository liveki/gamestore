$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.up').addClass('show');
		} else {
			$('.up').removeClass('show');
		}
	});
});

 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 100) {
			$('.up').addClass('show');
		} else {
			$('.up').removeClass('show');
		}
	});
 
	$('.up').on('click', scrollToTop);
});
 

document.body.style.overflow = 'hidden';
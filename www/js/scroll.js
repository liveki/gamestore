	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 800);
	        return false;
	      }
	    }
	  });
	});


$(document).ready(function(){
    $('nav a').click(
        function(e)
        {
            $('nav a').removeClass('active');
            $(e.currentTarget).addClass('active');
        }
    );
});

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
 

//document.body.style.overflow = 'hidden';





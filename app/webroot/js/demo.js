/* SHRINK MENU WHEN SCROLL */ 

$(window).on("scroll touchmove", function () {
	if($(document).scrollTop() > 0){
		$('body').addClass('shrink');
		$('.to-top').fadeIn(300);
	}else{
		$('body').removeClass('shrink');
		$('.to-top').fadeOut(300);
	}
});


/* TO TOP */

$('.to-top').on('click', function(){
	$('html,body').animate({ scrollTop: 0 }, 'fast');
})
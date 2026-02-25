// JavaScript Document
 /*$(document).ready(
	function(){
	setInterval('imageRotator()', 2000);
	}
);

function imageRotator(){
	var curImg = $('#imageShow li.current');
	var nexImg = curImg.next();
	if (nextImg.length==0){
		nextImg = $('#imageShow li:first');
	}
	curImg.removeClass('current').addClass('previous');
	nextImg.css({opacity:0}).addClass('current').animate({opacity:1},1000, 
		function() {
			curImg.removeClass('pevious');
		}
	);
};

*/	
	
function imageRotator() {
	var curImg = $('#imageShow li.current');
	var nextImg = curImg.next('li');

	if (nextImg.length == 0) {
		nextImg = $('#imageShow li:first');
	}
	
	// Ensure current image is visible
	curImg.css('opacity', 1);
	
	// Set next image to invisible and make it current
	nextImg.css('opacity', 0).addClass('current');
	
	// Remove current class from previous and add previous class
	curImg.removeClass('current').addClass('previous');
	
	// Animate the transition
	nextImg.animate({opacity: 1}, 2000, function() {
		// Clean up - remove previous class from old image
		$('#imageShow li.previous').removeClass('previous').css('opacity', 0);
	});
};

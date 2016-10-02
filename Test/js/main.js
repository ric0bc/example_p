jQuery(document).ready(function($){

	var slider = $('.slider ul');
	var sliderPosition = 0;
	var sliderLeft = 0;

	var bounceLeft = $('.slider ul li:last-child').clone().addClass('bounce-left');
	var bounceRight = $('.slider ul li:first-child').clone().addClass('bounce-right');;
	slider.append(bounceRight).prepend(bounceLeft);
	
	var slideFakeCount = $('.slider ul li').length;
	var slideCount = $('.slider ul li').length -2;
	var slideWidth = $('.slider ul li').width();
	var slideHeight = $('.slider ul li').height();
	var slideFullWidth = (slideFakeCount * 100) + '%';

	// $('.slider').css({width:slideWidth, height: slideHeight});


	slider.css('width', slideFullWidth);
	slider.find('li').css('width', (100 / slideFakeCount) + '%');

	function moveLeft(){
		sliderLeft += 100;
		sliderPosition--;
		slider.animate({
			left: sliderLeft + '%'
		}, 200, function(){
			if (sliderPosition < 0) {
				sliderLeft = -1*((slideCount -1) * sliderLeft);
				slider.css('left', sliderLeft  + '%');	
				sliderPosition = slideCount - 1;
			}
		});
	};

	function moveRight(){
		sliderLeft -= 100;
		sliderPosition++;
		slider.animate({
			left: sliderLeft + '%'
		}, 200, function(){
			if (sliderPosition == slideCount) {
				sliderLeft = 0;
				slider.css('left', sliderLeft + '%');
				sliderPosition = 0;
			}
		});
	};

	$('a.left-arrow').click(function(e){
		e.preventDefault();
		moveLeft();
	});

	$('a.right-arrow').click(function(e){
		e.preventDefault();
		moveRight();
	});

});
var slides = document.querySelectorAll("#slides .slide");
var current_slide = 0;
var total_slide = slides.length;
var next_slider = setInterval(nextSlide, 3000);
function nextSlide(){
	slides[current_slide].className = 'slide';
	current_slide = current_slide+1;
	if(current_slide > total_slide-1)
		current_slide =0;
	slides[current_slide].className = 'slide active';
	//console.log(current_slide);
}
function pause()
{
	clearInterval(next_slider);
}
function play()
{
	next_slider = setInterval(nextSlide, 3000);
}
function next(){
	nextSlide();
}
function previous()
{
	slides[current_slide].className = 'slide';
	current_slide = current_slide - 1;
	if(current_slide == 0)
		current_slide = total_slide-1; 
	slides[current_slide].className = 'slide active';
	//console.log(current_slide);
}
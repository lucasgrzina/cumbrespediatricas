$(document).ready(function(){
	initButtonsLang();
});

function initButtonsLang(){
	$('.btn-idioma').click(function(e){
		e.preventDefault();
		let video = $(this).attr('video');

		$('.hide-video').remove();
		$('.show-video').css('display', 'block');

		$('.load-video').html('<iframe src="https://player.vimeo.com/video/'+video+'" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>');
	});
}
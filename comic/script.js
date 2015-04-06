$(document).ready(function(){
$('.button').mousedown(function(){
    $(this).addClass("clicked");
	
});

$('.button').mouseout(function(){
    $(this).removeClass("clicked");
});

$('.button').mouseup(function(){
    $(this).removeClass("clicked");
	
	$(this).addClass("active");
	
});

$('.nav_element').hover(function(){
	$(this).addClass('nav_element_hovered')},function(){$(this).removeClass('nav_element_hovered')
});
$('.nav_element').click(function(){
	$('.nav_element').removeClass('nav_element_selected');
	$(this).addClass('nav_element_selected')});

$('.nav_element').click(function(){
	$list = $(this).find('.dropdown-list');
	/*for($other_list in $('.dropdown-list'))
	{
		if($list!=$other_list)
			$other_list.slideUp();
	}*/
	$('.dropdown-list').not($list).slideUp();
	if($list!=undefined)
	{
		$list.slideToggle();
		
		
	}
});

$('.dropdown-list > li').hover(function(){
	$(this).addClass('nav_element_hovered')},function(){$(this).removeClass('nav_element_hovered')
});

});


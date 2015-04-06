
$(document).ready(function ()
	{
		$('.in').click(function(){
		
		$screen = $('#fullScreen');
		$width = $screen.width();
		$screenleft = $screen.css("left");
		$img = $('#fullScreen > img');
		//alert($img.width());
		//alert($img.width()<=1000)
		if($img.width()<1000)
		{
		
			$width+=100;
			$screenleft = parseFloat($screenleft.substr(0,$screenleft.length-3));
			$screenleft-=50;
			
			$screen.css('left',$screenleft+"px");
			$screen.css('width',$width+"px");
			
			
			$width = $img.width();
			$width+=100;
			
			$img.css('width',$width+"px");
		}
		});
		
		$('.out').click(function(){
		
		$screen = $('#fullScreen');
		$width = $screen.width();
		$screenleft = $screen.css("left");
		$img = $('#fullScreen > img');
		//alert($img.width());
		//alert($img.width()<=1000)
		if($img.width()>640)
		{
		
			$width-=100;
			$screenleft = parseFloat($screenleft.substr(0,$screenleft.length-3));
			$screenleft+=50;
			
			$screen.css('left',$screenleft+"px");
			$screen.css('width',$width+"px");
			
			
			$width = $img.width();
			$width-=100;
			
			$img.css('width',$width+"px");
		}
		});
	
	$('.collections tr td').click(function(){
		
		$img = $(this).find('img');
		
		$fimg = $('#fullScreen').find('img');
		$fimg.attr("src",$img.attr("src"));
	
	
	
	});
		
	}
	);
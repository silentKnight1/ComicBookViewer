$(document).ready(function() {  
  
        
        var auto_slide = 1;  
            var hover_pause = 1;  
        var key_slide = 0;  
  
        
        var auto_slide_seconds = 5000;  
        
  
        
        $('#carousel_ul li:first').before($('#carousel_ul li:last'));  
  
        
        if(auto_slide == 1){  
        
            var timer = setInterval('slide("right")', auto_slide_seconds);  
  
        
            $('#hidden_auto_slide_seconds').val(auto_slide_seconds);  
        }  
  
     
        if(hover_pause == 1){  
            //when hovered over the list  
            $('#carousel_ul').hover(function(){  
                //stop the interval  
                clearInterval(timer)  
            },function(){  
                //and when mouseout start it again  
                timer = setInterval('slide("right")', auto_slide_seconds);  
            });  
  
        }  
  
        //check if key sliding is enabled  
        if(key_slide == 1){  
  
            //binding keypress function  
            $(document).bind('keypress', function(e) {  
                //keyCode for left arrow is 37 and for right it's 39 '  
                if(e.keyCode==37){  
                        //initialize the slide to left function  
                        slide('left');  
                }else if(e.keyCode==39){  
                        //initialize the slide to right function  
                        slide('right');  
                }  
            });  
  
        }  
  
  });  
  
//FUNCTIONS BELLOW  
  
//slide function  
function slide(where){  
  
            //get the item width  
            var item_width = $('#carousel_ul li').outerWidth() + 10;  
  
            
            if(where == 'left'){  
                //...calculating the new left indent of the unordered list (ul) for left sliding  
                var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;  
            }else{  
                //...calculating the new left indent of the unordered list (ul) for right sliding  
                var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;  
  
            }  
  
            
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){  
  
            
                if(where == 'left'){  
                    //...and if it slided to left we put the last item before the first item  
                    $('#carousel_ul li:first').before($('#carousel_ul li:last'));  
                }else{  
                    //...and if it slided to right we put the first item after the last item  
                    $('#carousel_ul li:last').after($('#carousel_ul li:first'));  
                }  
  
                //...and then just get back the default left indent  
                $('#carousel_ul').css({'left' : '-500px'});  
            });  
  
}  

$('#right_scroll').mousedown(function(){

	$img = $(this).find('img');
	$img.attr('src','resources/circle_next_arrow_disclosure.png');
});
$('#right_scroll').mouseup(function(){

	$img = $(this).find('img');
	$img.attr('src','resources/circle_next_arrow.png');
});
$('#left_scroll').mousedown(function(){

	$img = $(this).find('img');
	$img.attr('src','resources/circle_back_arrow_disclosure.png');
});
$('#left_scroll').mouseup(function(){

	$img = $(this).find('img');
	$img.attr('src','resources/circle_back_arrow.png');
});
$(document).ready(function(){

    var screenSize = $(window).width();
    var screenHeight = $(window).height();

    $("#content").css('margin-top',screenHeight);

    if( screenSize > 768){
        $('.videoBox>img').attr('src','images/sub2_bg1.png');
    }
    if(screenSize <= 768){
        $('.videoBox>img').attr('src','images/sub2_bg2.png');
    }
    
    $(window).resize(function(){   
    screenSize = $(window).width(); 
    screenHeight = $(window).height();
        
    $("#content").css('margin-top',screenHeight);
        
    if( screenSize > 768){
        $('.videoBox>img').attr('src','images/sub2_bg1.png');
    }
    if(screenSize <= 768){
        $('.videoBox>img').attr('src','images/sub2_bg2.png');
    }
    }); 

   $('.down').click(function(){
		screenHeight = $(window).height();
		$('html,body').animate({'scrollTop':screenHeight}, 1000);
	});

});
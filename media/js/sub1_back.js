$(document).ready(function(){

    var screenSize = $(window).width();
    var screenHeight = $(window).height();

    $("#content").css('margin-top',screenHeight);

    if( screenSize > 768){
        $('.videoBox>img').attr('src','images/sub01_bg.png');
    }
    if(screenSize <= 768){
        $('.videoBox>img').attr('src','images/s3_01.jpg');
    }
    
    $(window).resize(function(){   
    screenSize = $(window).width(); 
    screenHeight = $(window).height();
        
    $("#content").css('margin-top',screenHeight);
        
    if( screenSize > 768){
        $('.videoBox>img').attr('src','images/sub01_bg.png');
    }
    if(screenSize <= 768){
        $('.videoBox>img').attr('src','images/s3_01.jpg');
    }
    }); 

   $('.down').click(function(){
		screenHeight = $(window).height();
		$('html,body').animate({'scrollTop':screenHeight}, 1000);
	});

});
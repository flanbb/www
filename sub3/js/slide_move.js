    $(document).ready(function () {
            
              $('.content .topMove').hide();
           
             $(window).on('scroll',function(){
                  var scroll = $(window).scrollTop();
                 
                 
                  $('.text').text(scroll);
                  if(scroll>500){
                      $('.content .topMove').fadeIn('slow');
                  }else{
                      $('.content .topMove').fadeOut('fast');
                  }
             });
           
              $('.content .topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
              $('.slideMenu a').click(function(){
                  var value=0;
                  if($(this).hasClass('link1')){
                     value= $('.content section:eq(0)').offset().top;   
                  }else if($(this).hasClass('link2')){
                     value= $('.content section:eq(1)').offset().top; 
                  }else if($(this).hasClass('link3')){
                     value= $('.content section:eq(2)').offset().top; 
                  }else if($(this).hasClass('link4')){
                     value= $('.content section:eq(3)').offset().top; 
                  }
                  
                $("html,body").stop().animate({"scrollTop":value},1000);
              });
       });
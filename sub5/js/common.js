//nav내비gnb , top 올리는것

$(document).ready(function() {
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
      
    $(".menu_ham").click(function(e) { //메뉴버튼 클릭시
        e.preventDefault();
 
        var documentHeight =  $(document).height();
        $("#gnb").css('height',documentHeight); 
 
       if(op==false){
         $("#gnb").animate({right:0,opacity:1}, 'fast');
         $('#headerArea').addClass('mn_open');
         op=true;
         $('modal_box').fadeIn('slow');
       }else{
         $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
         $('#headerArea').removeClass('mn_open');
         op=false;
         $('modal_box').fadeOut('fast');
       }
 
    });
    
    
     //2depth 메뉴 교대로 열기 처리 
     var onoff=[false,false,false,false,false];
     var arrcount=onoff.length;
     
     console.log(arrcount);
     
     $('#gnb .depth1 h3 a').click(function(){
         var ind=$(this).parents('.depth1').index();
         
         console.log(ind);
         
        if(onoff[ind]==false){
         //$('#gnb .depth1 ul').hide();
         $(this).parents('.depth1').find('ul').slideDown('slow');
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
          for(var i=0; i<arrcount; i++) {onoff[i]=false; }
          onoff[ind]=true;
            
          $('.depth1 span').text('+');   
          $(this).find('span').text('-');   
             
        }else{
          $(this).parents('.depth1').find('ul').slideUp('fast'); 
          onoff[ind]=false;   
            
          $(this).find('span').text('+');     
        }
     });    
   
   });



   //상단 으로이동         
$('.topMove').hide();
        
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
    var scroll = $(window).scrollTop(); //스크롤의 거리
    
    
    // $('.text').text(scroll);

    if(scroll>80){ //500이상의 거리가 발생되면
        $('.topMove').fadeIn('slow');  //top보여라~~~~
    }else{
        $('.topMove').fadeOut('fast');//top안보여라~~~~
    }
});

$('.topMove').click(function(e){
    e.preventDefault();
    //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({"scrollTop":0},1000); 
});

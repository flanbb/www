
$(document).ready(function() {
  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('slow',function(){$(this).stop();}); //모든 서브를 다 열어라 height - 200 으로 내려라!!
          $('#headerArea').animate({height:260},'fast').clearQueue();
       },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라 --- 원상태로 돌려가
          $('#headerArea').animate({height:89},'normal').clearQueue();
     });
     
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#0066b3');
       },function() {
          $('.depth1',this).css('color','#333');
     });

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').fadeIn('slow');
        $('#headerArea').animate({height:260},'fast').clearQueue();
     });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').hide();
        $('#headerArea').animate({height:89},'normal').clearQueue();
    });



     //상단 으로이동         
      $('.topMove').hide();
               
      $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
         var scroll = $(window).scrollTop(); //스크롤의 거리
         
         
         // $('.text').text(scroll);

         if(scroll>500){ //500이상의 거리가 발생되면
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
   });



      //푸터 패밀리사이트
   

    $('.select .arrow').toggle(function(e){
		$('.select .aList').fadeIn('fast');	
	}, function(e){
      e.preventDefault();
        $('.select .aList').fadeOut('fast');	
	});

	//tab키 처리
	$('.select .arrow').on('focus', function () {        
              $('.select .aList').show();	
   });

   $('.select .aList li:last').find('a').on('blur', function () {        
         $('.select .aList').hide();
   }); 



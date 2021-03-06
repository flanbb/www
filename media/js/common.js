 document.addEventListener("DOMContentLoaded", function(){
  
    // header
  
    var smh = $('.videoBox').height();  //비주얼 이미지의 높이를 리턴한다   900px
    var on_off = false;  //false(안오버)  true(오버)  
  
    $('#headerArea').mouseenter(function () {
      $(this).css('background', 'rgba(0,0,0,.9)');
  
      on_off = true;
    });
  
    $('#headerArea').mouseleave(function () {
      var scroll = $(window).scrollTop();  //스크롤의 거리
  
      if (scroll >= 0 && scroll < smh - 50) { //스크롤이 내려가지 않았을 때
          $(this).css('background', 'none');
  
      } else if (scroll > smh - 50) { //스크롤이 내려갔을 때
          $(this).css('background', 'rgba(0,0,0,.9)');
  
      }
      on_off = false;
    });
  
    $(window).on('scroll', function () {//스크롤의 거리가 발생하면
      var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
      //console.log(scroll);
  
      if (scroll > smh - 50) {//스크롤300까지 내리면
          $('#headerArea').css('background', 'rgba(0,0,0,.9)');
  
      } else {//스크롤 내리기 전 디폴트(마우스올리지않음)
          if (on_off == false) {
              $('#headerArea').css('background', 'none');
          }
      };
  
    });
  
    // menu btn
  
    var current;
    $('.menu_btn').click(function(e){
      e.preventDefault();
  
      var $menu = document.querySelector('.menu');
  
      if ($menu.style.display == 'block' && current == 1){
        // $menu.style.display = 'none';
        var scroll =  $(window).scrollTop();
        var $videoBox = $('.videoBox').height();
        $('.menu').slideUp('fast');
        if (on_off == true && scroll < $videoBox) {
          $('#headerArea').css('background', 'none');
  
        } else {
          $('#headerArea').css('background', 'rgba(0,0,0,.9)');
  
        }
        current = 0;
      } else {
        $('.menu').slideDown('slow');
        $('#headerArea').css('background', 'rgba(0,0,0,.9)');
        current = 1;
      }
    })
    
    $(window).resize(function(){ 
      var $screenX = $(window).width(); 
      if($screenX > 1024){
        $(".menu").show();
        current=1;
      }
      if(current==1 && $screenX <= 1024){
        $(".menu").hide();
        current=0;
      }
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
   



    // 유튜브 팝업
    $(document).ready(function() {
      $('.popup-youtube').magnificPopup({
          disableOn: 320,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: true,

          fixedContentPos: false
      });
  });
   


  });
  
  



  $(document).ready(function () {


    $('.slideMenu a').click(function(e){
        e.preventDefault(); //href="#" 속성을 막아주는..메소드
   
         var value=0; //이동할 스크롤의 거리

         if($(this).hasClass('link1')){   //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){ 아이디도 됨 이즈 <<<
            value= $('#content .con1').offset().top;  // 해당 콘테츠의 상단의 거리~~
         }else if($(this).hasClass('link2')){
            value= $('#content .con2').offset().top; 
         }else if($(this).hasClass('link3')){
            value= $('#content .con3').offset().top; 
         }else if($(this).hasClass('link4')){
            value= $('#content .con4').offset().top; 
         }
         
       $("html,body").stop().animate({"scrollTop":value},1000);
     });

 });
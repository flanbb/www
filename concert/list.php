<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "concert";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홍보센터</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <link rel="stylesheet" href="./css/concert.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
	<link rel="stylesheet" href="./css/movieClip2.css">
	<link rel="stylesheet" href="./css/magnific-popup.css">

	<script src="../common/js/prefixfree.min.js"></script>

<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

</head>

<body>
<div class="wrap">
       <!-- 서브 헤더영역 -->
       <? include "../common/sub_header.html" ?>
	   <div class="visual">
                <img src="./common/images/sub5_visual.jpg" alt="visual">    
                <h3>홍보센터</h3>
    			<p>Daewoo Shipbuilding Comunications </p>

            </div>

			<div class="sub_menu">
				<ul>
					<li><a href="../sub5/sub5_1.html">방문신청</a></li>
					<li><a href="../sub5/sub5_2.html">FAQ</a></li>
					<li><a href="../greet/list.php">게시판</a></li>
					<li class="current"><a href="../concert/list.php">홍보센터</a></li>
				</ul>
        
   			</div>

			   <article id="content" >
                <div class="title_area">
                    <div class="line_map"><i class="fas fa-home"></i> home   &gt;   홍보센터   &gt; <strong>  홍보센터  </strong></div>
                    <h2>홍보센터</h2>
                    <!-- <p>슬로건.....</p> -->
                <div class="content_bg"> </div> 
            </div>

		<section class="content04">
			
			<h3>YouTube </h3>
			<p> DSME의 다양한 하루를 만나보세요</p>
				
				<div class="video">  
					<iframe width="1200px" height="512px" src="https://www.youtube.com/embed/hfUoVHins2A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  
				</div>

				<div class="clip">
					<div class="clip_part">
						
						<div class="contentArea">
								<div class="imgPart">
									<a class="popup-youtube" href="https://www.youtube.com/watch?v=zF5Ddo9JdpY"><img src="./images/dsme03.png" alt="Another Day Of Sun">
									<div class="playBnt">
										<img src="./images/play.png" alt="">
									</div>
									</a>
								</div>
							</div>
							<dl class="text_a">
								<dt>배는 이렇게 만들어야 세계1위가 될수 있다</dt>
								<dd>전 세계 바다를 장악한 수많은 초대형 선박들이 어떤 과정을 통해 완성되는지 
									마치 요리레시피를 보듯이 재밌게 살펴봅시다. #조선소 #대우조선해양 #선박 건조 공정 </dd>
							</dl>

					</div> 
						  
					  
							
					<div class="clip_part">
						
						<div class="contentArea">
								<div class="imgPart">
									<a class="popup-youtube" href="https://www.youtube.com/watch?v=mDYqT0_9VR4"><img src="./images/dsme02.png" alt="Another Day Of Sun">
									<div class="playBnt">
									<img src="./images/play.png" alt="">
									</div>
									</a>
								</div>
							</div>
							<dl class="text_a">
								<dt>세계에서 가장 큰 선박을 우리나라가 만들었다고? 보유했다고?</dt>
								<dd>세계최대 항공모함보다 더
									세계최대 크루즈선보다 더 큰
									지구에서 가장 큰 선박이 탄생했다!

									21세기 해전, 세계 해운 전쟁에 나선
									세계 최대 컨테이너선. #컨테이너선 #HMM #초대형 </dd>
							</dl>
					</div>             
				</div>


				
				
		</section> 

		<section>
		<h3>DSME 보도자료</h3>
		<p></p>
		<div class="content_area">

		

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		
		<div id="list_search">
		<div id="list_search1">총 : <?= $total_record ?> 건  </div>
		<div class="list_search_group">
		<div id="list_search2">
			<select class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
						<option value=''>보기</option>
						<option value='5'>5</option>
						<option value='10'>10</option>
						<option value='15'>15</option>
						<option value='20'>20</option>
			</select>
		</div>
		<div id="list_search3">
			<select name="find">
				<option value='subject'>제목</option>
				<option value='content'>내용</option>
				<option value='nick'>별명</option>
				<option value='name'>이름</option>
			</select>
		</div>
		<div id="list_search4"><input type="text" name="search"></div>
		<div id="list_search5"><input type="submit" value="검색"></div>
		</div>
		</div>
		</form>



        <div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_content = $row[content];
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if(!$row[file_copied_0]){
        $thum_img = './data/default.jpg'; 
	  }else{
	  	$thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
	  	$thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
	  }
?>
			<div class="list_item">
		      <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
			  <div class="list_item2"><?= $number ?></div>	
			  <div class="list_item1">
				       <img src="<?=$thum_img?>" alt="" >
				       <span class="subject">[<?= $item_subject ?>]</span>
					   
				</div>
				<div class="list_itemwrap">
				 
				  <div class="list_item3"><?= $item_nick ?></div>
				  <div class="list_item4"><?= $item_date ?></div>
				  <div class="list_item5">조회 <?= $item_hit ?></div>
				</div>
			  </a>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> < 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 >
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->


		</div>
		</section>
        </article>

<!-- 서브 푸터영역 -->
<? include "../common/sub_footer.html" ?>

     </div>
 
</body>
</html>
<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  (나야나~~~~~)
		$page=2
	*/
	
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기 수정</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <link rel="stylesheet" href="./css/greet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="../common/js/prefixfree.min.js"></script>


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
				<li class="current"><a href="../greet/list.php">게시판</a></li>
				<li><a href="../concert/list.php">홍보센터</a></li>
			</ul>
        
   		</div>

		<article id="content" >
			<div class="title_area">
			<div class="line_map"><i class="fas fa-home"></i> home   &gt;   홍보센터   &gt; <strong>  게시판  </strong></div>
                    <h2>게시판</h2>
				<!-- <p>슬로건.....</p> -->
			<div class="content_bg"> </div> 
			
			</div>

            <div class="content_area">


            <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		    <div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit" value="완료">&nbsp;
								<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>


        </div>

        </article>

<!-- 서브 푸터영역 -->
<? include "../common/sub_foot.html" ?>

     </div>

</body>
</html>
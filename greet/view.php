<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSME</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="./common/css/sub5common.css">
    <link rel="stylesheet" href="./css/greet.css">
    <script src="https://kit.fontawesome.com/087fc1f4e8.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
    <script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href; //'delete.php?num=1'
        }
    }
    </script>

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



            <div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="master")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>

<? 
	if($userid )
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>



            </div>

        </article>

<!-- 서브 푸터영역 -->
<? include "../common/sub_foot.html" ?>

     </div>

</body>
</html>
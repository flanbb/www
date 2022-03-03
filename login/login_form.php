<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
	<link href="../common/css/common.css">
	<link href="./css/login.css">
	<style>

/* #content{position:relative; background: url(./images/bg_w_.png) ; height: 1000px ; background-size: cover ; font-family: 'Noto Sans KR', sans-serif;}
#content h2{font-size: 1.75rem; text-align:center;}
#content .wrap {width:600px;  background-color: white ;text-align:center;box-shadow:10px 10px 20px rgba(0,0,0,0.2); position:relative; top:40%; left:50%; margin-left:-300px; }
#id_pw_input .login_input { height: 50px;}
#login_button { height: 100px;}
.window {width: 80%;  border:1px solid #f00; background-color:#fff; box-shadow:10px 10px 20px rgba(0,0,0,0.2); text-align:center;}
	 */
	
	body {
    background-color: rgb(245, 245, 245);
    font-size: 18px;
    font-family: 'Nanum Gothic', 'san-serif';
    background-image: url(../images/member_bg.jpg);
    background-size: cover;
    background-attachment: fixed;
    
}
	.wrap {background-color: rgb(245, 245, 245); }
	#content {position:relative; height: 1000px ; background-size: cover ; font-family: 'Noto Sans KR', sans-serif;}
	#content .window {position: absolute; left:50%; top: 25%; margin-left: -270px ;background-color: rgb(255, 255, 255); box-shadow:5px 5px 10px rgba(0,0,0,0.2);}
	#content .window h1 {padding: 50px 190px 20px; }
	#content .window #id_pw_input {display: flex; flex-wrap: wrap; flex-direction: column; padding: 20px; }
	#content .window #id_pw_input .login_input{ height: 60px;  width:99%; margin-bottom: 10px; border: 0; font-size: 18px;  background-color: rgb(243, 243, 243);}
	#content .window .login_button {  height: 60px;width: 491px; border: 0; margin-left: 20px; background-color: rgb(78, 136, 245); color: white; font-size:18px}
	#find_idpw { height: 60px;width: 491px;    margin:10px 0 0 20px; }
	#find_idpw span {padding:0 5px; text-decoration: none; color: #999; font-size: 14px; margin-right:80px ; }
	#find_idpw a {padding:0 5px; text-decoration: none; color: #666; font-size: 14px; }
	#find_idpw a
	</style>


</head>

<body>

	<div class="wrap">
		<article id="content" >
			
			<form  name="member_form" method="post" action="login.php" class="window" > 
				<h1><a href="../index.html"><img src="./images/header_logo.png" alt="logo"></a></h1>
					<div id="id_pw_input" >
					<div class="box">
						<input type="text" name="id" id="id" placeholder=" 아이디" class="login_input">
						<input type="password" name="pass" id="pass" placeholder=" 비밀번호" class="login_input">
					</div>	
						
					</div>
					<div id="login_button">
						<button type="submit" class="login_button"> DSME ID 로그인</button>
					</div>


					<div id="find_idpw" >
						<span>아이디/비밀번호가 기억나지 않는다면?</span>
					<a href="./id_find.php">아이디 찾기</a>
					<a href="./pw_find.php">비밀번호 찾기</a>
					</div>

			</form>
		</article>

	</div>

</body>
</html>





<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보수정</title>
    <link href="../common/css/common.css" rel="stylesheet">
    <link href="./css/member_modify.css" rel="stylesheet">
    <script>
            function check_id()
            {
                window.open("check_id.php?id=" + document.member_form.id.value,
                    "IDcheck",
                    "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
            }

            function check_nick()
            {
                window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
                    "NICKcheck",
                    "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
            }

            function check_input()
            {
                if (!document.member_form.pass.value)
                {
                    alert("비밀번호를 입력하세요");    
                    document.member_form.pass.focus();
                    return;
                }

                if (!document.member_form.pass_confirm.value)
                {
                    alert("비밀번호확인을 입력하세요");    
                    document.member_form.pass_confirm.focus();
                    return;
                }

                if (!document.member_form.name.value)
                {
                    alert("이름을 입력하세요");    
                    document.member_form.name.focus();
                    return;
                }

                if (!document.member_form.nick.value)
                {
                    alert("닉네임을 입력하세요");    
                    document.member_form.nick.focus();
                    return;
                }

                if (!document.member_form.hp2.value || !document.member_form.hp3.value )
                {
                    alert("휴대폰 번호를 입력하세요");    
                    document.member_form.nick.focus();
                    return;
                }

                if (document.member_form.pass.value != 
                        document.member_form.pass_confirm.value)
                {
                    alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
                    document.member_form.pass.focus();
                    document.member_form.pass.select();
                    return;
                }

                document.member_form.submit();
            }

            function reset_form()
            {
                document.member_form.id.value = "";
                document.member_form.pass.value = "";
                document.member_form.pass_confirm.value = "";
                document.member_form.name.value = "";
                document.member_form.nick.value = "";
                document.member_form.hp1.value = "010";
                document.member_form.hp2.value = "";
                document.member_form.hp3.value = "";
                document.member_form.email1.value = "";
                document.member_form.email2.value = "";
                
                document.member_form.id.focus();

                return;
            }
    </script>
</head>

<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

<body>
    
</body>

    <div class="wrap">
        <article id="content">
            <form  name="member_form" method="post" action="modify.php"> 
            <h1><a href="../index.html"> <img class="logo" src="./images/logo.png" alt="logo"></a></h1>
                <div id="form_join">
                    <table>
                        <h2>회원정보수정</h2>
                        <div id="must"> * 는 필수 입력항목입니다.</div>
                        <tr>
                            <th>아이디</th>
                            <td><?= $row[id] ?></td>
                        </tr>
                        <tr>
                            <th>비밀번호*</th>
                            <td><input type="password" name="pass" value=""></td>
                        </tr>
                        <tr>
                            <th>비밀번호 확인*</th>
                            <td><input type="password" name="pass_confirm" value=""></div></td>
                        </tr>
                        <tr>
                            <th>이름*</th>
                            <td><input type="text" name="name" value="<?= $row[name] ?>"></td>
                        </tr>
                        <tr>
                            <th>별명*</th>
                            <td><div id="nick1"><input type="text" name="nick" value="<?= $row[nick] ?>"></div><div id="nick2" ><a href="#" onclick="check_nick()"> 중복확인</a></div></td>
                        </tr>
                        <tr>
                            <th>휴대폰*</th>
                            <td><input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
                                            - <input type="text" class="hp1" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp1" name="hp3" value="<?= $hp3 ?>"></td>
                        </tr>
                        <tr>
                            <th>이메일</th>
                            <td><input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" id="email2" 
                                                    value="<?= $email2 ?>"></td>
                        </tr>
                    </table>
                </div>


                
                   
        
                <div id="button">
                    <a class="button_ok " href="#" onclick="check_input()">수정</a>
                    <a class="button_cancel" href="#" onclick="reset_form()">취소</a>
                </div>
                </form>

        </article>


    </div>


</html>





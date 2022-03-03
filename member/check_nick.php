<meta charset="utf-8">
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   if(!$nick) 
   {
      echo("별명을 입력하세요.");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where nick='$nick' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if ($num_record)
      {
       
         echo "<span style='color:red; font-size:15px; margin-left:10px'>중복된 별명입니다.</span>";
      }
      else
      {
         echo "<span style='color:green; font-size:15px ;margin-left:10px'>사용 가능한 별명입니다.</span>";
      }
		 
      mysql_close();
   }
?>


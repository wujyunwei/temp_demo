<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>會員管理系統</title>
</head>
<body>
<?php 
  require_once("connMysql.php");
  //require_once("login_check.php");
  if (!isset($_SESSION)){
    session_start();}
  //查詢登入會員資料
  $sql = "SELECT * FROM member where identity='patient'";
  $record = mysql_query($sql);
  //$row = mysql_fetch_assoc($record);
  while($row = mysql_fetch_array($record)){
        echo "病患姓名:<a href=\"danny.php?user_id=".$row['id']."\"> ".$row['name']."</a><br>";
    }
?>
</body>
</html>
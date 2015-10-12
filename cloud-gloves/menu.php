<?php 
  require_once("connMysql.php");
  if (!isset($_SESSION)){
    session_start();}
  //查詢登入會員資料
  $sql = "SELECT * FROM member WHERE account='".$_SESSION["account"]."'";
  $record = mysql_query($sql);
  $row = mysql_fetch_assoc($record);
?>
<div align="center">
  <p>會員名稱：<strong><?php echo $row["account"];?></strong></p>
  <p>身分：<strong><?php echo $row["identity"];?></strong></p>
  <p align="center">
    <a href="member_center.php">會員中心</a><br>
	<a href="download.php">會員下載區</a><br>
<?php 
if($row["identity"]=="doctor"){
	echo "<a href=\"showdanny.php\">顯示病患手套資料紀錄</a><br>";
	echo "<a href=\"showChartdanny.php\">顯示病患圖表</a><br>";
}else{
	echo "<a href=\"danny.php\">顯示手套資料紀錄</a><br>";
	echo "<a href=\"Chartdanny.php\">顯示圖表</a><br>";
}
?>
    <a href="member_update_form.php">修改會員資料</a><br>
    <a href="member_change_password_form.php">修改會員密碼</a><br>
    <a href="member_delete.php">刪除會員帳號</a><br>

    <a href="logout.php">登出系統</a><br>
  </p>
</div>
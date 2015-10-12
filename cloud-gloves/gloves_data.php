<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否已登入
  //require_once("login_check.php");
    //
    $sql = "INSERT INTO `cloud_gloves_db`.`finger_data` (`user_id`, `date_time`, `left_right_hand`, `up_down1`, `finger1`, `up_down2`, `finger2`, `up_down3`, `finger3`, `up_down4`, `finger4`, `up_down5`, `finger5`) VALUES (";
	$sql .= "'".$_POST["user_id"]."', ";
	$sql .= "'".$_POST["time"]."', ";
	$sql .= "'".$_POST["left_right_hand"]."', ";
	$sql .= "'".$_POST["up_down1"]."', ";
	$sql .= "'".$_POST["finger1"]."', ";
	$sql .= "'".$_POST["up_down2"]."', ";
	$sql .= "'".$_POST["finger2"]."', ";
	$sql .= "'".$_POST["up_down3"]."', ";
	$sql .= "'".$_POST["finger3"]."', ";
	$sql .= "'".$_POST["up_down4"]."', ";
	$sql .= "'".$_POST["finger4"]."', ";
	$sql .= "'".$_POST["up_down5"]."', ";
	$sql .= "'".$_POST["finger5"]."')";
    $record = mysql_query($sql);	
	//echo $_POST["time"] ;
	echo $record ;
?>
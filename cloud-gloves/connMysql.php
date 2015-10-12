<?php 
  //資料庫連線設定
  $db_host = "sql106.byethost33.com";
  $db_table = "b33_16511403_cloud_gloves_db";
  $db_username = "b33_16511403";
  $db_password = "public9a19";
  //設定資料連線
  if(!@mysql_connect($db_host, $db_username, $db_password))
    die("資料連結失敗！");
  //連接資料庫
  if(!@mysql_select_db($db_table))
    die("資料庫選擇失敗！");
  //設定字元集與連線校對
  mysql_query("SET NAMES 'utf8'");
?>

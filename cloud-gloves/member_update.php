﻿<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
  //執行更新動作
  $sql = "UPDATE member SET ";
  $sql .= "name='".$_POST["name"]."',";	
  $sql .= "sex='".$_POST["sex"]."',";
  $sql .= "birthday='".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',";
  $sql .= "email='".$_POST["email"]."',";
  $sql .= "url='".$_POST["url"]."',";
  $sql .= "telephone='".$_POST["telephone"]."',";
  $sql .= "address='".$_POST["address"]."',";
  $sql .= "contact='".$_POST["contact"]."',";
  $sql .= "memo='".$_POST["memo"]."' ";
  $sql .= "WHERE id=".$_POST["id"];
  mysql_query($sql);
  //修改完成後重導回會員中心
  header("Location: member_center.php");
?>
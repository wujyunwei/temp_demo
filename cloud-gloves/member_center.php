<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>遠距離手部復健診療系統會員系統</title>
</head>
<body background="back.gif">
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td>
      <p><font size="6" color="#FF0000">遠距離手部復健診療系統會員中心</font></p>
      <hr size="1" />
    	<p>系統功能</p>
      <ol>
        <li>加入會員。</li>
		<li>會員可下載手部復健遊戲</li>
		<li>會員可看手套復健遊戲資料紀錄</li>
		<li>會員可看手套復健遊戲資料圖表</li>
        <li>會員可修改本身資料。</li>
        <li>會員可修改本身密碼。</li>
        <li>會員可刪除本身帳號。</li>
      </ol>
    </td>
    <td width="200">
      <?php require_once("menu.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>

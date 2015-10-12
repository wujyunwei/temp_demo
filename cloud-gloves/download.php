<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>會員下載區</title>
</head>
<body background="back.gif">
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td>
		<p><font size="6" color="#FF0000">會員下載區</font></p>
        <hr size="1" />
		<p>行動裝置區</p>
		<ol>
			<li><a href="cloud_gloves.apk">手機版打地鼠</a></li>
		</ol>
		<p>電腦區</p>
		<ol>
			<li><a href="電腦版打地鼠.zip">電腦版打地鼠</a></li>
			<li><a href="手套監控程式.zip">手套監控程式</a></li>
		</ol>
    </td>
    <td width="200">
      <?php require_once("menu.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>

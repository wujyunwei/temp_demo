<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>遠距離手部復健診療系統 - 首頁</title>
<?php if(isset($_GET["loginFail"])) { ?>
  <script language="javascript">
    alert("登入失敗，請重新登入");
  </script>
<?php } ?>
</head>
<body background="back.gif">

<table width="250" border="1" align="center">
  <tr valign="top">
    <td align="center">
      <p>遠距離手部復健診療系統</p>
      <form name="form1" method="post" action="login.php">
        <p>帳號：<br>
          <input name="account" type="text">
        </p>
        <p>密碼：<br>
          <input name="password" type="password">
        </p>
        <p align="center">
          <input type="submit" name="login" value="登入">
        </p>
      </form>
      <p><a href="member_join_form.php">馬上申請會員</a></p>
    </td>
  </tr>
</table>
</body>
</html>

<?php 
	header("Content-Type: text/html; charset=utf-8");
	require_once("connMysql.php");
	//確認帳號是否已註冊
	$sql = "SELECT account FROM member WHERE account='".$_POST["account"]."'";
	$record = mysql_query($sql);
	if(mysql_num_rows($record)>0) {
		header("Location: member_join_form.php?registered=true&account=".$_POST["account"]);
	}else{
		if(isset($_POST["doctorcheck"])){
			if($_POST["doctorpass"]<>"2015"){
				header("Location: member_join_form.php?registered=true&doctor_pass=error");
			}
		}
		//若此帳號尚未註冊，則執行新增的動作
		$sql = "INSERT INTO member (name, account, password, sex, birthday, email, url, telephone, address, contact,identity, memo) VALUES (";
		$sql .= "'".$_POST["name"]."',";
		$sql .= "'".$_POST["account"]."',";
		$sql .= "'".$_POST["password1"]."',";
		$sql .= "'".$_POST["sex"]."',";
		$sql .= "'".$_POST["year"]."-".$_POST["month"]."-".$_POST["day"]."',";
		$sql .= "'".$_POST["email"]."',";
		$sql .= "'".$_POST["url"]."',";
		$sql .= "'".$_POST["telephone"]."',";
		$sql .= "'".$_POST["address"]."',";
		$sql .= "'".$_POST["contact"]."',";
		if(isset($_POST["doctorcheck"])){
			$sql .= "'doctor',";
		}else{
			$sql .= "'patient',";
		}
		$sql .= "'".$_POST["memo"]."')";
		mysql_query($sql);
	}
?>
<script language="javascript">
	alert("註冊成功\n請用申請的帳號密碼登入。");
	window.location.href = "index.php";
</script>

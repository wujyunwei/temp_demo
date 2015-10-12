<?php


$link = mysql_connect('sql106.byethost33.com','b33_16511403','public9a19');
if (!$link) { 
	die('Could not connect to MySQL:連接錯誤 ' . mysql_error()); 
} 
    if (!isset($_SESSION)){
    session_start();}
	

mysql_select_db("b33_16511403_cloud_gloves_db",$link);   //連上phpMyAdmin線上資料庫

include '/Classes/PHPExcel.php'; 
/** PHPExcel_Writer_Excel2007 */ 
//include 'PHPExcel/Writer/Excel2007.php'; 
/** Error reporting */ 
error_reporting(E_ALL); 
/** PHPExcel */ 
require_once '/Classes/PHPExcel.php'; 
/** PHPExcel_IOFactory */ 
require_once '/Classes/PHPExcel/IOFactory.php';


  //查詢登入會員資料
  $sql = "SELECT * FROM member WHERE account='".$_SESSION["account"]."'";
  $record = mysql_query($sql);
  $row = mysql_fetch_assoc($record);
	if($row["identity"]=="doctor"){
		  $sql = "SELECT * FROM member WHERE id='".$_GET["user_id"]."'";
		  $record = mysql_query($sql);
		  $row = mysql_fetch_assoc($record);
	}
//echo 'Connection OK'; 
//print "<BR>";  //<BR>換行
$xls= fopen("john.xls","w")or die("<BR>連接失敗!"); //開啟檔案為"w"寫入,"a"附加在檔案後面,"r"只有讀取    XLS為excel檔
$xrow1="SEQ\tRevTime\tThumb\tIndexF\tMiddleF\tRingF\tPinkie\n";//\t代表Tab \n代表NewLine就跟Enter一樣的功能
fputs($xls,$xrow1);
//----------------------------------------------------------------------------------------
//120.117.116.12
echo "<table border='1' width='100%'><tr><td width='20%'valign='top'>
	ID:".$row["id"]."<BR>
	Name:".$row["name"]."<BR>
	</td><td>";
	//<a href=Danny.xls>Download Excel</a>
 /*echo"<html>
	<FORM METHOD=POST ACTION=''>
		帳號: <INPUT TYPE='text' NAME='account'><BR>
		密碼: <INPUT TYPE='text' NAME='password'><BR>
		<INPUT TYPE='submit' value='送出'><BR>
	</FORM>
	<HR>
		你輸入的帳號: <?=$_POST[account]?> <BR>
		你輸入的姓名: <?=$_POST[password]?>
	<HR>
	</html>";*/



//10.22.49.206
//echo "<table border='1' width='100%'><tr><td width='20%'valign='top'>ID:4982c076<BR>Name:Danny<BR>Age:21<BR><a href=http://10.22.49.206/Chartdanny.php>Chart<a><BR><a href=Danny.xls>下載excel結果</a></td><td>";
//----------------------------------------------------------------------------------------
echo "<table cellpadding='0' cellspacing='0' border='2' bordercolor='black'>";
echo "<tr border='2'>";
  echo "<td rowspan='2' width='50'>"."SEQ"."</td>";
  echo "<td rowspan='2' width='150'>"."Rev_time"."</td>";
 //echo "<td rowspan='2' width='50'>"."Length"."</td>";
 //echo "<td rowspan='2' width='350'>"."content"."</td>";
  //echo "<td rowspan='2' width='50'>"."bodyid"."</td>";
  echo "<td rowspan='2' width='60'>"."Thumb"."</td>";
  echo "<td rowspan='2' width='60'>"."IndexF"."</td>";
  echo "<td rowspan='2' width='60'>"."MiddleF"."</td>";
  echo "<td rowspan='2' width='60'>"."RingF"."</td>";
  echo "<td rowspan='2' width='60'>"."Pinkie"."</td>";
echo "</tr>";
echo "<table>";
$re=mysql_query("SELECT * FROM finger_data WHERE user_id='".$row["id"]."'");
//$re=mysql_query("SELECT * FROM finger_data"); 
while($kekka=mysql_fetch_array($re)){
//$xrow2="$kekka[0]\t$kekka[1]\t$kekka[5]\t$kekka[6]\t$kekka[7]\t$kekka[8]\t$kekka[9]\n";
//fputs($xls,$xrow2);
echo "<table cellpadding='0' cellspacing='0' border='1' bordercolor='black'>";
echo "<tr border='2'>";
  echo "<td rowspan='2' width='50'>".$kekka[0]."</td>";
  echo "<td rowspan='2' width='150'>".$kekka[1]."</td>";
  //echo "<td rowspan='2' width='50'>".$start."</td>";
  //echo "<td rowspan='2' width='350'>".$kekka[3]."</td>";
  //echo "<td rowspan='2' width='50'>".$kekka[4]."</td>";
  echo "<td rowspan='2' width='60'>".$kekka[4]."</td>";
  echo "<td rowspan='2' width='60'>".$kekka[6]."</td>";
  echo "<td rowspan='2' width='60'>".$kekka[8]."</td>";
  echo "<td rowspan='2' width='60'>".$kekka[10]."</td>";
  echo "<td rowspan='2' width='60'>".$kekka[12]."</td>";
echo "</tr>";
echo "<table>";
}
?>
<?php
echo"<FORM METHOD=POST ACTION=''>
		Start<BR>
		<input type='text' name='start' size='20'><BR>
		End<BR>
		<input type='text' name='End' size='20'><BR>
		<input type='submit' name='submit' value='Send'><BR>
		
	</FORM>";
$num=0;
$re=mysql_query("SELECT * FROM finger_data");
if (isset($_POST['submit'])){
  if ((isset($_POST['start']))&&(isset($_POST['End']))){
	$start=$_POST['start'];
	$End=$_POST['End'];	
	print $start;


$objPHPExcel = new PHPExcel(); 
$objPHPExcel->setActiveSheetIndex(0); 

	while($kekka=mysql_fetch_array($re)){
		$num+=1;
		//print $num;
		if (($num>=$start) && ($num<=$End)){
	
//設定欄位值 
$objPHPExcel->getActiveSheet()->setCellValue('A'.$num,"$kekka[0]"); 
$objPHPExcel->getActiveSheet()->setCellValue('B'.$num,"$kekka[1]"); 
$objPHPExcel->getActiveSheet()->setCellValue('C'.$num,"$kekka[4]"); 
$objPHPExcel->getActiveSheet()->setCellValue('D'.$num,"$kekka[6]"); 
$objPHPExcel->getActiveSheet()->setCellValue('E'.$num,"$kekka[8]"); 
$objPHPExcel->getActiveSheet()->setCellValue('F'.$num,"$kekka[10]"); 
$objPHPExcel->getActiveSheet()->setCellValue('G'.$num,"$kekka[12]"); 

			//$xrow2="$kekka[0]\t$kekka[1]\t$kekka[4]\t$kekka[6]\t$kekka[8]\t$kekka[10]\t$kekka[12]\n\r";
			//fputs($xls,$xrow2);
		}
	}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet 
$objPHPExcel->setActiveSheetIndex(0); 

// Export to Excel5 (.xls) 匯出成2003

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('data.xls'); 



	//fclose($xls);
	mysql_close($link);
	echo "<FORM METHOD=POST ACTION=''><a href=data.xls>Download Excel</a></FORM>";	
  }  
} 
?>
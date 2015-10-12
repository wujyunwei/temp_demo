<?php // content="text/plain; charset=utf-8"

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$link = mysql_connect('sql106.byethost33.com','b33_16511403','public9a19'); 

if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

$db_selected = mysql_select_db("b33_16511403_cloud_gloves_db",$link); 
if (!$db_selected) { 
  die ('Can\'t use db : ' . mysql_error()); 
  }
    if (!isset($_SESSION)){
    session_start();}
  //查詢登入會員資料
  $sql = "SELECT * FROM member WHERE account='".$_SESSION["account"]."'";
  $record = mysql_query($sql);
  $row = mysql_fetch_assoc($record);
if($row["identity"]=="doctor"){
  $sql = "SELECT * FROM member WHERE id='".$_GET["user_id"]."'";
  $record = mysql_query($sql);
  $row = mysql_fetch_assoc($record);
}
$qt=mysql_query("SELECT * FROM finger_data WHERE user_id='".$row["id"]."'");
//$qt=mysql_query("SELECT * FROM finger_data");
$Thumb = array();//array(20,15,23,15);
$IndexF = array();//array(12,9,42,8);
$MiddleF = array();//array(5,17,32,24);
$RingF = array();
$Pinkie = array();
// Setup the graph
while($kekka=mysql_fetch_array($qt)){
$Thumb[]=$kekka[4];
$IndexF[]=$kekka[6];
$MiddleF[]=$kekka[8];
$RingF[]=$kekka[10];
$Pinkie[]=$kekka[12];
}
$graph = new Graph(1300,700);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->SetFont(FF_ARIAL,FS_BOLD,24);
$graph->title->Set($row["name"]);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$SEQ=array();
while($kekka=mysql_fetch_array($qt)){
$SEQ[]=$kekka[1];
}
$graph->xaxis->SetTickLabels($SEQ);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($Thumb);
$graph->Add($p1);
$p1->SetColor("#EE0000");
$p1->SetLegend('Finger1');

// Create the second line
$p2 = new LinePlot($IndexF);
$graph->Add($p2);
$p2->SetColor("#00FF00");
$p2->SetLegend('IndexF');

// Create the third line
$p3 = new LinePlot($MiddleF);
$graph->Add($p3);
$p3->SetColor("#0000EE");
$p3->SetLegend('MiddleF');

// Create the fourth line
$p4 = new LinePlot($RingF);
$graph->Add($p4);
$p4->SetColor("#68228B");
$p4->SetLegend('RingF');

// Create the fifth line
$p5 = new LinePlot($Pinkie);
$graph->Add($p5);
$p5->SetColor("#EEB422");
$p5->SetLegend('Pinkie');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
<?php
session_start();
if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU DONT HAVE ACCESS TO THIS PAGE.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
$student=$_POST["student"];
$menu=$_POST["menu"];
$ex=$_POST["ex"];


$id=$_POST["id"];
$sub1=$_POST["sub1"];
$sub2=$_POST["sub2"];
$sub3=$_POST["sub3"];
$sub4=$_POST["sub4"];
$sub5=$_POST["sub5"];
$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
$sql= "insert into $ex values($id,$sub1,$sub2,$sub3,$sub4,$sub5)";
$result=mysql_query($sql, $db_link);
echo"connected";


//$ex=$_POST["ex"];
//$student=$_POST["student"];
//$menu=$_POST["menu"];
/*
$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
echo"connected";

$sql= "insert into $ex values($id,$sub1,$sub2,$sub3,$sub4,$sub5)";
$result=mysql_query($sql, $db_link);

 $db_link = mysql_connect("localhost","root", "");
mysql_select_db('feedback',$db_link);

$sql1="CREATE TABLE $fullname(id integer,dok integer,wop integer,att integer,lc integer,sc integer,audi integer,primary key(id))";
$result1=mysql_query($sql1, $db_link);
*/




  header("location:insert.php");
}
?>

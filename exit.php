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
/*
$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql111= "DROP TABLE exname";
$result111=mysql_query($sql111, $conn);
*/
$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql1= "DROP TABLE subjects";
$result1=mysql_query($sql1, $conn);
/*
$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$s= "DROP TABLE dtname";
$resu=mysql_query($s, $conn);
*/
 header("location:logon.php");
}
?>

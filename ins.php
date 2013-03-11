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
$examname=$_POST["examname"];
$stud_no=$_POST["stud_no"];

$sub1=$_POST["sub1"];
$sub2=$_POST["sub2"];
$sub3=$_POST["sub3"];
$sub4=$_POST["sub4"];
$sub5=$_POST["sub5"];
$max=$_POST["maxmarks"];
$pass=$_POST["passmarks"];
$menu=$_POST["menu"];
$_SESSION['db1']="$menu";
$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql111= "CREATE TABLE subjects(s1 varchar(20),s2 varchar(20),s3 varchar(20),s4 varchar(20),s5 varchar(20))";
$result111=mysql_query($sql111, $conn);




$conn = mysql_connect("localhost","root", "");
mysql_select_db($menu,$conn);
$sql23= "CREATE TABLE examnames(name varchar(20),s1 varchar(20),s2 varchar(20),s3 varchar(20),s4 varchar(20),s5 varchar(20),maxmarks integer,passmarks integer)";
$result23=mysql_query($sql23, $conn);

/*
$conn = mysql_connect("localhost","root", "");
mysql_select_db($menu,$conn);
$sqldtsub= "CREATE TABLE sub(s1 varchar(20),s2 varchar(20),s3 varchar(20),s4 varchar(20),s5 varchar(20))";
$resultdtsub=mysql_query($sqldtsub, $conn);
$sqlsu = "INSERT into $examname"."sub values('$sub1','$sub2','$sub3','$sub4','$sub5')";
$resultsu=mysql_query($sqlsu,$conn);
*/


$conn = mysql_connect("localhost","root", "");
mysql_select_db($menu,$conn);
$sqlee = "INSERT into examnames values('$examname','$sub1','$sub2','$sub3','$sub4','$sub5','$max','$pass')";
$resultee=mysql_query($sqlee,$conn);



$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sqlex= "CREATE TABLE exname(exam varchar(20))";
$resultex=mysql_query($sqlex, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sqlsub = "INSERT into subjects values('$sub1','$sub2','$sub3','$sub4','$sub5')";
$resultsub=mysql_query($sqlsub,$conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db($menu,$conn);
$sql11= "CREATE TABLE $examname(id integer,$sub1 integer,$sub2 integer,$sub3 integer,$sub4 integer,$sub5 integer,primary key(id))";
$result11=mysql_query($sql11, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
//$sql = "INSERT into stdno values('$stud_no')";
//$result=mysql_query($sql,$conn);
$sql1 = "INSERT into exname values('$examname')";
$result1=mysql_query($sql1,$conn);
echo"$examname";


 header("location:insert.php");
}
?>


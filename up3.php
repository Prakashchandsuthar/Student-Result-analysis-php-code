<?php 


$dtbase=$_POST["database"];
$exam=$_POST["exmn"];
$sub=$_POST["subname"];
$rollno=$_POST["rollno"];
$marks=$_POST["marks"];
$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);

$sqlname="UPDATE $exam set $sub='$marks' where id='$rollno'";
$resultname=mysql_query($sqlname, $conn);
echo"updated successfully";
header("location:edit.php");
?>



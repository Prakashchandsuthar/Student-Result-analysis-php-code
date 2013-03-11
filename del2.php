<?php 
$dtbase=$_POST["dtbase"];
$exam=$_POST["exn"];
$did=$_POST["delid"];

$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);
if(is_resource($conn))
{
echo"connected";
}
$sql="DELETE FROM `$dtbase`.`$exam` WHERE `$exam`.`id` = $did";
$result=mysql_query($sql, $conn);
echo"$exam";
echo"$did";
echo"$sql";
echo"$dtbase";

$conn = mysql_connect("localhost","root", "");
mysql_select_db($dtbase,$conn);
$sql12= "DROP TABLE del";
$resultdb=mysql_query($sql12, $conn);


$conn = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$conn);
$sql23="DROP TABLE del";
$result=mysql_query($sql23, $conn);

if(!$result)
{
echo"no such record found";

}
else
{
echo"deleted succesfully";
}

header("location:edit.php");
  //DELETE FROM `fesem_i2010_11`.`unittest` WHERE `unittest`.`id` = 88

?>

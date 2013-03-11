<?php
session_start();
?>
<html>
<style type = "text/css">
body{background-image :url(bag.jpg);}
</style>



<?php
if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU DONT HAVE ACCESS TO THIS PAGE.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
$newpass=$_POST["newpass"];
$oldpass=$_POST["oldpass"];

$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "UPDATE login SET password='$newpass' where password='$oldpass'";
$result=mysql_query($sql, $db_link);
if($result&&$oldpass!="")
{
?>
<body>
<form action="logon.php" method="post">
<center>
<table>
<tr>
<th>
 
<img src="m.jpg" height="100" width="100" alt="logo"  />

</th> 

<TH>

<img src="resultan.jpg" height="70" width="400" alt="logo"  />
</TH>
</center>
</table>
<hr />
<hr/>
<BR>

<h4><i><font color="green">YOUR PASSWORD HAS BEEN CHANGED SUCCESSFULLY.....</FONT></H4>
<BR>
<input type ="submit" name ="ok" value="OK">
</form>
</body>
<?php
}
else
{?>
<h4><i><font color="green">YOUR OLD PASSWORD IS NOT MATCHED.....</FONT></H4>	
<?php
}
}
?>
</html>


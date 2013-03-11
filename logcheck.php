<?php
session_start();
$username=$_POST["username"];
$password=$_POST["password"];

$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sql= "SELECT * FROM login where user_name='$username' and password='$password'";
$result=mysql_query($sql, $db_link);

$num= mysql_num_rows ($result);
if($num!=0)
{
	$_SESSION['userid']="$username";
	$_SESSION['pass']="$password";
?>
<style type = "text/css">
body{background-image :url(bag.jpg);}
</style>

<body>
<center>
<table>
<tr>
<th>
 <img src="m.jpg" height="100" width="100" alt="logo"  />
</th> 
<TH>
<img src="resultan.jpg" height="90" width="700" alt="logo"  />
</TH>
</table>
</center>
<hr />
<hr/>
<?php
if(!isset($_SESSION['userid'])&&!isset($_SESSION['password']))
{ ?>
<CENTER>
<H1><font color="red">YOU ARE NOT A VALID PERSON.........................SORRY</font></H1>
</CENTER>
<?php }
else
{
header("location:logon.php");
}
}
else
{
?>
<CENTER>
<H1><font color="red">YOU ARE LOGIN IS INCORRECT.........................SORRY</font></H1>
</CENTER>
<?php
}
?>
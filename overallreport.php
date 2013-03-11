
<!DOCTYPE html PUBLIC ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Administrator</title>
<link href="fonts.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
table.menu {
	font-size:100%;
	position:absolute;
	visibility:hidden;
	width: 177px;
	background-color: #E5E5E5;
}
-->
</style>


<script type="text/javascript">
function showmenu(elmnt)
{
document.getElementById(elmnt).style.visibility="visible"
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.visibility="hidden"
}
</script>

<SCRIPT LANGUAGE="JavaScript">

function put() 
{
var x, y, z,e,f;
x = document.form['En_no'].value;
e='.jpg';
z='Images/';
document.form['img'].value =  z+x+e;

}


</script>

<link href="../fonts.css" rel="stylesheet" type="text/css" />
</head>

<html>

<style type = "text/css">
body{background-image :url(bag.jpg);}
</style>
<?php
$menu=$_POST["menu"];
$dt=$menu;
echo"$menu";

$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$sq= "CREATE TABLE del(name varchar(20))";
$re=mysql_query($sq, $db_link);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db('result_analysis',$db_link);
$s= "INSERT into del values('$dt')";
$r=mysql_query($s, $db_link);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
$sql= "SELECT * FROM examnames";
$result=mysql_query($sql, $db_link);

 $num=mysql_num_rows($result);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
$sql11= "CREATE TABLE del(name varchar(20))";
$result11=mysql_query($sql11, $db_link);

 //$num=mysql_num_rows($result11);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
if(is_resource($db_link))
{
echo"connected";
}
$sql19= "INSERT into del values('$dt')";
$result19=mysql_query($sql19, $db_link);

$db_link = mysql_connect("localhost","root", "");
mysql_select_db($menu,$db_link);
$sqldb= "SELECT * FROM del";
$resultdb=mysql_query($sqldb, $db_link);

 $numdb=mysql_num_rows($resultdb);

?>

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




<div align="center"></div>
<table width="754" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  bgcolor="purple" width="750" height="18" align="center" valign="top" class="yellow"><span class="gray"></td>
  </tr>
<form id="form" name="form" method="post" action= "overallshow.php">
  <tr class="white">
    <td align="left" valign="top" class="white"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="4%" valign="top">&nbsp;</td>
        <td width="96%" align="left" valign="top">
    <table width="95%" border="0" cellpadding="2" cellspacing="2" class="text_black">

                </td>
            </tr>
 
          <tr>
              
     <table width="95%" border="0" cellpadding="4" cellspacing="15" class="text_black">
  
 <tr>
                  <select name="dtbase">
                               <?php 
                                 
		$row = mysql_fetch_array($resultdb, MYSQL_ASSOC) ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		
</select>
	 <tr>
                 
                                                   <tr>
 
            
                          
                            </table>
<br><br>

        Choose The Exam :<select name="exn">
                               <?php 
                                 
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
		<option value= <?php echo $row['name'];?>><?php echo $row['name'];?></option>
		<?php } ?>
</select>



              <p>
                              <label>
                      <input type="submit" name="id" value="SHOW">
                              </label><br>


 <label><br>
</p>
      
  
</body>


</html>				    












